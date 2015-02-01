<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Documents\Models\Category;
use App\Modules\Documents\Models\Document;
use T4\Mvc\Controller;

class Documents
    extends Controller
{

    const PAGE_SIZE = 20;

    protected function access($action)
    {
        return !empty($this->app->user) && $this->app->user->hasRole('admin');
    }

    public function actionDefault($page = 1)
    {
        $this->data->itemsTotalCount = Document::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;

        $this->data->items = Document::findAll([
            'order' => 'published DESC',
            'limit'=>[($page-1)*self::PAGE_SIZE, self::PAGE_SIZE]
        ]);
    }

    public function actionEdit($id=null)
    {
        $this->app->extensions->ckeditor->init();
        $this->app->extensions->ckfinder->init();

        if (null === $id || 'new' == $id) {
            $this->data->item = new Document();
        } else {
            $this->data->item = Document::findByPK($id);
        }
    }

    public function actionCategories()
    {
        $this->data->items = Category::findAllTree();
    }

    public function actionEditCategory($id=null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Category();
        } else {
            $this->data->item = Category::findByPK($id);
        }
    }

    public function actionSaveCategory()
    {
        if (!empty($_POST[Category::PK])) {
            $item = Category::findByPK($_POST[Category::PK]);
        } else {
            $item = new Category();
        }
        $item->fill($_POST);
        $item->save();
        $this->redirect('/admin/documents/categories/');
    }

    public function actionDeleteCategory($id)
    {
        $item = Category::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/documents/categories/');
    }


}