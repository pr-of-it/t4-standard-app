<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use T4\Core\Std;
use T4\Mvc\Controller;
use App\Modules\Pages\Models;

class Index
    extends Controller
{

    public function actionDefault($url='')
    {
        if($url!=''){
            $this->data->url=$url;
        } else {

            $this->data->url='index';
        }
    }

    public function  actionMobile($map_id=0,$page_id=1)
    {
        if($map_id!=0){

            $this->data->map_id=$map_id;
        }

         $this->data->page_id=$page_id;
    }

    public function actionThemes($theme_id=0)
    {
        switch($theme_id){
            case $theme_id==1: $this->app->assets->registerCssUrl('//bootswatch.com/darkly/bootstrap.min.css');
                var_dump($this->app->assets->getPublishedCss());

        }
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

    public function actionMenu()
    {
        $this->data->items = \App\Modules\Pages\Models\Page::findAllTree();
    }

}
