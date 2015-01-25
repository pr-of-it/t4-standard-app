<?php

namespace App\Modules\Maps\Controllers;


use App\Modules\Maps\Models\Map;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{
    public function actionMap($id)
    {
        $map = Map::findByPK($id);
        $this->data->map = $map;
        if (empty($this->data->map)) {
            throw new E404Exception;
        }
    }
} 