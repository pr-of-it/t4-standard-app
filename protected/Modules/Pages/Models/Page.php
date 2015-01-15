<?php

namespace App\Modules\Pages\Models;

use T4\Orm\Model;

class Page
    extends Model
{
    static protected $schema = [
        'columns' => [
            'url' => ['type' => 'string'],
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
        ],
    ];
}