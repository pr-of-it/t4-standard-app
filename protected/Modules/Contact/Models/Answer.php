<?php

namespace App\Modules\Contact\Models;


use T4\Orm\Model;

class Answer
    extends Model
{
    static protected $schema = [
        'table' => 'answer',
        'columns' => [
            'datetime' => ['type' => 'datetime'],
            'message' => ['type' => 'text'],
        ],
        'relations' => [
            'contact' => ['type' => self::HAS_MANY, 'model' => Contact::class],
        ]
    ];

    public function beforeSave()
    {
        if ($this->isNew()) {
            $this->datetime = date('Y-m-d H:i:s', time());
        }
        return true;
    }

}