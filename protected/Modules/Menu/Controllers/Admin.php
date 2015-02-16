<?php

namespace App\Modules\Menu\Controllers;

use App\Modules\Menu\Models\Menu;
use T4\Core\Exception;
use App\Components\Admin\Controller;

class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->items = Menu::findAllTree();
    }

    public function actionEdit($id = null, $parent = null)
    {
        if (null === $id || 'new' == $id) {
            $this->data->item = new Menu();
            if (null !== $parent) {
                $this->data->item->parent = $parent;
            }
        } else {
            $this->data->item = Menu::findByPK($id);
        }
    }

    public function actionSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = Menu::findByPK($this->app->request->post->id);
        } else {
            $item = new Menu();
        }
        $item
            ->fill($this->app->request->post)
            ->save();
        $this->redirect('/admin/menu/');
    }

    public function actionDelete($id)
    {
        $item = Menu::findByPK($id);
        if ($item)
            $item->delete();
        $this->redirect('/admin/menu/');
    }

    public function actionUp($id)
    {
        $item = Menu::findByPK($id);
        if (empty($item))
            $this->redirect('/menu/admin/');
        $sibling = $item->getPrevSibling();
        if (!empty($sibling)) {
            $item->insertBefore($sibling);
        }
        $this->redirect('/admin/menu/');
    }

    public function actionDown($id)
    {
        $item = Menu::findByPK($id);
        if (empty($item))
            $this->redirect('/menu/admin/');
        $sibling = $item->getNextSibling();
        if (!empty($sibling)) {
            $item->insertAfter($sibling);
        }
        $this->redirect('/admin/menu/');
    }

    public function actionMoveBefore($id, $to)
    {
        try {
            $item = Menu::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Menu::findByPK($to);
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
            $item = Menu::findByPK($id);
            if (empty($item)) {
                throw new Exception('Source element does not exist');
            }
            $destination = Menu::findByPK($to);
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