<?php

namespace App\Modules\Maps\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Maps\Models\Map;

class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->maps = Map::findAll();
    }

    public function actionEdit($id)
    {
        $this->data->map = Map::findByPK($id);
    }

    public function actionSave()
    {
        $id = $this->app->request->post->id;
        if (!empty($id)) {
            $map = Map::findByPK($id);
        } else {
            $map = new Map();
        }
        $map->fill($this->app->request->post);
        $map->save();
        $this->redirect('/maps/admin/');
    }

    public function actionDelete($id)
    {
        $map = Map::findByPK($id);
        if ($map) {
            $map->delete();
        }
        $this->redirect('/maps/admin/');
    }

}