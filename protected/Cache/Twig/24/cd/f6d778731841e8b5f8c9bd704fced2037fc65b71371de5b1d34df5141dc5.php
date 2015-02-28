<?php

/* CheckPassword.html */
class __TwigTemplate_24cdf6d778731841e8b5f8c9bd704fced2037fc65b71371de5b1d34df5141dc5 extends Twig_Template
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

    // line 3
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 4
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li><a href=\"/admin/users/\">Пользователи</a></li>
    <li>Задание пароля</li>
</ol>
";
    }

    // line 11
    public function block_header($context, array $blocks = array())
    {
        // line 12
        echo "Установить пароль для пользователя
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "
<div class=\"row\">
    <form class=\"form-horizontal\" method=\"post\" enctype=\"multipart/form-data\" action=\"/admin/users/CheckPassword\">

        ";
        // line 20
        if ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "isNew", array()))) {
            // line 21
            echo "        <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "Pk", array()), "html", null, true);
            echo "\">
        ";
        }
        // line 23
        echo "
        <div class=\"form-group\">
            <label for=\"password\" class=\"col-sm-2 control-label\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "</label>
            <div class=\"col-sm-10\">
                <input type=\"text\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"введите пароль\" >
            </div>
        </div>


        <div class=\"form-group\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <button type=\"submit\" class=\"btn btn-primary\">Сохранить</button>
                <button type=\"button\" class=\"btn btn-default\" onclick=\"window.history.back();\">Отменить</button>
            </div>
        </div>

    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "CheckPassword.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 25,  67 => 23,  61 => 21,  59 => 20,  53 => 16,  50 => 15,  45 => 12,  42 => 11,  33 => 4,  30 => 3,);
    }
}
