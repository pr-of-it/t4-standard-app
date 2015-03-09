<?php

namespace App\Modules\Contact\Models;

use App\Models\User;
use  T4\Orm\Model;

class Contact
    extends Model
{
    static protected $schema = [
        'table' => 'contact',
        'columns' => [
            'q_datetime' => ['type' => 'datetime'],
            'email' => ['type' => 'string'],
            'name' => ['type' => 'string'],
            'question' => ['type' => 'text'],
            'a_datetime' => ['type' => 'datetime'],
            'answer' => ['type' => 'text'],
        ],
        'relations' => [
            'user' => ['type' => self::BELONGS_TO, 'model' => User::class]
        ]
    ];

    public function validate(){
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else
            return false;
    }

    public function beforeSave()
    {
        if ($this->isNew()) {
            $this->q_datetime = date('Y-m-d H:i:s', time());
        } else {
            $this->a_datetime = date('Y-m-d H:i:s', time());
        }
        return true;
    }





}