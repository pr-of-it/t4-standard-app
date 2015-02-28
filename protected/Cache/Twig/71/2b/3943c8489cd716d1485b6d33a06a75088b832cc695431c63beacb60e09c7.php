<?php

/* Register.block.html */
class __TwigTemplate_712b3943c8489cd716d1485b6d33a06a75088b832cc695431c63beacb60e09c7 extends Twig_Template
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
        echo "<form class=\"form-horizontal\" role=\"form\" action=\"/register.html\" method=\"post\">
    <div class=\"form-group\">
        <label for=\"register[email]\" class=\"col-sm-2 control-label\">E-mail</label>
        <div class=\"col-sm-10\">
            <input type=\"email\" class=\"form-control\" id=\"register[email]\" name=\"register[email]\" placeholder=\"Ваш адрес e-mail\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "\">
        </div>
    </div>
    <div class=\"form-group\">
        <label for=\"register[password]\" class=\"col-sm-2 control-label\">Пароль</label>
        <div class=\"col-sm-10\">
            <input type=\"password\" class=\"form-control\" id=\"register[password]\" name=\"register[password]\" placeholder=\"Ваш пароль\">
        </div>
    </div>
    <div class=\"form-group\">
        <label for=\"register[password2]\" class=\"col-sm-2 control-label\">Повтор пароля</label>
        <div class=\"col-sm-10\">
            <input type=\"password\" class=\"form-control\" id=\"register[password2]\" name=\"register[password2]\" placeholder=\"Введите пароль еще раз\">
        </div>
    </div>

    ";
        // line 21
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "config", array()), "extensions", array()), "captcha", array()), "register", array())) {
            // line 22
            echo "    <div class=\"form-group\">
        <label class=\"col-sm-2 control-label\"></label>
        <div class=\"col-sm-10\">
            <img src=\"/captcha\">
        </div>
    </div>
    <div class=\"form-group\">
        <label for=\"register[captcha]\" class=\"col-sm-2 control-label\">Вы не робот ?</label>
        <div class=\"col-sm-10\">
            <input type=\"text\" class=\"form-control\" id=\"register[captcha]\" name=\"register[captcha]\" placeholder=\"Введите символы с картинки\">
        </div>
    </div>
    ";
        }
        // line 35
        echo "
    <footer class=\"col-sm-offset-2 col-sm-10\">
        <button type=\"submit\" class=\"btn btn-success\">Зарегистрироваться</button>
        <button type=\"button\" class=\"btn btn-default\" onclick=\"window.history.back();\">Отказаться</button>
    </footer>

</form>";
    }

    public function getTemplateName()
    {
        return "Register.block.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 35,  46 => 22,  44 => 21,  25 => 5,  19 => 1,);
    }
}
