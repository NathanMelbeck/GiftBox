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

/* newBoxForm.twig */
class __TwigTemplate_8b6ea1907f75dc35b212d400e63d6bde extends Template
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
        echo "<form method=\"POST\" action=\"/boxes/new\">
    <label for=\"name\">Nom de la box :</label>
    <input type=\"text\" name=\"name\" id=\"name\">
    <br><br>
    <label for=\"description\">Description :</label>
    <textarea name=\"description\" id=\"description\"></textarea>
    <br><br>
    <button type=\"submit\">Créer</button>
</form>
";
    }

    public function getTemplateName()
    {
        return "newBoxForm.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newBoxForm.twig", "/Users/lucarafe/Desktop/B2_info/ArchiLogi/gift/gift.appli/src/views/newBoxForm.twig");
    }
}
