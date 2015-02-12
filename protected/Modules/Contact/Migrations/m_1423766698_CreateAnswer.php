<?php

namespace App\Modules\Contact\Migrations;

use T4\Orm\Migration;

class m_1423766698_CreateAnswer
    extends Migration
{

    public function up()
    {
        $this->createTable('answer',[
            'datetime' => ['type'=>'datetime'],
            'email' => ['type' => 'string'],
            'message' =>['type' => 'text'],
            '__user_id' => ['type' => 'string'],
            ],
            [
            ]
        );
    }

    public function down()
    {
        $this->dropTable('answer');
    }

}