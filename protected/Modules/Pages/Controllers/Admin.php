<?php

namespace App\Modules\Pages\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Pages\Models\Page;

class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->items = Page::findAll();
    }

    public function actionEdit($id='new')
    {
        if (null == $id || 'new' == $id) {
            $this->data->item = new Page();
        } else {
            $this->data->item = Page::findByPK($id);
        }
    }

    public function actionSave()
    {
        $id = $this->app->request->post->id;

        if (empty($id)) {
            $item = new Page();

        } else {
            $item = Page::findByPK($id);
        }

        $item->fill($this->app->request->post);
        $item->save();
        $this->redirect('/admin/pages/');
    }

    public function actionDelete($id)
    {
        $item = Page::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/pages');
    }

}