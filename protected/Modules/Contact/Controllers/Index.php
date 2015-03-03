<?php


namespace App\Modules\Contact\Controllers;

use App\Models\User;
use App\Modules\Contact\Models\Contact;
use App\Components\Auth\MultiException;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    const ERROR_INVALID_EMAIL = 100;
    const ERROR_INVALID_CAPTCHA = 102;

    public function actionDefault($data = null)
    {
        if (isset($this->app->request->post->submit)) {
            try {
                $this->checkdata($data);
                $question = new Contact();
                $question->fill($this->app->request->post);
                $question->save();
                $this->redirect('/contact/sent');
            } catch (\App\Components\Auth\MultiException $e) {
                $this->app->flash->errors = $e;
                $post = $this->app->request->post;
                $this->data->name = $post->name;
                $this->data->email = $post->email;
                $this->data->question = $post->question;
            }
        } else
            $this->data->email = $this->app->user->email;
    }

    public function actionSent()
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
        if (empty($data['question'])) {
            $errors->add('Напишите Ваш вопрос');
        }
        if ($this->app->config->extensions->captcha->message) {
            if (!empty($data['captcha'])) {
                if (!$this->app->extensions->captcha->checkKeyString($data['captcha'])) {
                    $errors->add('Неправильно введены символы с картинки', self::ERROR_INVALID_CAPTCHA);
                }
            } else {
                $errors->add('Не введены символы с картинки');
            }
        }
        if (!$errors->isEmpty())
            throw $errors;

    }

}