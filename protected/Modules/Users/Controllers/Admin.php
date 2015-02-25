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

    public function actionRoleUser($id, $namerole=null)
    {
        if(null==$namerole){
            $users = User::findByPK($id);
            $this->data->id=$id;
            $this->data->items = $users->roles;
            $this->data->roles = Role::findAll();
            $this->data->user = $users->email;
        } else {
            $user = User::findByPk($id);
            $role = Role::findByName($namerole);
            $user->roles->append($role);
            $user->save();
            $this->redirect($this->app->request->url->host );
        }

    }

    public function actionRoles()
    {
        $this->data->items = Role::findAll();
    }

    public function actionAddRole()
    {

    }


    public function actionEdit($id = 'new')
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

    public function actionDeleteRoleUser($id, $namerole)
    {
        if($namerole!='admin'){
            die();
            $user = User::findByPk($id);
            $role = Role::findByName($namerole);
            $user->roles->delete($role);
            $user->save();
            $this->redirect('/admin/users');
        }
    }

    public  function actionCheckPassword($id, $password=null)
    {
        if(null==$password){
            $this->data->user=User::findByPk($id);
        } else {
            $user=User::findByPk($id);
            $user->password = \T4\Crypt\Helpers::hashPassword($password);
            $user->save();
            $this->redirect('admin/users');
        }

    }

}