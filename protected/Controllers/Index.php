<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Core\Std;
use T4\Mvc\Controller;

class Index
    extends Controller
{
//for commit

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
        if (!empty($this->app->user)) {
            $this->redirect('/');
        }

        if (!is_null($email) || !is_null($password)) {
            try {
                $identity = new Identity();
                $user = $identity->authenticate(new Std(['email' => $email, 'password' => $password]));
                $this->app->flash->message = 'Welcome back, ' . $user->email . '!';
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
