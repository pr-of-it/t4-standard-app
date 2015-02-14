<?php

namespace App\Modules\Users\Controllers;

use App\Components\Admin\Controller;
use App\Models\User;
use App\Models\Role;

class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->items = User::findAll();
    }

    public function actionRole($id)
    {
        $users=User::findByPK($id);
        $this->data->items=$users->roles;

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