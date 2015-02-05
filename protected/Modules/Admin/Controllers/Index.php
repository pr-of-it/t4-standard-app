<?php

namespace App\Modules\Admin\Controllers;

use App\Components\Admin\Controller;
use T4\Core\Exception;
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
        try {

            $route = new Route('/' . ucfirst($module) . '/Admin/' . ucfirst($action));
            $this->app->runRoute($route);
            exit;

        } catch (Exception $e) {
            throw new E404Exception('Ошибка админ-панели в модуле ' . $module . ': ' . $e->getMessage());
        }
    }

}