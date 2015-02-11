<?php
namespace App\Components;

use T4\Core\Session;

class Captcha
{
    public static function getUrlCaptcha()
    {
        $app = \T4\Mvc\Application::getInstance();
        var_dump($app->extensions->captcha->getCaptcha());
        die();
        //Session::set('keystring', $app->extensions->captcha->getCaptcha());
        //var_dump($_SESSION['keystring']);
        //var_dump( session_name());
        //die();
       // return Session::get('keystring');

    }
}