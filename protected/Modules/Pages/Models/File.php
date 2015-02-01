<?php

namespace App\Modules\Pages\Models;

use T4\Orm\Model;

class File
    extends Model
{

    static protected $schema = [
        'table' => 'pagefiles',
        'columns' => [
            'file' => ['type' => 'string'],
        ],
        'relations' => [
            'page' => ['type' => self::BELONGS_TO, 'model' => '\App\Modules\Pages\Models\Page'],
        ],
    ];

} 