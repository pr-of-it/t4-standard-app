<?php

/* __block_available.html */
class __TwigTemplate_aa5e2c2fc9885815136366590e82264c0fa7794baea8190aee6aa4549de9865c extends Twig_Template
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
        echo "<div class=\"col-xs-12 col-sm-6 col-md-4 block-available-draggable\" data-block-path=\"";
        echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : null), "html", null, true);
        echo "\">
    <div class=\"panel panel-info\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "title", array()), "html", null, true);
        echo "
            </h4>
        </div>
        <div class=\"panel-body\">
            ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "desc", array()), "html", null, true);
        echo "
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "__block_available.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 9,  27 => 5,  19 => 1,);
    }
}
