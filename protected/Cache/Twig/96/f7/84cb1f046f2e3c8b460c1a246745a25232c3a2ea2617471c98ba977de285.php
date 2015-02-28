<?php

/* Admin/Macros/Tree.html */
class __TwigTemplate_96f784cb1f046f2e3c8b460c1a246745a25232c3a2ea2617471c98ba977de285 extends Twig_Template
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
        // line 54
        echo "
";
    }

    // line 1
    public function getlistSortable($__items__ = null, $__baselink__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "baselink" => $__baselink__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    ";
            // line 3
            $context["level"] = $this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), 0, array(), "array"), "__lvl", array());
            // line 4
            echo "    ";
            $context["count"] = 0;
            // line 5
            echo "    ";
            if ($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "count", array())) {
                // line 6
                echo "    <ul class=\"list-unstyled list-sortable\">

        ";
                // line 8
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 9
                    echo "
        ";
                    // line 10
                    $context["current"] = $this->getAttribute($context["item"], "__lvl", array());
                    // line 11
                    echo "        ";
                    if (((isset($context["current"]) ? $context["current"] : null) == (isset($context["level"]) ? $context["level"] : null))) {
                        // line 12
                        echo "        ";
                        if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
                            echo "</li>";
                        }
                        // line 13
                        echo "        ";
                    }
                    // line 14
                    echo "
        ";
                    // line 15
                    if (((isset($context["current"]) ? $context["current"] : null) > (isset($context["level"]) ? $context["level"] : null))) {
                        // line 16
                        echo "        <ul class=\"list-unstyled list-sortable\" style=\"margin-left: 20px;\">
            ";
                        // line 17
                        $context["level"] = (isset($context["current"]) ? $context["current"] : null);
                        // line 18
                        echo "            ";
                    }
                    // line 19
                    echo "
            ";
                    // line 20
                    if (((isset($context["current"]) ? $context["current"] : null) < (isset($context["level"]) ? $context["level"] : null))) {
                        // line 21
                        echo "            ";
                        echo str_repeat("</li></ul>", ((isset($context["level"]) ? $context["level"] : null) - (isset($context["current"]) ? $context["current"] : null)));
                        echo "</li>
        ";
                        // line 22
                        $context["level"] = (isset($context["current"]) ? $context["current"] : null);
                        // line 23
                        echo "        ";
                    }
                    // line 24
                    echo "
        <li data-id=\"";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                    echo "\">
            <div class=\"list-group-item\">
                <div class=\"btn btn-default btn-sm list-sortable-handle\" data-id=\"";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                    echo "\"><i class=\"glyphicon glyphicon-resize-vertical\"></i></div>&nbsp;&nbsp;
                ";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                    echo "
                <p class=\"pull-right\">
                    ";
                    // line 30
                    if ($this->getAttribute($context["item"], "hasPrevSibling", array())) {
                        // line 31
                        echo "                    <a class=\"btn btn-info btn-sm\" href=\"";
                        echo twig_escape_filter($this->env, (isset($context["baselink"]) ? $context["baselink"] : null), "html", null, true);
                        echo "Up/?id=";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                        echo "\"><i class=\"glyphicon glyphicon-arrow-up\"></i></a>
                    ";
                    } else {
                        // line 33
                        echo "                    <button class=\"btn btn-default btn-sm\"><i class=\"glyphicon glyphicon-option-horizontal\"></i></button>
                    ";
                    }
                    // line 35
                    echo "                    ";
                    if ($this->getAttribute($context["item"], "hasNextSibling", array())) {
                        // line 36
                        echo "                    <a class=\"btn btn-info btn-sm\" href=\"";
                        echo twig_escape_filter($this->env, (isset($context["baselink"]) ? $context["baselink"] : null), "html", null, true);
                        echo "Down/?id=";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                        echo "\"><i class=\"glyphicon glyphicon-arrow-down\"></i></a>
                    ";
                    } else {
                        // line 38
                        echo "                    <button class=\"btn btn-default btn-sm\"><i class=\"glyphicon glyphicon-option-horizontal\"></i></button>
                    ";
                    }
                    // line 40
                    echo "                    &nbsp;&nbsp;
                    <a class=\"btn btn-primary btn-sm\" href=\"";
                    // line 41
                    echo twig_escape_filter($this->env, (isset($context["baselink"]) ? $context["baselink"] : null), "html", null, true);
                    echo "Edit/?id=";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                    echo "\"><i class=\"glyphicon glyphicon-edit\"></i></a>
                    <a class=\"btn btn-danger btn-sm\" href=\"";
                    // line 42
                    echo twig_escape_filter($this->env, (isset($context["baselink"]) ? $context["baselink"] : null), "html", null, true);
                    echo "Delete/?id=";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "Pk", array()), "html", null, true);
                    echo "\" class=\"confirmable\"><i class=\"glyphicon glyphicon-remove\"></i></a>
                </p>
            </div>

            ";
                    // line 46
                    $context["count"] = ((isset($context["count"]) ? $context["count"] : null) + 1);
                    // line 47
                    echo "
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 49
                echo "            ";
                echo str_repeat("</li></ul>", (isset($context["current"]) ? $context["current"] : null));
                echo "</li>
    </ul>
    ";
            }
            // line 52
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 55
    public function getlistSortableJs($__baseurl__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "baseurl" => $__baseurl__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 56
            echo "    \$('.list-sortable').sortable({
        axis: \"y\",
        placeholder: \"list-group-item ui-state-highlight\",
        handle: \".list-sortable-handle\",
        update: function( event, ui ) {
            var prevSibling = ui.item.prev();
            var nextSibling = ui.item.next();
            if (!\$.isEmptyObject(prevSibling) && undefined != prevSibling.attr('data-id')) {
                var url = '";
            // line 64
            echo twig_escape_filter($this->env, (isset($context["baseurl"]) ? $context["baseurl"] : null), "html", null, true);
            echo "MoveAfter.json';
                var siblingId = prevSibling.attr('data-id');
            } else {
                var url = '";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["baseurl"]) ? $context["baseurl"] : null), "html", null, true);
            echo "MoveBefore.json';
                var siblingId = nextSibling.attr('data-id');
            }
            \$.post(url, {id: ui.item.attr('data-id') ,to: siblingId}, function (r) {
                if (!r.result) {
                    alert(r.error);
                }
            });
        }
    });
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "Admin/Macros/Tree.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 67,  212 => 64,  202 => 56,  191 => 55,  179 => 52,  172 => 49,  165 => 47,  163 => 46,  154 => 42,  148 => 41,  145 => 40,  141 => 38,  133 => 36,  130 => 35,  126 => 33,  118 => 31,  116 => 30,  111 => 28,  107 => 27,  102 => 25,  99 => 24,  96 => 23,  94 => 22,  89 => 21,  87 => 20,  84 => 19,  81 => 18,  79 => 17,  76 => 16,  74 => 15,  71 => 14,  68 => 13,  63 => 12,  60 => 11,  58 => 10,  55 => 9,  51 => 8,  47 => 6,  44 => 5,  41 => 4,  39 => 3,  36 => 2,  24 => 1,  19 => 54,);
    }
}
