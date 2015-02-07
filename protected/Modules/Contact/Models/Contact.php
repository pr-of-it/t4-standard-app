<?php

namespace App\Modules\Contact\Models;

use  T4\Orm\Model;

class Contact
       extends Model
{
    static protected $schema = [
        'table' => 'contact',
        'columns' => [
            'name' => ['type' => 'string'],
            'published' => ['type'=>'datetime'],
            'tel' => ['type' => 'string'],
            'email' => ['type' => 'string'],
            'message' =>['type' => 'text']
        ],
    ];


}

