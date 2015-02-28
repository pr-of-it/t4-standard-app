<?php

namespace App\Modules\Pages;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
                ['title' => 'Страницы','icon' => '<i class="glyphicon glyphicon-list-alt"></i>', 'url' => '/admin/pages/'],
        ];
    }

} 