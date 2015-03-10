<?php
namespace App\Modules\Contact\Controllers;
use App\Models\User;
use App\Modules\Contact\Models\Contact;
use T4\Core\MultiException;
use T4\Mvc\Controller;
class Index
    extends Controller
{
    const ERROR_INVALID_EMAIL = 100;
    const ERROR_INVALID_CAPTCHA = 102;


    public function actionDefault()
    {
        if ( !empty($this->app->request->post->message) ) {
            try {
                $question = new Contact();
                $question->fill($this->app->request->post->message);
                $question->save();
                $this->redirect('/contact/sent');
            } catch (MultiException $e) {
                $this->data->errors = $e;
            }
        }

        $this->data->merge($this->app->request->post->message);

        if (empty ($this->data->email) && !empty($this->app->user)) {
            $this->data->email = $this->app->user->email;
        }
    }
    public function actionSent()
    {
    }
    /*
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
    */
}