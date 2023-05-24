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

/* squelette/header.twig */
class __TwigTemplate_ddb3fcc885fc34a1929059656c56f17d extends Template
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
        echo "<head>
    <meta charset=\"utf-8\">
    <title>Appli Gift</title>
    <link rel=\"stylesheet\" href=\"/css/styles.css\" >
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">

    <div class=\"navbar\">
        <a href=\"\">Box</a>
        <a href=\"\">Prestation</a>
        <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("categories"), "html", null, true);
        echo "\">Catégories</a>
        <div class=\"right\">
            <a href=\"\"><i class=\"fas fa-shopping-cart\"></i></a>
        </div>
    </div>
</head>
";
    }

    public function getTemplateName()
    {
        return "squelette/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "squelette/header.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/squelette/header.twig");
    }
}
