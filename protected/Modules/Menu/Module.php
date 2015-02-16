<?php

namespace App\Modules\Menu;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Меню', 'icon' => '<i class="glyphicon glyphicon-menu-hamburger"></i>', 'url' => '/admin/menu/'],
        ];
    }

} 