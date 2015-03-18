<?php


namespace App\Modules\Catalogs\Models ;


use T4\Orm\Model;

class CatalogGoods
        extends Model
{
    static protected $schema = [
        'title' => [
            'type' => 'string',
            'length' => 1024,
        ],

        'relations' => [
            'goods' => ['type'=>self::BELONGS_TO, 'model'=>goods::class],
        ]
    ];

    static protected $extensions = ['tree'];

} 