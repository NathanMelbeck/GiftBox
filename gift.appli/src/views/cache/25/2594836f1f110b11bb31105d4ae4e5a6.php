<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* prestation.twig */
class __TwigTemplate_47736dc3d4289326d8954d8063df1ab3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<h1>Prestation : ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "libelle", [], "any", false, false, false, 1), "html", null, true);
        echo "</h1>
<p>ID : ";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "id", [], "any", false, false, false, 2), "html", null, true);
        echo "</p>
<p>libelle de la prestation : ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "libelle", [], "any", false, false, false, 3), "html", null, true);
        echo "</p>
<p>description : ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "description", [], "any", false, false, false, 4), "html", null, true);
        echo "</p>
<p>tarix : ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prestation"] ?? null), "tarif", [], "any", false, false, false, 5), "html", null, true);
        echo " €</p>
";
    }

    public function getTemplateName()
    {
        return "prestation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  50 => 4,  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "prestation.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/prestation.twig");
    }
}
