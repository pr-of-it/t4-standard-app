<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1422625830_createPages
    extends Migration
{

    public function up()
    {
        $this->dropTable('pages');
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
                'order' => [
                    'type' => 'int'
                ],
                'template' => [
                    'type' => 'string',
                ],
            ],
            [
                ['columns' => ['url']],
                ['columns' => ['order']]
            ],
            ['tree']
        );
    }



    public function down()
    {
        $this->dropTable('pages');
    }

}