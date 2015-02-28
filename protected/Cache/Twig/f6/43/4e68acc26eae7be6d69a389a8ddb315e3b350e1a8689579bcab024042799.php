<?php

/* Admin/blank.html */
class __TwigTemplate_f6434e68acc26eae7be6d69a389a8ddb315e3b350e1a8689579bcab024042799 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'toolbar' => array($this, 'block_toolbar'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'pagescript' => array($this, 'block_pagescript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Админ-панель T4</title>

    ";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('publish')->getCallable(), array("/Layouts/Admin/assets")), "html", null, true);
        echo "

    <!-- Bootstrap Core CSS -->
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <!-- MetisMenu CSS -->
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets/bower_components/metisMenu/dist/metisMenu.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <!-- Custom CSS -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets/dist/css/sb-admin-2.css")), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <!-- Custom Fonts -->
    <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets/bower_components/font-awesome/css/font-awesome.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

    <link href=\"https://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css\" rel=\"stylesheet\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body>

    <div id=\"wrapper\">

        <!-- Navigation -->
        <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"/admin\">Админ-панель T4</a>
                <a class=\"navbar-brand\" href=\"/\">На сайт</a>
            </div>
            <!-- /.navbar-header -->

            ";
        // line 54
        $this->env->loadTemplate("Admin/__toplinks.html")->display($context);
        // line 55
        echo "
            ";
        // line 56
        $this->env->loadTemplate("Admin/__sidebar.html")->display($context);
        // line 57
        echo "
        </nav>

        <!-- Page Content -->
        <div id=\"page-wrapper\">
            <div class=\"container-fluid\">
                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        ";
        // line 65
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 66
        echo "                        <div class=\"pull-right\">";
        $this->displayBlock('toolbar', $context, $blocks);
        echo "</div>
                        <h1>";
        // line 67
        $this->displayBlock('header', $context, $blocks);
        echo "</h1>
                        <hr>
                        ";
        // line 69
        $this->displayBlock('content', $context, $blocks);
        // line 70
        echo "                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    ";
        // line 82
        echo call_user_func_array($this->env->getFunction('publishJs')->getCallable(), array());
        echo "

    <script src=\"https://code.jquery.com/ui/1.11.2/jquery-ui.min.js\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets//bower_components/metisMenu/dist/metisMenu.min.js")), "html", null, true);
        echo "\"></script>
    <!-- Custom Theme JavaScript -->
    <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("/Layouts/Admin/assets//dist/js/sb-admin-2.js")), "html", null, true);
        echo "\"></script>

    ";
        // line 91
        $this->displayBlock('pagescript', $context, $blocks);
        // line 92
        echo "

</body>

</html>
";
    }

    // line 65
    public function block_breadcrumbs($context, array $blocks = array())
    {
    }

    // line 66
    public function block_toolbar($context, array $blocks = array())
    {
    }

    // line 67
    public function block_header($context, array $blocks = array())
    {
    }

    // line 69
    public function block_content($context, array $blocks = array())
    {
    }

    // line 91
    public function block_pagescript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admin/blank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 91,  183 => 69,  178 => 67,  173 => 66,  168 => 65,  159 => 92,  157 => 91,  152 => 89,  147 => 87,  139 => 82,  125 => 70,  123 => 69,  118 => 67,  113 => 66,  111 => 65,  101 => 57,  99 => 56,  96 => 55,  94 => 54,  60 => 23,  55 => 21,  50 => 19,  45 => 17,  39 => 14,  24 => 1,);
    }
}
