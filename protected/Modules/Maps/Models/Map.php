<?php

namespace App\Modules\Maps\Models;

use T4\Orm\Model;

class Map
    extends Model
{
    static protected $schema = [
        'columns' => [
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
        ],
    ];
} 