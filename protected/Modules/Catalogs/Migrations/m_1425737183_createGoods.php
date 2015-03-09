<?php

namespace App\Modules\Catalogs\Migrations;

use T4\Orm\Migration;

class m_1425737183_createGoods
    extends Migration
{

    public function up()
    {

        $this->createTable('goods', [
            'title'     => ['type'=>'string'],
            'description'  => ['type'=>'text'],
            'image' => ['type' =>'string '],
            '__catalog_id' => ['type' => 'link'],
        ], [
            ['columns' => ['title']],
        ]);
    }

    public function down()
    {
        $this->dropTable('goods');
    }

}