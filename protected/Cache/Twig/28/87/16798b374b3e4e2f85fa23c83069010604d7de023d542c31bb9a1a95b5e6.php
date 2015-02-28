<?php

/* Default.html */
class __TwigTemplate_288716798b374b3e4e2f85fa23c83069010604d7de023d542c31bb9a1a95b5e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admin/Blank.html");

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'toolbar' => array($this, 'block_toolbar'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'pagescript' => array($this, 'block_pagescript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admin/Blank.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 4
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li>Карты</li>
</ol>
";
    }

    // line 10
    public function block_toolbar($context, array $blocks = array())
    {
        // line 11
        echo "<a class=\"btn btn-primary\" href=\"/admin/maps/edit?id=new\"><i class=\"glyphicon glyphicon-plus-sign\"></i> Добавить карту</a>
";
    }

    // line 14
    public function block_header($context, array $blocks = array())
    {
        // line 15
        echo "Карты
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "
<div class=\"row\">
    <table class=\"table table-striped table-hover\">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th></th>
        </tr>
        ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 28
            echo "        <tr>
            <td><a href=\"/admin/maps/edit/?id=";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "</a></td>
            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>
            <td style=\"white-space: nowrap\">
                <a class=\"btn btn-primary btn-sm\" href=\"/admin/maps/edit/?id=";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "\"><i class=\"glyphicon glyphicon-edit\"></i></a>
                <a class=\"btn btn-danger btn-sm\" href=\"/admin/maps/delete/?id=";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "\" class=\"confirmable\"><i class=\"glyphicon glyphicon-remove\"></i></a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </table>
</div>

";
    }

    // line 42
    public function block_pagescript($context, array $blocks = array())
    {
        // line 43
        echo "<script type=\"text/javascript\">
    \$(function() {
        \$('a.confirmable').click(function() {
            return confirm('Вы уверены?');
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "Default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 43,  111 => 42,  104 => 37,  94 => 33,  90 => 32,  85 => 30,  79 => 29,  76 => 28,  72 => 27,  62 => 19,  59 => 18,  54 => 15,  51 => 14,  46 => 11,  43 => 10,  35 => 4,  32 => 3,);
    }
}
