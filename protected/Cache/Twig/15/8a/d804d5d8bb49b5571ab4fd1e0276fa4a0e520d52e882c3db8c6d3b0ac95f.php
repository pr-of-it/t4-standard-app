<?php

/* Register.html */
class __TwigTemplate_158ad804d5d8bb49b5571ab4fd1e0276fa4a0e520d52e882c3db8c6d3b0ac95f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Index.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 6
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
            echo "</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
<h2>Регистрация</h2>

";
        // line 11
        if ((!$this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()))) {
            // line 12
            echo "<t4:block path=\"///Register\" />
";
        } else {
            // line 14
            echo "Вы уже вошли как ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "email", array()), "html", null, true);
            echo "
";
        }
        // line 16
        echo "
";
    }

    public function getTemplateName()
    {
        return "Register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 16,  58 => 14,  54 => 12,  52 => 11,  47 => 8,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
