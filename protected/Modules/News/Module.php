<?php

namespace App\Modules\News;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['icon' => '<i class="fa fa-th-list fa-fw"></i>', 'url' => '/admin/news/', 'title' => 'Новости'],
        ];
    }

} 