<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Mvc\Controller;
use App\Models\User;
use T4\Mail\Sender;
use T4\Core\Session;

class Index
    extends Controller
{

    public function actionDefault()
    {
    }

    public function action404()
    {
    }

    public function actionRegister($register = null)
    {
        if (null !== $register) {
            try {
                $identity = new Identity();
                $user = $identity->register($register);
                $identity->login($user);
                $this->app->flash->message = 'Добро пожаловать, ' . $user->email . '!';
                $this->redirect('/');
            } catch (\App\Components\Auth\MultiException $e) {
                $this->data->errors = $e;
            }
            $this->data->email = $register->email;
        }
    }

    public function actionCaptcha($config = null)
    {
        if (null !== $config) {
            $config = $this->app->config->extensions->captcha->$config;
        }
        $this->app->extensions->captcha->generateImage($config);
        die;
    }

}
