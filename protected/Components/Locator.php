<?php

namespace App\Components;

class Locator
{

    public static function getLocation()
    {
        $app = \T4\Mvc\Application::getInstance();
        return $app->extensions->sxgeo->getLocation($app->request->ip);
    }

}