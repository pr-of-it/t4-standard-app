<?php


namespace App\Modules\Menu\Controllers;

use App\Components\Admin\Controller;

class Index extends Controller
{
    public function actionMenu()
    {
        $this->data->items = \App\Modules\Menu\Models\Menu::findAllTree();
    }

}