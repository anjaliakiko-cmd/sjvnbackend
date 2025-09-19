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

/* themes/sjvn/templates/views/views-view-unformatted--our_business.html.twig */
class __TwigTemplate_6fbcd64ddb899b6cb8c7ed068b7901e7 extends Template
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
        // line 18
        yield "<section class=\"our-business-section\">
  <h2 class=\"section-title\">Our Business</h2>

  <div class=\"business-container\">
    <div class=\"business-grid\">
      ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 24
            yield "        ";
            $context["term"] = CoreExtension::getAttribute($this->env, $this->source, (($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 24)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#row"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 24), "#row", [], "array", false, false, true, 24)), "_entity", [], "any", false, false, true, 24);
            // line 25
            yield "        <div class=\"business-item\" 
             data-image=\"";
            // line 26
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["term"] ?? null), "field_image", [], "any", false, false, true, 26), "entity", [], "any", false, false, true, 26), "fileuri", [], "any", false, false, true, 26)), "html", null, true);
            yield "\" 
             data-link=\"";
            // line 27
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.taxonomy_term.canonical", ["taxonomy_term" => CoreExtension::getAttribute($this->env, $this->source, ($context["term"] ?? null), "id", [], "method", false, false, true, 27)]), "html", null, true);
            yield "\">
          
          <i class=\"bi ";
            // line 29
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["term"] ?? null), "field_icon", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29), "html", null, true);
            yield " business-icon\"></i>
          <span>";
            // line 30
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["term"] ?? null), "name", [], "any", false, false, true, 30), "value", [], "any", false, false, true, 30), "html", null, true);
            yield "</span>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "    </div>

    <div class=\"business-image\">
      ";
        // line 37
        yield "      ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["rows"] ?? null)) > 0)) {
            // line 38
            yield "        ";
            $context["first_term"] = CoreExtension::getAttribute($this->env, $this->source, (($_v1 = CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["rows"] ?? null)), "content", [], "any", false, false, true, 38)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#row"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["rows"] ?? null)), "content", [], "any", false, false, true, 38), "#row", [], "array", false, false, true, 38)), "_entity", [], "any", false, false, true, 38);
            // line 39
            yield "        <img id=\"business-display\" src=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["first_term"] ?? null), "field_image", [], "any", false, false, true, 39), "entity", [], "any", false, false, true, 39), "fileuri", [], "any", false, false, true, 39)), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["first_term"] ?? null), "name", [], "any", false, false, true, 39), "value", [], "any", false, false, true, 39), "html", null, true);
            yield "\">
      ";
        }
        // line 41
        yield "    </div>
  </div>
</section>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/sjvn/templates/views/views-view-unformatted--our_business.html.twig";
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
        return array (  102 => 41,  94 => 39,  91 => 38,  88 => 37,  83 => 33,  74 => 30,  70 => 29,  65 => 27,  61 => 26,  58 => 25,  55 => 24,  51 => 23,  44 => 18,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/sjvn/templates/views/views-view-unformatted--our_business.html.twig", "C:\\xampp\\htdocs\\sjvn\\themes\\sjvn\\templates\\views\\views-view-unformatted--our_business.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 23, "set" => 24, "if" => 37];
        static $filters = ["escape" => 26, "length" => 37, "first" => 38];
        static $functions = ["file_url" => 26, "path" => 27];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'length', 'first'],
                ['file_url', 'path'],
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
