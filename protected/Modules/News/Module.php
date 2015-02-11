<?php

namespace App\Modules\News;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Новости', 'icon' => '<i class="glyphicon glyphicon-th-list"></i>', 'sub' => [
                ['title' => 'Рубрики', 'url' => '/admin/news/topics'],
                ['title' => 'Новости', 'url' => '/admin/news/'],
            ]],
        ];
    }

} 