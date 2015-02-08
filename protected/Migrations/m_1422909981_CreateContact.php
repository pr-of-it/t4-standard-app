<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1422909981_CreateContact
    extends Migration
{

    public function up()
    {
        $this->createTable('contact',[
                'published' => ['type'=>'datetime'],
                'email' => ['type' => 'string'],
                'message' =>['type' => 'text'],
            ],
            [
            ]
        );
    }

    public function down()
    {
        $this->dropTable('contact');
    }

}