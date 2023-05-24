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

/* categoriesId.twig */
class __TwigTemplate_f9c38f9d2d78a65bf6ea3d8ef216cf4a extends Template
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
        echo "<h1>Catégorie : ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categorie"] ?? null), "libelle", [], "any", false, false, false, 1), "html", null, true);
        echo "</h1>
<p>ID : ";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categorie"] ?? null), "id", [], "any", false, false, false, 2), "html", null, true);
        echo "</p>
<p>Description : ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["categorie"] ?? null), "description", [], "any", false, false, false, 3), "html", null, true);
        echo "</p>
<a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("categ2prestas", ["id" => twig_get_attribute($this->env, $this->source, ($context["categorie"] ?? null), "id", [], "any", false, false, false, 4)]), "html", null, true);
        echo "\">Liste des ses presations</a>";
    }

    public function getTemplateName()
    {
        return "categoriesId.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "categoriesId.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/categoriesId.twig");
    }
}
