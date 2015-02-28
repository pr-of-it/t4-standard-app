<?php

/* Map.only_map.block.html */
class __TwigTemplate_1edb229c650f14e72886ea4d4e7fd487a17dfea5dc26d16022d5ce63a35560aa extends Twig_Template
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
        echo "<img class=\"img-responsive\" src=\"//static-maps.yandex.ru/1.x/?ll=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "longitude", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "latitude", array()), "html", null, true);
        echo "&size=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "width", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "height", array()), "html", null, true);
        echo "&z=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "zoom", array()), "html", null, true);
        echo "&l=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "layer", array()), "html", null, true);
        echo "&pt=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "ptLongitude", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "ptLatitude", array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["map"]) ? $context["map"] : null), "ptStyle", array()), "html", null, true);
        echo "\">";
    }

    public function getTemplateName()
    {
        return "Map.only_map.block.html";
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
