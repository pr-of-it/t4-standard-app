<?php

namespace App\Modules\Images\Migrations;

use T4\Orm\Migration;

class m_1429519989_CreateTopicImage
    extends Migration
{

    public function up()
    {
        if (!$this->existsTable('topicimage')) {

            $this->createTable('topicimage', [
                'name' => ['type' => 'string'],
            ]);
        }
    }

        public function down()
        {
            $this->dropTable("topicimage");
        }
}