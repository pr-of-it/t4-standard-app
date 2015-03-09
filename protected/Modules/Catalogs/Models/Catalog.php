<?php


namespace App\Modules\Catalogs\Models;


use T4\Orm\Model;

class Catalog
        extends Model
{
    static protected $schema = [
        'columns' => [
            'title' => [
                'type' => 'string',
            ],
        ],

        'relations' => [
            'goods' => ['type' => self::HAS_MANY, 'model' => goods::class],
        ]
    ];

    static protected $extensions = ['tree'];

} 