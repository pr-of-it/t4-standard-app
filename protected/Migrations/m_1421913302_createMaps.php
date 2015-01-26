<?php

namespace App\Migrations;

use App\Modules\Maps\Models\Map;
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

        $map = new Map();
        $map->title = 'Карта Москвы';
        $map->latitude = 55.75358253;
        $map->longitude = 37.62091000;
        $map->width = 450;
        $map->height = 450;
        $map->zoom = 13;
        $map->ptLatitude = 55.75358253;
        $map->ptLongitude = 37.62091000;
        $map->save();

        $map1 = new Map();
        $map1->title = 'Уменьшенная карта Москвы';
        $map1->latitude = 55.75358253;
        $map1->longitude = 37.62091000;
        $map1->width = 200;
        $map1->height = 200;
        $map1->zoom = 15;
        $map1->ptLatitude = 55.75358253;
        $map1->ptLongitude = 37.62091000;
        $map1->save();
    }

    public function down()
    {
        $this->dropTable('maps');
    }

}