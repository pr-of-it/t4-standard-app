<?php

namespace App\Modules\Message\Migrations;

use T4\Orm\Migration;

class m_1424204358_CreateMessages
    extends Migration
{

    public function up()
    {
        $this->createTable('messages', [
            'q_datetime' => ['type' => 'datetime'],
            'email' => ['type' => 'string'],
            'name' => ['type' => 'string'],
            'question' => ['type' => 'text'],
            'a_datetime' => ['type' => 'datetime'],
            'answer' => ['type' => 'text'],
            '__user_id' => ['type' => 'link'],
        ],
            [
                'user' => ['columns' => ['__user_id']],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('messages');
    }

}