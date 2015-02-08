<?php

namespace App\Modules\Contact\Models;

use  T4\Orm\Model;

class Contact
       extends Model
{
    static protected $schema = [
        'table' => 'contact',
        'columns' => [
            'published' => ['type'=>'datetime'],
            'email' => ['type' => 'string'],
            'message' =>['type' => 'text']
        ],
    ];


}

