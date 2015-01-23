<?php

namespace App\Components;

use T4\Core\Session;

class Locator
{

    public static function getLocation()
    {
        if (null == Session::get('location')) {
            $app = \T4\Mvc\Application::getInstance();
            Session::set('location', $app->extensions->sxgeo->getLocation($app->request->ip));
        }
        return Session::get('location');
    }

}