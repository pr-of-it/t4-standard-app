<?php

namespace App\Modules\Pages\Migrations;

use T4\Orm\Migration;

class m_1423658732_createPages
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