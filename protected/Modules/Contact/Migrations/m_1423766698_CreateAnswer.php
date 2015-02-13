<?php

namespace App\Modules\Contact\Migrations;

use T4\Orm\Migration;

class m_1423766698_CreateAnswer
    extends Migration
{

    public function up()
    {
        $this->createTable('answer', [
            'datetime' => ['type' => 'datetime'],
            'message' => ['type' => 'text'],
            '__contact_id' => ['type' => 'link'],
        ],
            [
                'contact' => ['columns' => ['__contact_id']]
            ]
        );
    }

    public function down()
    {
        $this->dropTable('answer');
    }

}