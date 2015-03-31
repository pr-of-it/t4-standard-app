<?php

namespace App\Modules\Gallery\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Gallery\Models\Album;
use App\Modules\Gallery\Models\Photo;
use T4\Core\Exception;


class Admin
    extends Controller
{

    const PAGE_SIZE = 20;

    public function actionDefault($page = 1)
    {
        $this->data->itemsCount = Photo::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->items = Photo::findAll([
            'order' => 'published DESC',
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE
        ]);
        }


    public function actionPhoto($id = null,$page = 1)
    {
        if($id == null){
            $id = $this->app->request->post->parent;
        }
        $album = Album::findByColumn('__id', $id);
        $this->data->itemsCount= Album::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;
        $this->data->albums = Album::findAllByQuery('SELECT __id, title FROM albums WHERE __lft >'.$album->__lft.' AND __rgt <'.$album->__rgt);
        $this->data->photos = Photo::findAllByColumn('__album_id', $id, [
            'order' => 'published DESC',
            'offset' => ($page - 1) * self::PAGE_SIZE,
            'limit' => self::PAGE_SIZE
        ]);
        $this->data->item = Album::findByColumn('__id', $id);
    }



    public function actionView($id)
    {
        $this->data->item = Photo::findByPK($id);
    }

    public function actionEdit( $__album_id, $id = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Photo();
        } else {
            $this->data->item = Photo::findByPK($id);
        }
        $this->data->album = $__album_id;
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
    public function actionAlbums()
    {
        $this->data->items = Album::findAllTree();
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
        $this->redirect('/admin/gallery/albums');
    }

    public function actionAlbumDelete($id)
    {
        $item = Album::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/gallery/albums');
    }

    public function actionAlbumUp($id)
    {
        $item = Album::findByPK($id);
        if (empty($item))
            $this->redirect('/admin/gallery/albums');
        $sibling = $item->getPrevSibling();
        if (!empty($sibling)) {
            $item->insertBefore($sibling);
        }
        $this->redirect('/admin/gallery/albums');
    }

    public function actionAlbumDown($id)
    {
        $item = Album::findByPK($id);
        if (empty($item))
            $this->redirect('/admin/gallery/albums');
        $sibling = $item->getNextSibling();
        if (!empty($sibling)) {
            $item->insertAfter($sibling);
        }
        $this->redirect('/admin/gallery/albums');
    }

    public function actionAlbumMoveBefore($id, $to)
    {
        try {
            $item = Album::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Album::findByPK($to);
            if (empty($destination)) {
                throw new Exception('Destination element does not exist');
            }
            $item->insertBefore($destination);
            $this->data->result = true;
        } catch (Exception $e) {
            $this->data->result = false;
            $this->data->error = $e->getMessage();
        }
    }

    public function actionAlbumMoveAfter($id, $to)
    {
        try {
            $item = Album::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Album::findByPK($to);
            if (empty($destination)) {
                throw new Exception('Destination element does not exist');
            }
            $item->insertAfter($destination);
            $this->data->result = true;
        } catch (Exception $e) {
            $this->data->result = false;
            $this->data->error = $e->getMessage();
        }
    }
}