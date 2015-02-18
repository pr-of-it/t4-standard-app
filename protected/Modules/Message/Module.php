<?php


namespace App\Modules\Message;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Сообщения', 'icon' => '<i class="glyphicon glyphicon-envelope"></i>', 'url' => '/admin/message/'],
        ];
    }

}