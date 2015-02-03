<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1422936021_migration_core
    extends Migration
{

    public function up()
    {
        $this->addColumn('__migrations', [
           'module' => ['type' => 'string', 'default' => 'core'],
        ]);

        $this->addIndex('__migrations', [['columns' => ['module']]]);
    }

    public function down()
    {
        $this->dropColumn('__migrations', [
            'module'
        ]);
    }

}