<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1421913302_createMaps
    extends Migration
{

    public function up()
    {
        $this->createTable('maps', [
            'longitude' => ['type' => 'float', 'dimension' => '8,6'],
            'latitude' => ['type' => 'float', 'dimension' => '8,6'],
            'width' => ['type' => 'integer'],
            'height' => ['type' => 'integer'],
            'zoom' => ['type' => 'integer'],
            'layer' => ['type' => 'string', 'default' => 'map'],
            'ptLongitude' => ['type' => 'float', 'dimension' => '8,6'],
            'ptLatitude' => ['type' => 'float', 'dimension' => '8,6'],
            'ptStyle' => ['type' => 'string', 'default' => 'flag'],
        ]);
    }

    public function down()
    {
        $this->dropTable('maps');
    }

}