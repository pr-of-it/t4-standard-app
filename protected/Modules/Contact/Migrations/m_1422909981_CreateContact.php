<?php

namespace App\Modules\Contact\Migrations;

use T4\Orm\Migration;

class m_1422909981_CreateContact
    extends Migration
{

    public function up()
    {
        $this->createTable('contact', [
            'datetime' => ['type' => 'datetime'],
            'email' => ['type' => 'string'],
            'name' => ['type' => 'string'],
            'message' => ['type' => 'text'],
            '__answer_id' => ['type' => 'link'],
            '__user_id' => ['type' => 'link'],
        ],
            [
                'user' => ['columns' => ['__user_id']],
                'answer' => ['columns' => ['__answer_id']]
            ]
        );
    }

    public function down()
    {
        $this->dropTable('contact');
    }

}