<?php


namespace App\Modules\Message\Controllers;

use App\Models\User;
use App\Modules\Message\Models\Message;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    const ERROR_INVALID_EMAIL = 100;

    public function actionDefault()
    {

    }

    public function checkdata($data)
    {
        $errors = new MultiException();

        if (empty($data['name'])) {
            $errors->add('Укажите свое имя');
        }
        if (empty($data['email'])) {
            $errors->add('Не введен e-mail', self::ERROR_INVALID_EMAIL);
        }
        if (!empty($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors->add('Введите корректный адрес эл.почты');
            }
        }
        if (empty($data['question'])) {
            $errors->add('Напишите Ваш вопрос');
        }
        if (!$errors->isEmpty())
            throw $errors;
    }

    public function actionSave($data)
    {
        try {
            $this->checkdata($data);
            $question = new Message();
            $question->fill($this->app->request->post);
            $question->save();
        } catch (\App\Modules\Message\Controllers\MultiException $e) {
            $this->app->flash->errors = $e;
        }
        $this->redirect('/message');
    }
}