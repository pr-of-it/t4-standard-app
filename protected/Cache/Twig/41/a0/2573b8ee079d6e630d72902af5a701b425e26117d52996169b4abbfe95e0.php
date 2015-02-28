<?php

/* Admin/__sidebar.html */
class __TwigTemplate_41a02573b8ee079d6e630d72902af5a701b425e26117d52996169b4abbfe95e0 extends Twig_Template
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
        echo "<div class=\"navbar-default sidebar\" role=\"navigation\">
    <div class=\"sidebar-nav navbar-collapse\">
        <ul class=\"nav\" id=\"side-menu\">
            <li class=\"sidebar-search\">
                <div class=\"input-group custom-search-form\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">
                                <span class=\"input-group-btn\">
                                    <button class=\"btn btn-default\" type=\"button\">
                                        <i class=\"fa fa-search\"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href=\"/admin\"><i class=\"glyphicon glyphicon-home\"></i> Админ-панель</a>
            </li>
            <li>
                <a href=\"/admin/blocks\"><i class=\"glyphicon glyphicon-th-large\"></i> Блоки</a>
            </li>
            ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "modules", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 22
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module"], "adminMenu", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 23
                echo "                ";
                if ($this->getAttribute($context["item"], "url", array())) {
                    // line 24
                    echo "                <li>
                    <a href=\"";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                    echo "\">";
                    echo $this->getAttribute($context["item"], "icon", array());
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                    echo "</a>
                </li>
                ";
                } else {
                    // line 28
                    echo "                <li>
                    <a href=\"#\"> ";
                    // line 29
                    echo $this->getAttribute($context["item"], "icon", array());
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                    echo "<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        ";
                    // line 31
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "sub", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                        // line 32
                        echo "                        <li>
                            <a href=\"";
                        // line 33
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sub"], "url", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sub"], "title", array()), "html", null, true);
                        echo "</a>
                        </li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 36
                    echo "                    </ul>
                </li>
                ";
                }
                // line 39
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            <!--
            <li>
                <a href=\"#\"><i class=\"fa fa-wrench fa-fw\"></i> UI Elements<span class=\"fa arrow\"></span></a>
                <ul class=\"nav nav-second-level\">
                    <li>
                        <a href=\"panels-wells.html\">Panels and Wells</a>
                    </li>
                    <li>
                        <a href=\"buttons.html\">Buttons</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"#\"><i class=\"fa fa-sitemap fa-fw\"></i> Multi-Level Dropdown<span class=\"fa arrow\"></span></a>
                <ul class=\"nav nav-second-level\">
                    <li>
                        <a href=\"#\">Second Level Item</a>
                    </li>
                    <li>
                        <a href=\"#\">Second Level Item</a>
                    </li>
                    <li>
                        <a href=\"#\">Third Level <span class=\"fa arrow\"></span></a>
                        <ul class=\"nav nav-third-level\">
                            <li>
                                <a href=\"#\">Third Level Item</a>
                            </li>
                            <li>
                                <a href=\"#\">Third Level Item</a>
                            </li>
                            <li>
                                <a href=\"#\">Third Level Item</a>
                            </li>
                            <li>
                                <a href=\"#\">Third Level Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            -->
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->";
    }

    public function getTemplateName()
    {
        return "Admin/__sidebar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 41,  105 => 40,  99 => 39,  94 => 36,  83 => 33,  80 => 32,  76 => 31,  69 => 29,  66 => 28,  56 => 25,  53 => 24,  50 => 23,  45 => 22,  41 => 21,  19 => 1,);
    }
}
