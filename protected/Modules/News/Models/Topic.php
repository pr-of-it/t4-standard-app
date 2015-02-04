<?php

namespace App\Modules\News\Models;

use T4\Orm\Model;

class Topic
    extends Model
{
    static protected $schema = [
        'table' => 'new_stopics',
        'columns' => [
            'title' => ['type'=>'string'],
        ],
        'relations' => [
            'stories' => ['type' => self::HAS_MANY, 'model' => Story::class]
        ]
    ];

    static protected $extensions = ['tree'];

} 