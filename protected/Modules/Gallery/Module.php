<?php

namespace App\Modules\Gallery;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Галерея', 'icon' => '<i class="glyphicon glyphicon-picture"></i>', 'sub' => [
                ['title' => 'Альбомы', 'url' => '/admin/gallery/albums'],
                ['title' => 'Фотографии', 'url' => '/admin/gallery/'],
            ]],
        ];
    }

}