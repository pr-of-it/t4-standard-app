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
            'contact_id' => ['type' => 'string'],
        ],
        'relations' => [
            'contact' => ['type'=>self::BELONGS_TO, 'model'=>Contact::class],
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