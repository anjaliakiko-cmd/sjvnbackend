<?php

namespace Drupal\file_encrypt\Controller;

use Drupal\Component\Utility\Crypt;
use Drupal\Core\Image\ImageFactory;
use Drupal\Core\Lock\LockBackendInterface;
use Drupal\Core\Site\Settings;
use Drupal\image\ImageStyleInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\file_encrypt\EncryptBinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Drupal\Core\StreamWrapper\StreamWrapperManagerInterface;
/**
 * Defines a controller to serve image styles.
 */
class ImageStyleDownloadController extends FileDownloadController {

  /**
   * The lock backend.
   *
   * @var \Drupal\Core\Lock\LockBackendInterface
   */
  protected $lock;

  /**
   * The image factory.
   *
   * @var \Drupal\Core\Image\ImageFactory
   */
  protected $imageFactory;

  /**
   * A logger instance.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * A stream wrapper interface.
   *
   * @var Drupal\Core\StreamWrapper\StreamWrapperInterface
   */
  protected $streamWrapperManager;

  /**
   * Constructs a ImageStyleDownloadController object.
   *
   * @param \Drupal\Core\Lock\LockBackendInterface $lock
   *   The lock backend.
   * @param \Drupal\Core\Image\ImageFactory $image_factory
   *   The image factory.
   * @param Drupal\Core\StreamWrapper\StreamWrapperInterface $streamWrapperManager
   * The stream wrapper.
   */
  public function __construct(LockBackendInterface $lock, ImageFactory $image_factory, StreamWrapperManagerInterface $stream_wrapper_manager) {
    $this->lock = $lock;
    $this->imageFactory = $image_factory;
    $this->logger = $this->getLogger('image');
    $this->streamWrapperManager = $stream_wrapper_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('lock'),
      $container->get('image.factory'),
      $container->get('stream_wrapper_manager')
    );
  }

  /**
   * Generates a derivative, given a style and image path.
   *
   * After generating an image, transfer it to the requesting agent.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   * @param string $scheme
   *   The file scheme, defaults to 'encrypt'.
   * @param \Drupal\image\ImageStyleInterface $image_style
   *   The image style to deliver.
   *
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Symfony\Component\HttpFoundation\Response
   *   The transferred file as response or some error response.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
   *   Thrown when the user does not have access to the file.
   * @throws \Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException
   *   Thrown when the file is still being generated.
   */
  public function deliver(Request $request, $scheme, ImageStyleInterface $image_style) {
    $target = $request->query->get('file');
    $image_uri = $scheme . '://' . $target;
    $image_uri = $this->streamWrapperManager->normalizeUri($image_uri);

    if ($this->streamWrapperManager->isValidScheme($scheme)) {
      $normalized_target = $this->streamWrapperManager->getTarget($image_uri);
      if ($normalized_target !== FALSE) {
        if (!in_array($scheme, Settings::get('file_sa_core_2023_005_schemes', []))) {
          $parts = explode('/', $normalized_target);
          if (array_intersect($parts, ['.', '..'])) {
            throw new NotFoundHttpException();
          }
        }
      }
    }

    // Check that the style is defined and the scheme is valid.
    $valid = !empty($image_style) && $this->streamWrapperManager->isValidScheme($scheme);
    // styles/<style_name>/... as structure, so we check if the $target variable
    // starts with styles/.
    $token = $request->query->get(IMAGE_DERIVATIVE_TOKEN, '');
    $token_is_valid = hash_equals($image_style->getPathToken($image_uri), $token)
      || hash_equals($image_style->getPathToken($scheme . '://' . $target), $token);
    if (!$this->config('image.settings')->get('allow_insecure_derivatives') || str_starts_with(ltrim($target, '\/'), 'styles/')) {
      $valid = $valid && $token_is_valid;
    }

    if (!$valid) {
      // Return a 404 (Page Not Found) rather than a 403 (Access Denied) as the
      // image token is for DDoS protection rather than access checking. 404s
      // are more likely to be cached (e.g. at a proxy) which enhances
      // protection from DDoS.
      throw new NotFoundHttpException();
    }

    $derivative_uri = $image_style->buildUri($image_uri);
    $headers = array();

    // If using the encrypt scheme, let other modules provide headers and
    // control access to the file.
    if ($scheme == 'encrypt') {
      if (file_exists($derivative_uri)) {
        return parent::download($request, $scheme);
      }
      else {
        $headers = $this->moduleHandler()->invokeAll('file_download', array($image_uri));
        if (in_array(-1, $headers) || empty($headers)) {
          throw new AccessDeniedHttpException();
        }
      }
    }

    // Don't try to generate file if source is missing.
    if (!file_exists($image_uri)) {
      // If the image style converted the extension, it has been added to the
      // original file, resulting in filenames like image.png.jpeg. So to find
      // the actual source image, we remove the extension and check if that
      // image exists.
      $path_info = pathinfo($image_uri);
      $converted_image_uri = $path_info['dirname'] . DIRECTORY_SEPARATOR . $path_info['filename'];
      if (!file_exists($converted_image_uri)) {
        $this->logger->notice('Source image at %source_image_path not found while trying to generate derivative image at %derivative_path.', array('%source_image_path' => $image_uri, '%derivative_path' => $derivative_uri));
        return new Response($this->t('Error generating image, missing source file.'), 404);
      }
      else {
        // The converted file does exist, use it as the source.
        $image_uri = $converted_image_uri;
      }
    }

    // Don't start generating the image if the derivative already exists or if
    // generation is in progress in another thread.
    $lock_name = 'image_style_deliver:' . $image_style->id() . ':' . Crypt::hashBase64($image_uri);
    if (!file_exists($derivative_uri)) {
      $lock_acquired = $this->lock->acquire($lock_name);
      if (!$lock_acquired) {
        // Tell client to retry again in 3 seconds. Currently no browsers are
        // known to support Retry-After.
        throw new ServiceUnavailableHttpException(3, $this->t('Image generation in progress. Try again shortly.'));
      }
    }

    // Try to generate the image, unless another thread just did it while we
    // were acquiring the lock.
    $success = file_exists($derivative_uri) || $image_style->createDerivative($image_uri, $derivative_uri);

    if (!empty($lock_acquired)) {
      $this->lock->release($lock_name);
    }

    if ($success) {
      $image = $this->imageFactory->get($derivative_uri);
      $uri = $image->getSource();
      $headers += array(
        'Content-Type' => $image->getMimeType(),
        'Content-Length' => $image->getFileSize(),
      );
      // \Drupal\Core\EventSubscriber\FinishResponseSubscriber::onRespond()
      // sets response as not cacheable if the Cache-Control header is not
      // already modified. We pass in FALSE for non-encrypt schemes for the
      // $public parameter to make sure we don't change the headers.
      return new EncryptBinaryFileResponse($uri, 200, $headers, $scheme !== 'encrypt');
    }
    else {
      $this->logger->notice('Unable to generate the derived image located at %path.', array('%path' => $derivative_uri));
      return new Response($this->t('Error generating image.'), 500);
    }
  }

}
