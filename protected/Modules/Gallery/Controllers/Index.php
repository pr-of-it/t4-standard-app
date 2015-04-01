<?php

namespace App\Modules\Gallery\Controllers;

use App\Modules\Gallery\Models\Album;
use App\Modules\Gallery\Models\Photo;
use T4\Mvc\Controller;

class Index extends Controller{

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

    public function actionFoto(){

       $this->app->config->extensions->fotorama;
        //var_dump($congif);
        $this->data->items = Photo::findAll( [
            'order' => 'published DESC',
        ]);
    }

    public function actionPhoto($id, $page = 1)
    {
        $this->data->itemsCount = Photo::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->items = Photo::findAllByColumn('__album_id', $id, [
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE
        ]);
    }
}