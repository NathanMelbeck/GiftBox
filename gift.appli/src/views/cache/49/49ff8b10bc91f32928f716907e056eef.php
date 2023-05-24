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

/* bandeau.twig */
class __TwigTemplate_2fa89e9808e6826140ea6c11c09c8864 extends Template
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
        echo "<body>
    <div class=\"navbar\">
        <div class=\"dropdown\">
            <button class=\"dropbtn\">Box</button>
            <div class=\"dropdown-content\">
                <a href=\"#box1\">Box 1</a>
                <a href=\"#box2\">Box 2</a>
                <a href=\"#box3\">Box 3</a>
            </div>
        </div>
        <div class=\"dropdown\">
            <button class=\"dropbtn\">Prestation</button>
            <div class=\"dropdown-content\">
                <a href=\"#prestation1\">Prestation 1</a>
                <a href=\"#prestation2\">Prestation 2</a>
                <a href=\"#prestation3\">Prestation 3</a>
            </div>
        </div>
        <div class=\"dropdown\">
            <button class=\"dropbtn\">Catégorie</button>
            <div class=\"dropdown-content\">
                <a href=\"#categorie1\">Catégorie 1</a>
                <a href=\"#categorie2\">Catégorie 2</a>
                <a href=\"#categorie3\">Catégorie 3</a>
            </div>
        </div>
    </div>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #333;
            overflow: auto;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown:hover {
            background-color: gray;
        }
    </style>
</body>
";
    }

    public function getTemplateName()
    {
        return "bandeau.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "bandeau.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/bandeau.twig");
    }
}
