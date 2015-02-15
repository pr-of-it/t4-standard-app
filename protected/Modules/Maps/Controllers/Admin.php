<?php

namespace App\Modules\Maps\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Maps\Models\Map;

class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->items = Map::findAll();
    }

    public function actionEdit($id = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Map();
        } else {
            $this->data->item = Map::findByPK($id);
        }
    }

    public function actionSave()
    {
        $id = $this->app->request->post->id;
        if (!empty($id)) {
            $item = Map::findByPK($id);
        } else {
            $item = new Map();
        }
        $item->fill($this->app->request->post);
        $item->save();
        $this->redirect('/admin/maps');
    }

    public function actionDelete($id)
    {
        $item = Map::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/maps');
    }

}