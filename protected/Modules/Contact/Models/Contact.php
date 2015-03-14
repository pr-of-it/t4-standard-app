<?php

namespace App\Modules\Contact\Models;

use App\Models\User;
use T4\Core\MultiException;
use T4\Orm\Model;

class Contact
    extends Model
{
    static protected $schema = [
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

    public function validate()
    {
        $errors = new MultiException();

        if (empty($this->name)) {
            $errors->add('Укажите свое имя');
        }

        if (empty($this->email) ) {
            $errors->add('Не введен e-mail');
        }

        if (!empty($this->email) ) {
            if (false === ($this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL)) ) {
                $errors->add('Неверный e-mail');
            }
        }

        if (empty($this->question)) {
            $errors->add('Не указан вопрос');
        }
        /*
        if ($this->app->config->extensions->captcha->message) {
            if (!empty($data['captcha'])) {
                if (!$this->app->extensions->captcha->checkKeyString($data['captcha'])) {
                    $errors->add('Неправильно введены символы с картинки', self::ERROR_INVALID_CAPTCHA);
                }
            } else {
                $errors->add('Не введены символы с картинки');
            }
        }
        */
        if (!$errors->isEmpty()) {
            throw $errors;
        }

        return true;
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