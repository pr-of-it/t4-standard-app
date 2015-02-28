<?php

/* PageByUrl.block.html */
class __TwigTemplate_ee18b287663214ed7fa46b2410768fe26adcb91a76029de7819f4d1860d23950 extends Twig_Template
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
        echo "<article>";
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text", array());
        echo "</article>";
    }

    public function getTemplateName()
    {
        return "PageByUrl.block.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
