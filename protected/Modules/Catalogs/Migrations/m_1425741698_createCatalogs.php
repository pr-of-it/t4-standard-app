<?php

namespace App\Modules\Catalogs\Migrations;

use T4\Orm\Migration;

class m_1425741698_createCatalogs
    extends Migration
{

    public function up()
    {
        $this->createTable('catalogs',
            [
                'title' => [
                    'type' => 'string',
                    'length' => 1024,
                ],
                'type' => 'int',
            ],
            [
            ],
            ['tree']
        );
    }

    public function down()
    {
        $this->dropTable('catalogs');
    }


}