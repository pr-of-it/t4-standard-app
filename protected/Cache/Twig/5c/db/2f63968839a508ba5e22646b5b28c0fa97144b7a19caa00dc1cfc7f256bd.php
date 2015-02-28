<?php

/* Login.navbar.block.html */
class __TwigTemplate_5cdb2f63968839a508ba5e22646b5b28c0fa97144b7a19caa00dc1cfc7f256bd extends Twig_Template
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
        if ((!$this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()))) {
            // line 2
            echo "<form class=\"navbar-form navbar-right\" role=\"form\" action=\"/login.html\" method=\"post\">
    <div class=\"form-group\">
        <input type=\"text\" placeholder=\"E-mail\" class=\"form-control input-sm\" name=\"login[email]\">
    </div>
    <div class=\"form-group\">
        <input type=\"password\" placeholder=\"Пароль\" class=\"form-control input-sm\" name=\"login[password]\">
    </div>
    <div class=\"form-group\"><button type=\"submit\" class=\"btn btn-success\">Войти</button></div>
</form>
";
        } else {
            // line 12
            echo "<a href=\"/logout.html\" class=\"navbar-right\"><button class=\"btn btn-default btn-sm navbar-btn\">Выйти</button></a>
<p class=\"navbar-text navbar-right\" style=\"padding-right: 10px;\">Здравствуйте, ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "email", array()), "html", null, true);
            echo "!</p>
";
        }
    }

    public function getTemplateName()
    {
        return "Login.navbar.block.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 13,  33 => 12,  21 => 2,  19 => 1,);
    }
}
