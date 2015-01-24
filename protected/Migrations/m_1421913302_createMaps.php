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
            'latitude' => ['type' => 'float', 'dimension' => '8,6'],
            'longitude' => ['type' => 'float', 'dimension' => '8,6'],
            'width' => ['type' => 'integer'],
            'height' => ['type' => 'integer'],
            'zoom' => ['type' => 'integer'],
            'layer' => ['type' => 'string', 'default' => 'map'],
            'ptLatitude' => ['type' => 'float', 'dimension' => '8,6'],
            'ptLongitude' => ['type' => 'float', 'dimension' => '8,6'],
            'ptStyle' => ['type' => 'string', 'default' => 'flag'],
        ]);

        $map = new Map();
        $map->title = 'Карта Москвы';
        $map->latitude = 37.620071;
        $map->longitude = 55.753632;
        $map->width = 450;
        $map->height = 450;
        $map->zoom = 13;
        $map->ptLatitude = 37.620071;
        $map->ptLongitude = 55.753632;
        $map->save();

        $map1 = new Map();
        $map1->title = 'Уменьшенная карта Москвы';
        $map1->latitude = 37.620071;
        $map1->longitude = 55.753632;
        $map1->width = 200;
        $map1->height = 200;
        $map1->zoom = 15;
        $map1->ptLatitude = 37.620071;
        $map1->ptLongitude = 55.753632;
        $map1->save();
    }

    public function down()
    {
        $this->dropTable('maps');
    }

}