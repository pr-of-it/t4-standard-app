<?php

namespace App\Modules\News\Migrations;

use T4\Orm\Migration;

class m_1423048590_createTopics
    extends Migration
{

    public function up()
    {
        $this->createTable('news_topics', [
            'title' => ['type'=>'string']
        ], [

        ], [
            'tree'
        ]);
    }

    public function down()
    {
        $this->dropTable('news_topics');
    }

}