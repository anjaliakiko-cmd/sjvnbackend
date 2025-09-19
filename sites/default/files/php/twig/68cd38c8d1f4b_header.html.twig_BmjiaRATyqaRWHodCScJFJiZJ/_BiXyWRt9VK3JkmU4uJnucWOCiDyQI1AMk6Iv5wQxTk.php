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

/* themes/sjvn/templates/layout/header.html.twig */
class __TwigTemplate_cc5f85f73b3e2cd5d28b5fa567db9568 extends Template
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
        // line 15
        yield "\t<!-- Top Utility Bar -->
<div class=\"top-bar\">
  <!-- Left Section -->
  <div class=\"left-links\">
  ";
        // line 19
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 19), "html", null, true);
        yield "
  </div>
  <!-- Center Logos -->
  <div class=\"middle-logs\">
  ";
        // line 23
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "center_logos", [], "any", false, false, true, 23), "html", null, true);
        yield "
  </div>

  <!-- Right Section -->
  <div class=\"right-links\">
  <a href=\"#\">Sitemap</a> |
  <a href=\"#main-content\">Skip To Main Content</a> |
  <a href=\"hindi/index.html\">हिंदी</a> |

  <!-- Theme Selectors (Inline) -->
  <div class=\"theme-inline\">
    <div class=\"theme-color blue\" data-theme=\"blue\" title=\"Default Theme\"></div>
    <div class=\"theme-color green\" data-theme=\"green\" title=\"Green Theme\"></div>
    <div class=\"theme-color dark\" data-theme=\"dark\" title=\"Dark Theme\"></div>
  </div>
  <div>
    <div class=\"search_icons_mobile\">\t\t\t\t\t\t\t
\t\t\t<div class=\"nav-item search-btn\">
\t\t\t<a href=\"javascript:void(0)\"><i class=\"bi bi-search\" aria-hidden=\"true\"></i></a>
\t\t\t</div>
\t\t\t<div class=\"searchSection\">";
        // line 43
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_section", [], "any", false, false, true, 43), "html", null, true);
        yield "</div>
    </div>
  </div>
</div>

</div>



<!-- Logo & Banner Section -->
<div class=\"logo-bar\">
  ";
        // line 54
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "logo", [], "any", false, false, true, 54), "html", null, true);
        yield "
 
</div>

<!-- Main Navigation -->
<nav class=\"main-nav\">
  <ul id=\"nav-list\">
    <li><a href=\"/\"><img src=\"";
        // line 61
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["base_path"] ?? null), "html", null, true);
        yield "themes/sjvn/images/icons/home.svg\"> </a></li>
    <li>";
        // line 62
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 62), "html", null, true);
        yield "</li>
  </ul>
</nav>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "base_path"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/sjvn/templates/layout/header.html.twig";
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
        return array (  108 => 62,  104 => 61,  94 => 54,  80 => 43,  57 => 23,  50 => 19,  44 => 15,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/sjvn/templates/layout/header.html.twig", "C:\\xampp\\htdocs\\sjvn\\themes\\sjvn\\templates\\layout\\header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 19];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
