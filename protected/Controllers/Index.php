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

    public function actionCaptcha($config = null)
    {
        if (null !== $config) {
            $config = $this->app->config->extensions->captcha->$config;
        }
        $this->app->extensions->captcha->generateImage($config);
        die;
    }

}
