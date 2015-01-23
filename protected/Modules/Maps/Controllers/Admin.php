<?php

namespace App\Modules\Maps\Controllers;

use App\Modules\Maps\Models\Map;
use T4\Mvc\Controller;

class Admin
    extends Controller
{
    protected function access($action)
    {
        return !empty($this->app->user);
    }

    public function actionDefault()
    {
        $this->data->maps = Map::findAll();
    }

    public function actionEdit($id)
    {
        $this->data->map = Map::findByPK($id);
    }
} 