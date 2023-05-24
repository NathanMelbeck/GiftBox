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
class __TwigTemplate_12c4cd5a115c57452b2d4fe41154cbe9 extends Template
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
        $this->loadTemplate("header.twig", "main.twig", 2)->display($context);
        // line 3
        echo "<body>
    <br>
    <br>
    <br>
    <div class=\"content\">
        ";
        // line 8
        $this->displayBlock('content', $context, $blocks);
        // line 9
        echo "    </div>


</body>

</html>";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " hihi";
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
        return array (  61 => 8,  52 => 9,  50 => 8,  43 => 3,  41 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/main.twig");
    }
}
