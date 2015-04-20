<?php

namespace App\Modules\Images\Models;

use T4\Orm\Model;
use App\Modules\Images\TopicImage;

class ImgManager
    extends Model
{
    static protected $schema = [
        'img' => [
            'image' => ['type'=>'string', 'default'=>''],
            'lead' => ['type'=>'text'],
            'text' => ['type'=>'text'],
        ],
        'relations' => [
            'topicimage' => ['type' => self::HAS_MANY, 'topicimage' => User::class]
        ]
    ];

}