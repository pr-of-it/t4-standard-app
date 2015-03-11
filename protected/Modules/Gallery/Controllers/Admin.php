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
        if ($id) {
            $this->data->items = Photo::findAllByColumn('__album_id', $id,
                ['offset' => ($page - 1) * self::PAGE_SIZE,
                    'limit' => self::PAGE_SIZE
                ]);
        } else {
            $this->data->items = Photo::findAll([
                'offset' => ($page - 1) * self::PAGE_SIZE,
                'limit' => self::PAGE_SIZE
            ]);
        }
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
        /*
        if($this->app->request->post->is_mail)
        {
            $main = Photo::findByColumn('is_main','1');
            $main->update('is_main','null');

        }*/
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
        $this->redirect('/admin/gallery/');
    }

//не работает
    public function actionDeleteImage($id)
    {
        $item = Photo::findByPK($id);
        if ($item) {
            $item->deleteImage();
            $item->save();
            $this->data->result = true;
        } else {
            $this->data->result = false;
        }
    }

    /**
     * Albums
     */

    public function actionAlbums()
    {
        $this->data->items = Album::findAll();
    }

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
        $this->redirect('/admin/gallery/albums/');
    }

    public function actionAlbumDelete($id)
    {
        $item = Album::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/gallery/albums/');
    }
}