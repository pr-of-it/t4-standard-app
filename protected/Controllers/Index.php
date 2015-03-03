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

    public function actionLogin($login = null)
    {
        if (null !== $login) {
            try {
                $identity = new Identity();
                $user = $identity->authenticate($login);
                $this->app->flash->message = 'Добро пожаловать, ' . $user->email . '!';
                $this->redirect('/');
            } catch (\App\Components\Auth\MultiException $e) {
                $this->data->errors = $e;
            }
            $this->data->email = $login->email;
        }
    }

    public function actionLogout()
    {
        $identity = new Identity();
        $identity->logout();
        $this->redirect('/');
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

    public function actionCaptcha()
    {
        $this->app->extensions->captcha->generateImage();
        die;
    }

    public function actionRestorePassword($restore=null,$step=0)
    {
        if (null !== $restore) {
            try {
                $identity = new Identity();
                $user = $identity->restorePassword($restore,$step);
                if (null == Session::get('contolstring')) {
                    $controlstring='abc';
                    Session::set('controlstring',$controlstring);
                    $mail = new Sender();
                    $mail->sendMail($restore->email, 'Востановление пароля', 'Для восстановления пароля введите этот код: '.$controlstring);
                    $this->data->step=true;
                    $step=2;
                }
            } catch (\App\Components\Auth\MultiException $e) {
                $this->data->errors = $e;
            }
        } else {
            $this->data->check=false;
        }
    }

}
