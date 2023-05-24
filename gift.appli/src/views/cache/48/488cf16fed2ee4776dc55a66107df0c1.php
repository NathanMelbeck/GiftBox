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

/* newBox.twig */
class __TwigTemplate_6cbd04e96b94238dc97456430445375d extends Template
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
        echo "<h1>Nouvelle box créée</h1>
<p>Nom : ";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</p>
<p>Description : ";
        // line 3
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "newBox.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newBox.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/newBox.twig");
    }
}
