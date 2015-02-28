<?php

/* Default.html */
class __TwigTemplate_955d2b1cd3a2cd61e3d035726738ac0ff5819d5a7587713abf026d963ee1b166 extends Twig_Template
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
    <li><a href=\"/admin/users/\">Пользователи</a></li>
</ol>
";
    }

    // line 11
    public function block_header($context, array $blocks = array())
    {
        // line 12
        echo "   Пользователи
";
    }

    // line 15
    public function block_toolbar($context, array $blocks = array())
    {
        // line 16
        echo "
";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "<div class=\"table-responsive \">
    <table class=\"table table-striped table-hover table  \">
        <tr class=\"info\">
            <th>E-MAIL пользователя</th>
            <th></th>
            <th>Действия</th>
            <th></th>
        </tr>
        ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 31
            echo "        <tr>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "email", array()), "html", null, true);
            echo "</td>
            <td><a class=\"btn btn-primary\" href=\"/admin/users/CheckPassword?id=";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "\">Сменить пароль</a></td>
            <td><a class=\"btn btn-primary\" href=\"/admin/users/roleuser?id=";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
            echo "\">Роли пользователя</a></td>
            ";
            // line 35
            if (($this->getAttribute($context["item"], "email", array()) != "admin@t4.org")) {
                // line 36
                echo "            <td><a class=\"btn btn-danger\" href=\"/admin/users/DeleteUser?id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                echo "\">Удалить пользователя</a></td>
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
        return "Default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 40,  98 => 38,  92 => 36,  90 => 35,  86 => 34,  82 => 33,  78 => 32,  75 => 31,  71 => 30,  61 => 22,  58 => 21,  53 => 16,  50 => 15,  45 => 12,  42 => 11,  34 => 5,  31 => 4,);
    }
}
