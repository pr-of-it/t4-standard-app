<?php

/* Default.html */
class __TwigTemplate_4f9adaab0d4130a10b3e1c07fa86d5889ccedc657923158fcdc0dc0cbdf1226b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Admin/Blank.html");

        $this->blocks = array(
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'pagescript' => array($this, 'block_pagescript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admin/Blank.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 4
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"/admin/\">Админ-панель</a></li>
    <li>Блоки</li>
</ol>
";
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        echo "Блоки
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
<style>
    .panel-heading {cursor: move;}
</style>

<h2>Размещенные на сайте</h2>

<div class=\"row\">
    <div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : null));
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
        foreach ($context['_seq'] as $context["id"] => $context["section"]) {
            // line 25
            echo "        <div class=\"panel panel-default\" id=\"section-";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\">
            <div class=\"panel-heading\" role=\"tab\" id=\"heading-";
            // line 26
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\">
                <h4 class=\"panel-title\">
                    <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse-";
            // line 28
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\" aria-expanded=\"";
            if (($context["id"] == 1)) {
                echo "true";
            } else {
                echo "false";
            }
            echo "\" aria-controls=\"collapse-";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\">
                        #";
            // line 29
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "title", array()), "html", null, true);
            echo "
                    </a>
                </h4>
            </div>
            <div id=\"collapse-";
            // line 33
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\" class=\"panel-collapse collapse ";
            if (($context["id"] == 1)) {
                echo "in";
            }
            echo "\" role=\"tabpanel\" aria-labelledby=\"heading-";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\">
                <div class=\"panel-body\">
                    <div style=\"min-height:200px;\" class=\"row block-drop-area\">

                        ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["blocksInstalled"]) ? $context["blocksInstalled"] : null), $context["id"], array(), "array"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 38
                echo "                        ";
                $this->env->loadTemplate("__block_installed.html")->display($context);
                // line 39
                echo "                        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "
                    </div>
                </div>
            </div>
        </div>
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
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "    </div>
</div>

<h2>Доступные к размещению</h2>

<div class=\"row\">
    ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocksAvailable"]) ? $context["blocksAvailable"] : null));
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
        foreach ($context['_seq'] as $context["path"] => $context["block"]) {
            // line 53
            echo "    ";
            $this->env->loadTemplate("__block_available.html")->display($context);
            // line 54
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['path'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "</div>

";
    }

    // line 59
    public function block_pagescript($context, array $blocks = array())
    {
        // line 60
        echo "<script type=\"text/javascript\">
    \$(function () {

        uninstallBlock = function (button, event) {
            event.preventDefault();
            var block = button.parents(\".block-installed\");
            var blockId = block.attr('data-id');
            \$.get('/admin/blocks/uninstallBlock.json', {
                id: blockId
            }, function (data) {
                if (data.result) {
                    block.remove();
                }
            });
        };
        \$(\".block-uninstall\").click(function (event) {
            uninstallBlock(\$(this), event);
        });

        saveBlockOptions = function (button, event) {
            event.preventDefault();
            button.removeClass('btn-success');
            button.addClass('btn-warning');
            var blockId = button.parents(\".block-installed\").attr('data-id');
            var data = button.parents(\"form\").serializeArray();
            \$.get('/admin/blocks/updateBlockOptions.json', {
                id: blockId,
                options: data
            }, function (data) {
                button.removeClass('btn-warning');
                button.addClass('btn-success');
            });
            return false;
        };
        \$(\"#accordion form input[type='submit']\").click(function (event) {
            saveBlockOptions(\$(this), event);
        });

        \$(\".block-available-draggable\").draggable({handle: \".panel-heading\", cursor: \"move\", revert: true});
        \$(\".block-drop-area\").droppable({
            accept: '.block-available-draggable',
            drop: function (event, ui) {
                var sectionId = \$(this).parents('.panel').attr('data-id');
                var block = ui.draggable;
                var blockPath = block.attr('data-block-path');
                \$.get('/admin/blocks/setupBlock.json', {
                    sectionId: sectionId,
                    blockPath: blockPath
                }, function (data) {
                    if (data.result) {
                        var installedBlock = block.clone();

                        installedBlock
                                .removeClass('ui-draggable')
                                .removeClass('ui-draggable-dragging')
                                .removeClass('block-available-draggable');
                        installedBlock.removeAttr('style');
                        installedBlock.addClass('block-installed');

                        installedBlock.removeAttr('data-block-path');
                        installedBlock.attr('data-id', data.id);

                        \$('#collapse-'+sectionId+' .panel-body .row').append(installedBlock);

                        installedBlock.find('.panel-body').load('/admin/blocks/getFormForBlock', {\"id\": data.id}, function() {
                            installedBlock.find('form input[type=submit]').click(function (event) {
                                saveBlockOptions(\$(this), event);
                            });
                            installedBlock.find('h4.panel-title').append('<button type=\"button\" class=\"close pull-right block-uninstall\" aria-label=\"Закрыть\"><span aria-hidden=\"true\">&times;</span></button>');
                            installedBlock.find('.block-uninstall').click(function (event) {
                                uninstallBlock(\$(this), event);
                            });
                        });

                    };
                });
            }
        });
    });
</script>
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
        return array (  231 => 60,  228 => 59,  222 => 55,  208 => 54,  205 => 53,  188 => 52,  180 => 46,  161 => 40,  147 => 39,  144 => 38,  127 => 37,  114 => 33,  105 => 29,  93 => 28,  88 => 26,  81 => 25,  64 => 24,  53 => 15,  50 => 14,  45 => 11,  42 => 10,  34 => 4,  31 => 3,);
    }
}
