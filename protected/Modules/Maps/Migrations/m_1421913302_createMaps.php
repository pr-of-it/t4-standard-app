<?php

namespace App\Modules\Maps\Migrations;

use T4\Orm\Migration;

class m_1421913302_createMaps
    extends Migration
{

    public function up()
    {
        $this->createTable('maps', [
            'title' => ['type' => 'string'],
            'latitude' => ['type' => 'float', 'dimension' => '11,8'],
            'longitude' => ['type' => 'float', 'dimension' => '11,8'],
            'width' => ['type' => 'integer'],
            'height' => ['type' => 'integer'],
            'zoom' => ['type' => 'integer'],
            'layer' => ['type' => 'string', 'default' => 'map'],
            'ptLatitude' => ['type' => 'float', 'dimension' => '11,8'],
            'ptLongitude' => ['type' => 'float', 'dimension' => '11,8'],
            'ptStyle' => ['type' => 'string', 'default' => 'flag'],
        ]);

        $this->insert('maps', [
            'title' => 'Карта Москвы',
            'latitude' => 55.75358253,
            'longitude' => 37.62091000,
            'width' => 450,
            'height' => 450,
            'zoom' => 13,
            'ptLatitude' => 55.75358253,
            'ptLongitude' => 37.62091000,
        ]);
        $this->insert('maps', [
            'title' => 'Уменьшенная карта Москвы',
            'latitude' => 55.75358253,
            'longitude' => 37.62091000,
            'width' => 200,
            'height' => 200,
            'zoom' => 15,
            'ptLatitude' => 55.75358253,
            'ptLongitude' => 37.62091000,
        ]);
    }

    public function down()
    {
        $this->dropTable('maps');
    }

}