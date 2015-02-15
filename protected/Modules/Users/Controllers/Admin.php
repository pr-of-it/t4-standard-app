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

    public function actionRoleUser($id)
    {
        $users=User::findByPK($id);
        $this->data->items=$users->roles;
        $this->data->user=$users->email;
        $this->data->itemsRole=Role::findAll();
    }

    public function actionRoles()
    {
        $this->data->items=Role::findAll();
    }

    public function actionAddRole()
    {

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
            $item = new Role();

        } else {
            $item = Page::findByPK($id);
        }

        $item->fill($this->app->request->post);
        $item->save();
        $this->redirect('/admin/users/roles/');
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