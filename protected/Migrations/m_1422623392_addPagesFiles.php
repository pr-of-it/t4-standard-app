<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1422623392_addPagesFiles
    extends Migration
{

    public function up()
    {
        $this->createTable('pagefiles', [
            '__page_id' => ['type' => 'link'],
            'file' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropTable('pagefiles');
    }

}