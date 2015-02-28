<?php

/* Edit.html */
class __TwigTemplate_6e24559668cb78e887e112d03f29c8f561a6bb82f36f48cf235e79316316c629 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admin/Blank.html");

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
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
    <li><a href=\"/admin/maps/\">Карты</a></li>
    <li>";
        // line 7
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array())) {
            echo "Добавление карты";
        } else {
            echo "Редактирование карты";
        }
        echo "</li>
</ol>
";
    }

    // line 11
    public function block_header($context, array $blocks = array())
    {
        // line 12
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array())) {
            echo "Добавление карты";
        } else {
            echo "Редактирование карты";
        }
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "
<link rel=stylesheet href=\"";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Modules/Maps/Templates/assets/css/mapsadmin.css")), "html", null, true);
        echo "\">

<div class=\"row\">
    <div class=\"col-xs-12\">
        <div id=\"map\"></div>
    </div>
</div>
<hr>

<div class=\"row\">
    <form class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\" action=\"/admin/maps/save\">

        ";
        // line 29
        if ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array()))) {
            // line 30
            echo "        <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "Pk", array()), "html", null, true);
            echo "\">
        ";
        }
        // line 32
        echo "
        <div class=\"form-group\">
            <label for=\"title\" class=\"col-sm-2 control-label\">Название</label>
            <div class=\"col-sm-10\">
                <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" placeholder=\"Название\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
        echo "\">
            </div>
        </div>

        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">Центр карты</label>
            <div class=\"col-sm-10\">
                <div class=\"row\">
                    <div class=\"col-xs-6\">
                        <label for=\"latitude\">Широта</label>
                        <input type=\"text\" class=\"form-control\" id=\"latitude\" name=\"latitude\" placeholder=\"Широта\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "latitude", array()), "html", null, true);
        echo "\" required>
                    </div>
                    <div class=\"col-xs-6\">
                        <label for=\"longitude\">Долгота</label>
                        <input type=\"text\" class=\"form-control\" id=\"longitude\" name=\"longitude\" placeholder=\"Долгота\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "longitude", array()), "html", null, true);
        echo "\" required>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">Размер карты</label>
            <div class=\"col-sm-10\">
                <div class=\"row\">
                    <div class=\"col-xs-6\">
                        <label for=\"width\">Ширина</label>
                        <input type=\"text\" class=\"form-control\" id=\"width\" name=\"width\" placeholder=\"Ширина\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "width", array()), "html", null, true);
        echo "\" required>
                    </div>
                    <div class=\"col-xs-6\">
                        <label for=\"height\">Высота</label>
                        <input type=\"text\" class=\"form-control\" id=\"height\" name=\"height\" placeholder=\"Высота\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "height", array()), "html", null, true);
        echo "\" required>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"form-group\">
            <label for=\"zoom\" class=\"col-sm-2 control-label\">Масштаб</label>
            <div class=\"col-sm-10\">
                <input type=\"text\" class=\"form-control\" id=\"zoom\" name=\"zoom\" placeholder=\"Масштаб\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "zoom", array()), "html", null, true);
        echo "\">
            </div>
        </div>

        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">Координаты метки</label>
            <div class=\"col-sm-10\">
                <div class=\"row\">
                    <div class=\"col-xs-6\">
                        <label for=\"ptLatitude\">Широта</label>
                        <input type=\"text\" class=\"form-control\" id=\"ptLatitude\" name=\"ptLatitude\" placeholder=\"Широта\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ptLatitude", array()), "html", null, true);
        echo "\" required>
                    </div>
                    <div class=\"col-xs-6\">
                        <label for=\"ptLongitude\">Долгота</label>
                        <input type=\"text\" class=\"form-control\" id=\"ptLongitude\" name=\"ptLongitude\" placeholder=\"Долгота\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ptLongitude", array()), "html", null, true);
        echo "\" required>
                    </div>
                </div>
            </div>
        </div>

        <footer class=\"col-sm-offset-2 col-sm-10\">
            <button type=\"submit\" class=\"btn btn-primary\">";
        // line 96
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array())) {
            echo "Создать";
        } else {
            echo "Сохранить";
        }
        echo "</button>
            <button type=\"button\" class=\"btn btn-default\" onclick=\"window.history.back();\">Отменить</button>
            ";
        // line 98
        if ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array()))) {
            echo "<a href=\"/admin/maps/delete/?id=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "Pk", array()), "html", null, true);
            echo "\" class=\"confirmable\"><button type=\"button\" class=\"btn btn-danger\">Удалить</button></a>";
        }
        // line 99
        echo "        </footer>

    </form>
</div>

";
    }

    // line 106
    public function block_pagescript($context, array $blocks = array())
    {
        // line 107
        echo "<script src=\"http://api-maps.yandex.ru/2.1/?lang=ru_RU\" type=\"text/javascript\"></script>
<script src=\"";
        // line 108
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Modules/Maps/Templates/assets/js/maps.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    \$(function () {
        \$('a.confirmable').click(function() {
            return confirm('Вы уверены?');
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "Edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 108,  207 => 107,  204 => 106,  195 => 99,  189 => 98,  180 => 96,  170 => 89,  163 => 85,  150 => 75,  138 => 66,  131 => 62,  116 => 50,  109 => 46,  96 => 36,  90 => 32,  84 => 30,  82 => 29,  67 => 17,  64 => 16,  61 => 15,  53 => 12,  50 => 11,  39 => 7,  34 => 4,  31 => 3,);
    }
}
