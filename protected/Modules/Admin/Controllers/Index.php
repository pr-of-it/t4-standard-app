<?php

namespace App\Modules\Admin\Controllers;

use App\Components\Admin\Controller;
use T4\Http\E404Exception;
use T4\Mvc\Route;
use T4\Mvc\Router;

class Index
    extends Controller
{

    public function actionDefault()
    {
    }

    public function actionModule($module, $action=Router::DEFAULT_ACTION)
    {
        $controllerClass = '\\App\\Modules\\' . ucfirst($module) .'\\Controllers\\Admin';
        if (!class_exists($controllerClass)) {
            throw new E404Exception('Не найден админ-контроллер в модуле ' . $module);
        }

        $route = new Route('/' . ucfirst($module) . '/Admin/' . ucfirst($action));
        $this->app->runRoute($route);
        exit;
    }

}