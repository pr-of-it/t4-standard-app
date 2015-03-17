<?php

namespace App\Modules\Menu\Migrations;

use T4\Orm\Migration;

class m_1423714113_createMenu
    extends Migration
{

    public function up()
    {
        $this->createTable('menu',
            [
            'title' => ['type' => 'string', 'length' => 1024],
            'url' => ['type' => 'string'],
            ],
            [
            ],
            ['tree']
        );

        $this->insert('menu', [
                'title' => 'Новости',
                'url' => '/news',
                '__lft' => '1',
                '__rgt' => '2',
                '__lvl' => '0',
                '__prt' => '0',
            ]
        );
        $this->insert('menu', [
            'title' => 'Контакты',
            'url' => '/contact',
            '__lft' => '3',
            '__rgt' => '4',
            '__lvl' => '0',
            '__prt' => '0',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('menu');
    }
}