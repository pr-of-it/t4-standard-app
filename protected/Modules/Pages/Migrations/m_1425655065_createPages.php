<?php

namespace App\Modules\Pages\Migrations;

use T4\Orm\Migration;

class m_1425655065_createPages
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
            ],
            ['tree']
        );
    }

    public function down()
    {
        $this->dropTable('pages');
    }

}