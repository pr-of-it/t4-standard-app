<?php

/* EditRole.html */
class __TwigTemplate_a4cbe389fb005869942b3b1c39b2bfb386d4403abd1e3ec453f2b3ba5452f74a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admin/blank.html");

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admin/blank.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 3
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li><a href=\"/admin/roles/\">Роли</a></li>
    <li>Добавление роли</li>
</ol>
";
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array())) {
            echo "Добавление роли";
        } else {
            echo "Редактирование роли";
        }
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
<div class=\"row\">
    <form class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\" action=\"/admin/users/save\">

        ";
        // line 19
        if ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array()))) {
            // line 20
            echo "        <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "Pk", array()), "html", null, true);
            echo "\">
        ";
        }
        // line 22
        echo "
        <div class=\"form-group\">
            <label for=\"title\" class=\"col-sm-2 control-label\">Назначение роли</label>
            <div class=\"col-sm-10\">
                <input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" placeholder=\"Назначение роли\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()), "html", null, true);
        echo "\" >
            </div>
        </div>

        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\">Имя роли</label>
            <div class=\"col-sm-10\">
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"имя роли\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
        echo "\">
            </div>
        </div>

        <div class=\"form-group\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <button type=\"submit\" class=\"btn btn-primary\">";
        // line 39
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array())) {
            echo "Создать";
        } else {
            echo "Сохранить";
        }
        echo "</button>
                <button type=\"button\" class=\"btn btn-default\" onclick=\"window.history.back();\">Отменить</button>
                ";
        // line 41
        if ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array()))) {
            echo "<a href=\"/admin/users/DeleteRole/?name=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array()), "html", null, true);
            echo "\" class=\"confirmable\"><button type=\"button\" class=\"btn btn-danger\">Удалить</button></a>";
        }
        // line 42
        echo "            </div>
        </div>

    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "EditRole.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 42,  104 => 41,  95 => 39,  86 => 33,  76 => 26,  70 => 22,  64 => 20,  62 => 19,  56 => 15,  53 => 14,  45 => 11,  42 => 10,  33 => 3,  30 => 2,);
    }
}
