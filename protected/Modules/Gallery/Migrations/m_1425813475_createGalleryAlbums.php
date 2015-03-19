<?php

namespace App\Modules\Gallery\Migrations;

use T4\Orm\Migration;

class m_1425813475_createGalleryAlbums
    extends Migration
{

    public function up()
    {
        $this->createTable('albums',[
            'title' => ['type'=>'string'],
            'a_published' => ['type'=>'datetime'],
        ], [
        ]
        );
    }

    public function down()
    {
        $this->dropTable('album');
    }

}