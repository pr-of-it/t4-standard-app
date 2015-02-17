<?php

namespace App\Models;

use T4\Mvc\Application;
use T4\Mvc\Route;
use T4\Orm\Model;

/**
 * Class Block
 * @package App\Models
 * @property int $section
 * @property string $path
 * @property string $template
 * @property string $options
 * @property int $order
 *
 * @property \T4\Core\Config $config
 * @property string $title
 * @property string $desc
 */
class Block
    extends Model
{
    protected static $schema = [
        'table' => '__blocks',
        'columns' => [
            'section'   => ['type'=>'int'],
            'path'      => ['type'=>'string'],
            'template'  => ['type'=>'string'],
            'options'   => ['type'=>'text', 'default'=>'{}'],
            'order'     => ['type'=>'int', 'default'=>0],
        ],
    ];

    public function getConfig()
    {
        return
            !empty(Application::getInstance()->config->blocks->{$this->path})
            ? Application::getInstance()->config->blocks->{$this->path}
            : [];
    }

    public function getTitle()
    {
        return $this->config ? $this->config->title : $this->path;
    }

    public function getDesc()
    {
        return $this->config ? $this->config->desc : '';
    }

    public function getAllOptions()
    {
        $_options = (array)json_decode($this->options, true);
        $ret = [];
        if (!empty($this->config)) {
            foreach ($this->config->options as $name => $option) {
                if (isset($_options[$name])) {
                    $ret[$name] = $_options[$name];
                } else {
                    $ret[$name] = isset($option->default) ? $option->default : '';
                }
            }
        }
        return $ret;
    }

    public function getAllTemplates()
    {
        $route = new Route($this->path);
        $controller = Application::getInstance()->createController($route->module, $route->controller);
        $templates = [];
        foreach ($controller->getTemplatePaths() as $path) {
            foreach (glob($path . DS . $route->action . '.*.block.html') as $filename) {
                preg_match('~.*\.([^\.]+)\.block\.html~', basename($filename), $m);
                $templates[] = $m[1];
            }
        }
        return $templates;
    }
}