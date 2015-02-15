<?php

namespace App\Modules\Users;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return  [
            ['title' => 'Пользователи и роли', 'icon' => '<i class="glyphicon glyphicon-th-list"></i>', 'sub' => [
                ['title' => 'Пользователи', 'url' => '/admin/users/'],
                ['title' => 'Роли', 'url' => '/admin/users/roles/'],
            ]],
        ];

    }

} 