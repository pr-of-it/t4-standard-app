<?php

namespace App\Modules\News\Migrations;

use T4\Orm\Migration;

class m_1423048663_createStories
    extends Migration
{

    public function up()
    {
        $this->createTable('news_stories', [
            'title' => ['type'=>'string', 'length' => 1024],
            'published' => ['type'=>'datetime'],
            'image' => ['type'=>'string'],
            'lead' => ['type'=>'text'],
            'text' => ['type'=>'text'],
            '__topic_id' => ['type'=>'link'],
        ], [
            'topic'=>['columns'=>['__topic_id']]
        ]);
    }

    public function down()
    {
        $this->dropTable('news_stories');
    }

}