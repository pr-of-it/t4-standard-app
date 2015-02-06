<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Core\Std;
use T4\Mvc\Controller;

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

}
