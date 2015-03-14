<?php

namespace App\Modules\Menu\Models;


use T4\Orm\Model;

class MenuItem
    extends Model
{
    static protected $schema = [
        'table' => 'menu',
        'columns' => [
            'title' => [
                'type' => 'string',
            ],
            'url' => [
                'type' => 'string',
            ],
        ],
    ];

    static protected $extensions = ['tree'];

}