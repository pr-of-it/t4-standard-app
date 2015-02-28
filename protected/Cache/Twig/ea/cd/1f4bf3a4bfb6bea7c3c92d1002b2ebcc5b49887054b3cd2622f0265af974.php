<?php

/* __block_installed_options.html */
class __TwigTemplate_eacd1f4bf3a4bfb6bea7c3c92d1002b2ebcc5b49887054b3cd2622f0265af974 extends Twig_Template
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
        echo "<p>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "desc", array()), "html", null, true);
        echo "</p>
<form class=\"form-horizontal\" role=\"form\">
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "allOptions", array()));
        foreach ($context['_seq'] as $context["name"] => $context["value"]) {
            // line 4
            echo "    <div class=\"form-group\">
        <label class=\"col-sm-4 control-label\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blocksAvailable"]) ? $context["blocksAvailable"] : null), $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "path", array()), array(), "array"), "options", array()), $context["name"], array(), "array"), "title", array()), "html", null, true);
            echo "</label>
        <div class=\"col-sm-8\">
            ";
            // line 7
            echo call_user_func_array($this->env->getFunction('blockOptionInput')->getCallable(), array($context["name"], $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blocksAvailable"]) ? $context["blocksAvailable"] : null), $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "path", array()), array(), "array"), "options", array()), $context["name"], array(), "array"), $context["value"], array("class" => "form-control")));
            echo "
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    ";
        if ($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "allTemplates", array())) {
            // line 12
            echo "    <div class=\"form-group\">
        <label class=\"col-sm-4 control-label\">Шаблон блока</label>
        <div class=\"col-sm-8\">
            <select name=\"template\" class=\"form-control\">
                <option value=\"\">---</option>
                ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "allTemplates", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["template"]) {
                // line 18
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $context["template"], "html", null, true);
                echo "\"";
                if (($context["template"] == $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "template", array()))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["template"], "html", null, true);
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "            </select>
        </div>
    </div>
    ";
        }
        // line 24
        echo "    <footer class=\"col-sm-offset-4 col-sm-8\">
        <input type=\"submit\" value=\"Сохранить\" class=\"btn btn-success\"";
        // line 25
        if ((!$this->getAttribute((isset($context["block"]) ? $context["block"] : null), "getAllOptions", array()))) {
            if ((!$this->getAttribute((isset($context["block"]) ? $context["block"] : null), "allTemplates", array()))) {
                echo " disabled";
            }
        }
        echo ">
    </footer>
</form>";
    }

    public function getTemplateName()
    {
        return "__block_installed_options.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 25,  82 => 24,  76 => 20,  61 => 18,  57 => 17,  50 => 12,  47 => 11,  37 => 7,  32 => 5,  29 => 4,  25 => 3,  19 => 1,);
    }
}
