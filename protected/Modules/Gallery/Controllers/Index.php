<?php

namespace App\Modules\Gallery\Controllers;

use App\Modules\Gallery\Models\Album;
use App\Modules\Gallery\Models\Photo;
use T4\Mvc\Controller;


class Index extends Controller
{

    const PAGE_SIZE = 20;

    public function actionDefault($page = 1)
    {
        $this->data->itemsCount = Photo::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->items = Album::findAll([
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE,
            'where' => '__prt = 0',
        ]);
    }

    public function actionPhoto($id)
    {

        $this->app->config->extensions->fotorama;
        $album = $this->data->album = Album::findByColumn('__id', $id);
        if ($album->__prt) {
            $this->data->albumParent = Album::findByColumn('__id', $album->__prt);
        }
        $this->data->items = Photo::findAllByColumn('__album_id', $id, [
            'order' => 'published DESC',
        ]);
    }

    public function actionOne($id, $album_id)
    {
        $album = $this->data->album = Album::findByColumn('__id', $album_id);
        if ($album->__prt) {
            $this->data->albumParent = Album::findByColumn('__id', $album->__prt);
        }
        $this->data->item = Photo::findByColumn('__id', $id);
    }


    public function actionLastAddedPhoto()
    {
        $this->data->item = Photo::findByQuery('SELECT * FROM photos ORDER BY published DESC');
    }

    public function actionLastAddedPhotos($album_id, $num)
    {
        $this->data->items = Photo::findAllByQuery('SELECT * FROM photos WHERE __album_id=' . $album_id . ' ORDER BY published DESC LIMIT ' . $num);
    }

    public function actionRandomPhoto($album_id)
    {
        $this->data->item = Photo::findByQuery('SELECT * FROM photos WHERE __album_id=' . $album_id . ' ORDER BY rand()');
    }
}