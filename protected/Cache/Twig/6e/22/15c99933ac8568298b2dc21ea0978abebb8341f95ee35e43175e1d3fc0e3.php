<?php

/* Default.navbar.block.html */
class __TwigTemplate_6e2215c99933ac8568298b2dc21ea0978abebb8341f95ee35e43175e1d3fc0e3 extends Twig_Template
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
        $context["level"] = $this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), 0, array(), "array"), "__lvl", array());
        // line 2
        $context["count"] = 0;
        // line 3
        if ($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "count", array())) {
            // line 4
            echo "<ul class=\"nav navbar-nav\">

    ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 7
                echo "
    ";
                // line 8
                $context["current"] = $this->getAttribute($context["item"], "__lvl", array());
                // line 9
                echo "    ";
                if (((isset($context["current"]) ? $context["current"] : null) == (isset($context["level"]) ? $context["level"] : null))) {
                    // line 10
                    echo "    ";
                    if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
                        echo "</li>";
                    }
                    // line 11
                    echo "    ";
                }
                // line 12
                echo "
    ";
                // line 13
                if (((isset($context["current"]) ? $context["current"] : null) > (isset($context["level"]) ? $context["level"] : null))) {
                    // line 14
                    echo "    <ul>
    ";
                    // line 15
                    $context["level"] = (isset($context["current"]) ? $context["current"] : null);
                    // line 16
                    echo "    ";
                }
                // line 17
                echo "
    ";
                // line 18
                if (((isset($context["current"]) ? $context["current"] : null) < (isset($context["level"]) ? $context["level"] : null))) {
                    // line 19
                    echo "    ";
                    echo str_repeat("</li></ul>", ((isset($context["level"]) ? $context["level"] : null) - (isset($context["current"]) ? $context["current"] : null)));
                    echo "</li>
    ";
                    // line 20
                    $context["level"] = (isset($context["current"]) ? $context["current"] : null);
                    // line 21
                    echo "    ";
                }
                // line 22
                echo "
    <li data-id=\"";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                echo "\">
        <a href=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</a>

    ";
                // line 26
                $context["count"] = ((isset($context["count"]) ? $context["count"] : null) + 1);
                // line 27
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "    ";
            echo str_repeat("</li></ul>", (isset($context["current"]) ? $context["current"] : null));
            echo "</li>
</ul>
";
        }
    }

    public function getTemplateName()
    {
        return "Default.navbar.block.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 29,  93 => 27,  91 => 26,  84 => 24,  80 => 23,  77 => 22,  74 => 21,  72 => 20,  67 => 19,  65 => 18,  62 => 17,  59 => 16,  57 => 15,  54 => 14,  52 => 13,  49 => 12,  46 => 11,  41 => 10,  38 => 9,  36 => 8,  33 => 7,  29 => 6,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
