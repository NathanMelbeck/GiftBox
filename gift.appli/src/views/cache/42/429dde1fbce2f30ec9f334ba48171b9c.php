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
class __TwigTemplate_379ffeaff34b929a26346ed106ae6f26 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html>
    ";
        // line 2
        $this->loadTemplate("squelette/header.twig", "squelette/main.twig", 2)->display($context);
        // line 3
        echo "    <body>
        <br>
        <br>
        <br>
        <div class=\"content\">
            ";
        // line 8
        $this->displayBlock('content', $context, $blocks);
        // line 9
        echo "        </div>
    </body>
    ";
        // line 11
        $this->loadTemplate("squelette/footer.twig", "squelette/main.twig", 11)->display($context);
        // line 12
        echo "</html>";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " hihi";
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
        return array (  62 => 8,  58 => 12,  56 => 11,  52 => 9,  50 => 8,  43 => 3,  41 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "squelette/main.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/squelette/main.twig");
    }
}
