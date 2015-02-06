<?php

namespace App\Modules\News\Controllers;

use App\Components\Admin\Controller;
use App\Modules\News\Models\Story;


class Admin
    extends Controller
{

    const PAGE_SIZE = 20;

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

    public function actionEdit($id = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Story();
        } else {
            $this->data->item = Story::findByPK($id);
        }
    }

    public function actionSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Story::findByPK($this->app->request->post->id);
        } else {
            $item = new Story();
        }
        $item->fill($this->app->request->post);
        if ($item->isNew()) {
            $item->published = date('Y-m-d H:i:s', time());
        }
        $item
            ->uploadImage('image')
            ->save();
        $this->redirect('/admin/news/');
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