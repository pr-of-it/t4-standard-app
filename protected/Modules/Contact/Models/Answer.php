<?php

namespace App\Modules\Contact\Models;


use T4\Orm\Model;

class Answer
      extends Model
{
    static protected $schema = [
        'table' => 'answer',
        'columns' => [
            'datetime' => ['type'=>'datetime'],
            'email' => ['type' => 'string'],
            'message' =>['type' => 'text'],
            '__user_id' => ['type' => 'string'],
        ],
    ];
}