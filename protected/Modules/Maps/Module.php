<?php

namespace App\Modules\Maps;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Карты', 'icon' => '<i class="glyphicon glyphicon-globe"></i>',  'url' => '/admin/maps'],
        ];
    }

} 