<?php

namespace App\Modules\Menu;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Меню', 'url' => '/admin/menu/'],
        ];
    }

} 