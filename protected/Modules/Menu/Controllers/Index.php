<?php


namespace App\Modules\Menu\Controllers;

use App\Modules\Menu\Models\MenuItem;
use T4\Mvc\Controller;

class Index extends Controller
{
    public function actionDefault()
    {
        $this->data->items = MenuItem::findAllTree();
    }

}