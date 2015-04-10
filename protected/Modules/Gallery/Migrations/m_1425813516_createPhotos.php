<?php

namespace App\Modules\Gallery\Migrations;

use T4\Orm\Migration;

class m_1425813516_createPhotos
    extends Migration
{

    public function up()
    {
        $this->createTable('photos', [
            'title' => ['type' => 'string'],
            'image' => ['type' => 'string'],
            'published' => ['type' => 'datetime'],
            '__album_id' => ['type' => 'link'],
        ], [
            'album' => ['columns' => ['__album_id']]
        ]);
    }

    public function down()
    {
        $this->dropTable('photos');
    }

}