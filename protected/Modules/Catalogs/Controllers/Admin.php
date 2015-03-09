<?php


namespace App\Modules\Catalogs\Controllers;

use App\Components\Admin\Controller;
use App\Modules\Catalogs\Models\Catalog;
use App\Modules\Catalogs\Models\Goods;


class Admin
        extends Controller
{
    public function actionDefault()
    {
        $this->data->items = Catalog::findAllTree();
    }

    public function actionEdit($id = null, $parent = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Catalog();
            if (null !== $parent) {
                $this->data->item->parent = $parent;
            }
        } else {
            $this->data->item = Catalog::findByPK($id);
        }
    }

    public function actionSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Catalog::findByPK($this->app->request->post->id);
        } else {
            $item = new Catalog();
        }
        $item
            ->fill($this->app->request->post)
            ->save();
        $this->redirect('/admin/Catalogs');
    }

    public function actionDelete($id)
    {
        $item = Catalog::findByPK($id);
        if ($item) {
            $item->delete();
        }
        $this->redirect('/admin/Catalogs');
    }

    public function actionUp($id)
    {
        $item = Catalog::findByPK($id);
        if (empty($item)) {
            $this->redirect('/Catalogs/admin/');
        }
        $sibling = $item->getPrevSibling();
        if (!empty($sibling)) {
            $item->insertBefore($sibling);
        }
        $this->redirect('/admin/Catalogs');
    }

    public function actionDown($id)
    {
        $item = Catalog::findByPK($id);
        if (empty($item))
            $this->redirect('/Catalogs/admin/');
        $sibling = $item->getNextSibling();
        if (!empty($sibling)) {
            $item->insertAfter($sibling);
        }
        $this->redirect('/admin/Catalogs');
    }

    public function actionMoveBefore($id, $to)
    {
        try {
            $item = Catalog::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Catalog::findByPK($to);
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

    public function actionMoveAfter($id, $to)
    {
        try {
            $item = Catalog::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Catalog::findByPK($to);
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

    public function actionEditGoods($id = null, $idgood)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Goods();
            $this->data->idgood=$idgood;
        } else {
            $this->data->item = Goods::findByPK($id);
        }
    }

    public function actionSaveGoods()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Goods::findByPK($this->app->request->post->id);
        } else {
            $item = new Goods();
        }
        //var_dump($this->app->request->post);die;
        $item
            ->fill($this->app->request->post)
            ->uploadImage('image')
            ->save();
        $this->redirect('/admin/Catalogs');

    }

    public  function actionGoods($id=null)
    {
       $this->data->items = Goods::findAllBy__catalog_id($id) ;
       //var_dump($this->data->items);die;
    }
} 