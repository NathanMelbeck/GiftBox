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

/* main.twig */
class __TwigTemplate_cfce95c06a8e2563b0ae1c96fce49470 extends Template
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
</head>
<body>
    <div class=\"navbar\">
        <a href=\"\">Box</a>
        <a href=\"\">Prestation</a>
        <a href=\"\">Catégorie</a>
    </div>

    <div class=\"content\">
        ";
        // line 15
        echo "        <h1>Contenu principal</h1>
    </div>

    <div class=\"footer\">
        <a href=\"#\" class=\"home-button\">Accueil</a>
        <div class=\"site-name\">git.appli</div>
        <div class=\"date\">";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "</div>
    </div>
</body>
";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 21,  52 => 15,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/main.twig");
    }
}
