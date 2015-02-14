<?php

namespace App\Modules\Users;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
                ['title' => 'Пользователи', 'url' => '/admin/users/'],
        ];
    }

} 