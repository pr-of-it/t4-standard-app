<?php

namespace App\Modules\Pages\Controllers;

use App\Modules\Pages\Models\Page;
use T4\Mvc\Controller;

class Admin
    extends Controller
{
    protected function access($action)
    {
        return !empty($this->app->user);
    }

    protected $access = [
        'Default' => ['role.name' => 'admin'],
        'Edit'    => ['role.name' => 'admin'],
        'Save'    => ['role.name' => 'admin'],
        'Delete'  => ['role.name' => 'admin'],
    ];

    public function actionDefault()
    {
        $this->data->pages = Page::findAll();
    }

    public function actionEdit($id)
    {
        $this->data->page = Page::findByPK($id);
    }

    public function actionSave()
    {
        $id = $this->app->request->post->id;
        if (!empty($id)) {
            $page = Page::findByPK($id);
        } else {
            $page = new Page();
        }
        $page->fill($this->app->request->post);
        $page->save();
        $this->redirect('/pages/admin/');
    }

    public function actionDelete($id)
    {
        $item= Page::findByPK($id);
        if($item)
        {
            $item->delete();
        }
        $this->redirect('/pages/admin/');

    }

}