<?php

/* Roles.html */
class __TwigTemplate_957dac0b0aaa90b76ce66db7cb72e751098d6f5f8bbcbb01330ef360195a315e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admin/blank.html");

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'header' => array($this, 'block_header'),
            'toolbar' => array($this, 'block_toolbar'),
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

    // line 4
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 5
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li><a href=\"/admin/users/roles\">Роли</a></li>
</ol>
";
    }

    // line 11
    public function block_header($context, array $blocks = array())
    {
        // line 12
        echo "Роли
";
    }

    // line 15
    public function block_toolbar($context, array $blocks = array())
    {
        // line 16
        echo "<a class=\"btn btn-primary\" href=\"/admin/users/EditRole?name=new\"><i class=\"glyphicon glyphicon-plus-sign\"></i> Добавить роль</a>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div class=\"table-responsive\">
    <table class=\"table table-striped table-hover \">
        <tr class=\"info\">
            <th>Роли пользователей</th>
            <th>Назначение роли </th>
            <th>Действие</th>
            <th></th>
        </tr>
        ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "        <tr>
            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>
            ";
            // line 32
            if (($this->getAttribute($context["item"], "name", array()) == "admin")) {
                // line 33
                echo "            <td><a class=\"btn btn-danger\" href=\"#\"><i class=\"glyphicon glyphicon-minus-sign\"></i> Не трогать</a></td>
            ";
            } else {
                // line 35
                echo "            <td><a class=\"btn btn-primary\" href=\"/admin/users/EditRole?name=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\"><i class=\"glyphicon glyphicon-pencil\"></i></a></td>
            <td><a class=\"btn btn-danger confirmable\" href=\"/admin/users/DeleteRole?name=";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\"><i class=\"glyphicon glyphicon-remove\"></i></a></td>
            ";
            }
            // line 38
            echo "        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "Roles.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 40,  102 => 38,  97 => 36,  92 => 35,  88 => 33,  86 => 32,  82 => 31,  78 => 30,  75 => 29,  71 => 28,  61 => 20,  58 => 19,  53 => 16,  50 => 15,  45 => 12,  42 => 11,  34 => 5,  31 => 4,);
    }
}
