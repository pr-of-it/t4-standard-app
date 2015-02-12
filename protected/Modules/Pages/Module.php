<?php

namespace App\Modules\Pages;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
                ['title' => 'Страницы', 'url' => '/admin/pages/'],
        ];
    }

} 