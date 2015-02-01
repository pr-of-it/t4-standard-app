<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\News\Models\File;
use App\Modules\News\Models\Story;
use App\Modules\News\Models\Topic;
use T4\Mvc\Controller;

class News
    extends Controller
{

    const PAGE_SIZE = 20;

    protected function access($action)
    {
        return !empty($this->app->user) && $this->app->user->hasRole('admin');
    }

    public function actionDefault($page = 1)
    {
        $this->data->itemsCount = Story::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;

        $this->data->items = Story::findAll([
            'order' => 'published DESC',
            'offset'=> ($page-1)*self::PAGE_SIZE,
            'limit'=> self::PAGE_SIZE
        ]);
    }

    public function actionEdit($id=null)
    {
        $this->app->extensions->ckeditor->init();
        $this->app->extensions->ckfinder->init();

        if (null === $id || 'new' == $id) {
            $this->data->item = new Story();
        } else {
            $this->data->item = Story::findByPK($id);
        }
    }

    public function actionSave($redirect = 0)
    {
        if (!empty($_POST[Story::PK])) {
            $item = Story::findByPK($_POST[Story::PK]);
        } else {
            $item = new Story();
        }
        $item->fill($_POST);
        if ($item->isNew()) {
            $item->published = date('Y-m-d H:i:s', time());
        }
        $item
            ->uploadImage('image')
            ->uploadFiles('files')
            ->save();
        if ($redirect) {
            $this->redirect('/news/' . $item->getPk() . '.html');
        } else {
            $this->redirect('/admin/news/');
        }
    }

    public function actionDelete($id)
    {
        $item = Story::findByPK($id);
        $item->delete();
        $this->redirect('/admin/news/');
    }

    public function actionDeleteImage($id)
    {
        $item = Story::findByPK($id);
        if ($item) {
            $item->deleteImage();
            $item->save();
            $this->data->result = true;
        } else {
            $this->data->result = false;
        }
    }

    public function actionDeleteFile($id)
    {
        $item = File::findByPK($id);
        if ($item) {
            $item->delete();
            $this->data->result = true;
        } else {
            $this->data->result = false;
        }
    }

    /**
     * TOPICS
     */

    public function actionTopics()
    {
        $this->data->items = Topic::findAllTree();
    }

    public function actionEditTopic($id=null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Topic();
        } else {
            $this->data->item = Topic::findByPK($id);
        }
    }

    public function actionSaveTopic()
    {
        if (!empty($_POST[Topic::PK])) {
            $item = Topic::findByPK($_POST[Topic::PK]);
        } else {
            $item = new Topic();
        }
        $item->fill($_POST);
        $item->save();
        $this->redirect('/admin/news/topics/');
    }

    public function actionDeleteTopic($id)
    {
        $item = Topic::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/news/topics/');
    }

}