<?php


namespace App\Modules\Contact;

class Module
    extends \App\Components\Module
{

    public function getAdminMenu()
    {
        return [
            ['title' => 'Сообщения', 'url' => '/admin/contact/'],
        ];
    }

}