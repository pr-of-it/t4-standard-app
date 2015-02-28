<?php

/* Roleuser.html */
class __TwigTemplate_48378ddf89f6fb0d071c5d5b3d38dcfdb92416ff5e6b84f841bb9f1bf1e4589d extends Twig_Template
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
    <li><a href=\"/admin/users\">Пользователи</a></li>
    <li><a href=\"/admin/users/role\">Роли пользователя</a></li>
</ol>
";
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo "Роли Пользователя ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "
";
    }

    // line 16
    public function block_toolbar($context, array $blocks = array())
    {
        // line 17
        echo "<div class=\"btn-group\">
    <a class=\"btn dropdown-toggle btn-primary\" data-toggle=\"dropdown\" href=\"#\"><i class=\"glyphicon glyphicon-plus-sign\"></i>
        Добавить роль пользователю
        <span class=\"caret\"></span>
    </a>
    <ul class=\"dropdown-menu\">
        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["addrole"]) ? $context["addrole"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 24
            echo "        <li>
            <a href=\"/admin/users/roleuser?id=";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "&namerole=";
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "</a>
        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    </ul>
</div>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "<div class=\"table-responsive\">
    <table class=\"table table-striped table-hover \">
        <tr class=\"info\">
            <th>";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["users"]) ? $context["users"] : null), "html", null, true);
        echo "</th>
            <th> Назначение роли</th>
            <th></th>
        </tr>
        ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userrole"]) ? $context["userrole"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 43
            echo "        <tr>
            <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>
            ";
            // line 46
            if (($this->getAttribute($context["item"], "name", array()) == "admin")) {
                // line 47
                echo "            <td> <a class=\"btn btn-danger\" href=\"#\"><i class=\"glyphicon glyphicon-warning-sign\"></i></a></td>
            ";
            } else {
                // line 49
                echo "            <td><a class=\"btn btn-primary\"  href=\"/admin/users/DeleteRoleUser?id=";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                echo "&namerole=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "&idrole=";
                echo twig_escape_filter($this->env, ($this->getAttribute($context["loop"], "index", array()) - 1), "html", null, true);
                echo "\">Удалить роль</a></td>
            ";
            }
            // line 51
            echo "        </tr>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "Roleuser.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 53,  149 => 51,  139 => 49,  135 => 47,  133 => 46,  129 => 45,  125 => 44,  122 => 43,  105 => 42,  98 => 38,  93 => 35,  90 => 34,  84 => 28,  71 => 25,  68 => 24,  64 => 23,  56 => 17,  53 => 16,  46 => 13,  43 => 12,  34 => 5,  31 => 4,);
    }
}
