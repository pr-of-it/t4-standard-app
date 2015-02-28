<?php

/* __block_installed.html */
class __TwigTemplate_a32f81657a352d73cde20562b1a7caafb8da43d09364622da52753f059b7bf2e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"col-xs-12 col-sm-6 col-md-4 block-installed\" data-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "Pk", array()), "html", null, true);
        echo "\">
    <div class=\"panel panel-info\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "title", array()), "html", null, true);
        echo "
                <button type=\"button\" class=\"close pull-right block-uninstall\" aria-label=\"Закрыть\"><span aria-hidden=\"true\">&times;</span></button>
            </h4>
        </div>
        <div class=\"panel-body\">
            <div>";
        // line 10
        $this->env->loadTemplate("__block_installed_options.html")->display($context);
        echo "</div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "__block_installed.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  27 => 5,  19 => 1,);
    }
}
