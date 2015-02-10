<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Core\Std;
use T4\Mvc\Controller;
use App\Models\User;

class Index
    extends Controller
{

    public function actionDefault()
    {
    }

    public function actionLogin($email = null, $password = null)
    {
        if (!is_null($email) || !is_null($password)) {
            try {
                $identity = new Identity();
                $user = $identity->authenticate(new Std(['email' => $email, 'password' => $password]));
                $this->app->flash->message = 'Добро пожаловать, ' . $user->email . '!';
                $this->redirect('/');
            } catch (\T4\Auth\Exception $e) {
                $this->app->flash->error = $e->getMessage();
            }
        }

        $this->data->email = $email;
    }

    public function actionLogout()
    {
        $identity = new Identity();
        $identity->logout();
        $this->redirect('/');
    }

    public function actionRegistry($email = null, $password = null)
    {
        $this->app->flash->message='Введите свой е-mail и пароль';
        if (!is_null($email) || !is_null($password)) {

            $id=User::findByColumn('email', $email);
            if(!$id) {
                $user= new User();
                $user->fill($this->app->request->post);
                $user->save();
            } else{
                $this->app->flash->message='Пользователь с таким e-mail уже зарегестрирован';
                return $this->redirect('/Registry');
            }

            $this->app->flash->message = 'Все хорошо';
        }
    }

    public function actionCaptcha()
    {
        $this->app->extensions->captcha->generateImage();
        die();
    }
}
