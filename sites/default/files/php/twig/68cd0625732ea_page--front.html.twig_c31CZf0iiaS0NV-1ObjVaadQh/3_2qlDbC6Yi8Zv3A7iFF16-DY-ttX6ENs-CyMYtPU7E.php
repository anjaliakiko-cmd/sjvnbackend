<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/sjvn/templates/layout/page--front.html.twig */
class __TwigTemplate_f620a1934a5a1137cc8fcb4e7a328fc6 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield " <!-- Header Include -->
  <div id=\"header-placeholder\"></div>
";
        // line 3
        yield from $this->loadTemplate("themes/sjvn/templates/layout/header.html.twig", "themes/sjvn/templates/layout/page--front.html.twig", 3)->unwrap()->yield($context);
        // line 4
        yield "  <main>
    <!-- Hero section -->
    <section>
        ";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "banner_section", [], "any", false, false, true, 7), "html", null, true);
        yield "
    </section>

    <!-- Announcements Bar -->
   ";
        // line 11
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "announcements", [], "any", false, false, true, 11), "html", null, true);
        yield "
    <!-- About Us Section -->
    <section class=\"about-section\">
      ";
        // line 14
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "about_us", [], "any", false, false, true, 14), "html", null, true);
        yield "
    </section>

    <section class=\"power-station-section\">
      ";
        // line 18
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "our_power_stations", [], "any", false, false, true, 18), "html", null, true);
        yield "
    </section>
    <section class=\"chairman-section\">
      ";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "chairmans_corner", [], "any", false, false, true, 21), "html", null, true);
        yield "
    </section>
<!--news-alert-section-->
    <section class=\"news-alert-section\">
      <div class=\"news-alert-container\">
        <div class=\"news-column\">
          <h3 class=\"section-heading\">News & Highlights</h3>
          ";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "news_highlights", [], "any", false, false, true, 28), "html", null, true);
        yield "  
          </div>
        <div class=\"alert-column\">
          <h3 class=\"section-heading\">Alert</h3>   
        ";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, true, 32), "html", null, true);
        yield "
        </div>
      </div>
    </section>
    <!--news-alert-section-end-->
    ";
        // line 37
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "our_business", [], "any", false, false, true, 37), "html", null, true);
        yield "

    <section class=\"quick-links-section\">
      ";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "quick_access_links", [], "any", false, false, true, 40), "html", null, true);
        yield "
    </section>
   <section class=\"photo-gallery-section\">  
    ";
        // line 43
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "photo_gallery", [], "any", false, false, true, 43), "html", null, true);
        yield "
  </section>
    <section class=\"logo-carousel\">
      <div class=\"carousel-track\">
      ";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "logo_carousel", [], "any", false, false, true, 47), "html", null, true);
        yield "
      </div>
    </section>
  </main>

  <!-- Footer Include -->
  <div id=\"footer-placeholder\"></div>

";
        // line 55
        yield from $this->loadTemplate("themes/sjvn/templates/layout/footer.html.twig", "themes/sjvn/templates/layout/page--front.html.twig", 55)->unwrap()->yield($context);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/sjvn/templates/layout/page--front.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  136 => 55,  125 => 47,  118 => 43,  112 => 40,  106 => 37,  98 => 32,  91 => 28,  81 => 21,  75 => 18,  68 => 14,  62 => 11,  55 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/sjvn/templates/layout/page--front.html.twig", "C:\\xampp\\htdocs\\sjvn\\themes\\sjvn\\templates\\layout\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 3];
        static $filters = ["escape" => 7];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
