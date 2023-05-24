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

/* squelette/main.twig */
class __TwigTemplate_a269ea61e03aec8cb6813d5a4245582a extends Template
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
    <title>Appli Gif</title>
    <link rel=\"stylesheet\" href=\"css/styles.css\" >
</head>
<body>
    <div class=\"navbar\">
        <a href=\"#box\">Box</a>
        <a href=\"#prestation\">Prestation</a>
        <a href=\"#categorie\">Catégorie</a>
    </div>

    <div class=\"content\">
        ";
        // line 14
        echo "        <h1>Contenu principal</h1>
    </div>

    <div class=\"footer\">
        <a href=\"#\" class=\"home-button\">Accueil</a>
        <div class=\"site-name\">git.appli</div>
        <div class=\"date\">";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "</div>
    </div>
</body>
";
    }

    public function getTemplateName()
    {
        return "squelette/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 20,  51 => 14,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "squelette/main.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/squelette/main.twig");
    }
}
