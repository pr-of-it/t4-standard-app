<?php

namespace App\Modules\Gallery\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Gallery\Models\Album;
use App\Modules\Gallery\Models\Photo;


class Admin
    extends Controller
{

    const PAGE_SIZE = 20;

    public function actionDefault($id = null, $page = 1)
    {
        $this->data->itemsCount = Photo::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->items = Album::findAll('__album_id', $id, [
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE
        ]);
    }

    public function actionPhotos($id, $page = 1)
    {
        $this->data->album = Album::findByPK($id);
        $this->data->itemsCount = Photo::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->items = Photo::findAllByColumn('__album_id', $id, [
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE
        ]);
    }

    public function actionView($id)
    {
        $this->data->item = Photo::findByPK($id);
    }

    public function actionEdit($id = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Photo();
        } else {
            $this->data->item = Photo::findByPK($id);
        }
        $this->data->albums = Album::findAll();
    }

    public function actionSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Photo::findByPK($this->app->request->post->id);
        } else {
            $item = new Photo();
        }
        $item->fill($this->app->request->post);
        $item
            ->uploadImage('image')
            ->save();
        $this->redirect('/admin/gallery/');
    }

    public function actionDelete($id)
    {
        $item = Photo::findByPK($id);
        $item->delete();
        $this->redirect('/admin/gallery/photos');
    }

    /**
     * Albums
     */

    public function actionAlbumEdit($id = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Album();
        } else {
            $this->data->item = Album::findByPK($id);
        }
    }

    public function actionAlbumSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Album::findByPK($this->app->request->post->id);
        } else {
            $item = new Album();
        }
        $item->fill($this->app->request->post);
        $item->save();
        $this->redirect('/admin/gallery/');
    }

    public function actionAlbumDelete($id)
    {
        $item = Album::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/gallery/');
    }
}