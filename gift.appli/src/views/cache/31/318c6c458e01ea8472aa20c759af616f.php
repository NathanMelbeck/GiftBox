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

/* prestations.twig */
class __TwigTemplate_1abd52b9126dfc0fb050c094e0d79faf extends Template
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
        echo "<h1>Liste des catégories</h1>
<ul>
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["prestations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["prestation"]) {
            // line 4
            echo "
        <li>
            <h2>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["prestation"], "libelle", [], "any", false, false, false, 6), "html", null, true);
            echo "</h2>
        <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("prestation", ["id" => twig_get_attribute($this->env, $this->source, $context["prestation"], "id", [], "any", false, false, false, 7)], ["id" => twig_get_attribute($this->env, $this->source, $context["prestation"], "id", [], "any", false, false, false, 7)]), "html", null, true);
            echo "\">Détail</a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prestation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "prestations.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 10,  53 => 7,  49 => 6,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "prestations.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/prestations.twig");
    }
}
