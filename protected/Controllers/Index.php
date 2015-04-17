<?php

namespace App\Controllers;

use T4\Mvc\Controller;

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
