<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Core\Std;
use T4\Mvc\Controller;
use App\Models\User;
use T4\Crypt\Helpers;

class Index
    extends Controller
{

    public function actionDefault()
    {
    }

    public function  actionMobile($map_id=0,$page_id=1)
    {
        if($map_id!=0){

            $this->data->map_id=$map_id;
        }

         $this->data->page_id=$page_id;
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

    public function actionRegister()
    {
    }

    public function actionCaptcha()
    {
        $this->app->extensions->captcha->generateImage();
        die();
    }

}
