<?php

/* Index.html */
class __TwigTemplate_6d53b594b5794ae7a5bfed8cc23eecde6107d2108ce52b1f6447a937bfc7fef4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html xmlns:t4=\"http://www.w3.org/1999/html\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>T4 Site</title>

    ";
        // line 12
        echo call_user_func_array($this->env->getFunction('publishCss')->getCallable(), array());
        echo "
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>

<body>

<nav class=\"navbar navbar-inverse navbar-static-top\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"/\">T4 Site</a>
        </div>
        <div id=\"navbar\" class=\"collapse navbar-collapse\">
            <t4:block path=\"/Menu//\" template=\"navbar\" />
            <t4:block path=\"///Login\" template=\"navbar\" />
        </div>
    </div>
</nav>

<div class=\"container\">
    <t4:section id=\"1\" />
    ";
        // line 42
        $this->displayBlock('content', $context, $blocks);
        // line 43
        echo "    <t4:section id=\"2\" />
    <hr>
    <footer>
        <p>&copy; ProfIT</p>
    </footer>
</div>

";
        // line 50
        echo call_user_func_array($this->env->getFunction('publishJs')->getCallable(), array());
        echo "

</body>
</html>";
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 42,  77 => 50,  68 => 43,  66 => 42,  33 => 12,  20 => 1,);
    }
}
