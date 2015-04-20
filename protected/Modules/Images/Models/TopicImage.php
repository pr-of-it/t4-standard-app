<?php
namespace App\Modules\Images\Models;

use T4\Orm\Model;
use App\Modules\Images\ImgManager;

class TopicImage
      extends Model
{
    static protected $schema = [
        'columns' => [
            'name' => ['type'=>'string'],
        ],
        'relations' => [
            'imgmanager' => ['type'=>self::BELONGS_TO, 'imgmanager'=>ImgManager::class]
        ]
    ];
}