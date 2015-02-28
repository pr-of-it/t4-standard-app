<?php

/* Default.html */
class __TwigTemplate_904eb49f272dbff76871574b21adc3bbad1884aa90d6c924886a39b8ac1cd851 extends Twig_Template
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
        // line 2
        $context["Tree"] = $this->env->loadTemplate("Admin/Macros/Tree.html");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 5
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li>Страницы</li>
</ol>
";
    }

    // line 11
    public function block_toolbar($context, array $blocks = array())
    {
        // line 12
        echo "<a class=\"btn btn-primary\" href=\"/admin/pages/edit?id=new\"><i class=\"glyphicon glyphicon-plus-sign\"></i> Добавить страницу</a>
";
    }

    // line 15
    public function block_header($context, array $blocks = array())
    {
        // line 16
        echo "Страницы
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div class=\"row\">
    ";
        // line 21
        echo $context["Tree"]->getlistSortable((isset($context["items"]) ? $context["items"] : null), "/admin/pages/");
        echo "
</div>
";
    }

    // line 25
    public function block_pagescript($context, array $blocks = array())
    {
        // line 26
        echo "<script type=\"text/javascript\">
    \$(function() {

        \$('a.confirmable').click(function() {
            return confirm('Вы уверены?');
        });

        ";
        // line 33
        echo $context["Tree"]->getlistSortableJs("/admin/pages/");
        echo "
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
        return array (  86 => 33,  77 => 26,  74 => 25,  67 => 21,  64 => 20,  61 => 19,  56 => 16,  53 => 15,  48 => 12,  45 => 11,  37 => 5,  34 => 4,  29 => 2,);
    }
}
