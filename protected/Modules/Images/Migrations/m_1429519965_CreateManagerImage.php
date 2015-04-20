<?php

namespace App\Modules\Images\Migrations;

use T4\Orm\Migration;

class m_1429519965_CreateManagerImage
    extends Migration
{

    public function up()
    {
        if (!$this->existsTable('imgmanager')) {

            $this->createTable('imgmanager', [
                'image' => ['type' => 'string'],
                '__topicimage_id' => ['type'=>'link'],
            ]);
        }
    }

    public function down()
    {
        $this->dropTable("imgmanager");
    }

}