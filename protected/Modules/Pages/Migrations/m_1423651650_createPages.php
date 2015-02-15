<?php

namespace App\Modules\Pages\Migrations;

use T4\Orm\Migration;

class m_1423651650_createPages
    extends Migration
{

    public function up()
    {
        $this->createTable('pages',
            [
                'title' => [
                    'type' => 'string',
                    'length' => 1024,
                ],
                'url' => [
                    'type' => 'string',
                ],
                'text' => [
                    'type' => 'text',
                    'length' => 'big',
                ],
            ],
            [
                ['columns' => ['url']],
            ],
            ['tree']
        );
        $this->insert('pages', ['title' => 'Главная страница', 'url' => 'index', 'text' => 'Добро пожаловать на ваш новый сайт!']);
    }


    public function down()
    {
        $this->dropTable('pages');
    }


}