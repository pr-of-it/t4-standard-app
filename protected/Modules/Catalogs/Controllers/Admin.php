<?php


namespace App\Modules\Catalogs\Controllers;

use App\Modules\Catalogs\Models\CatalogGoods;
use App\Components\Admin\Controller;



class Admin
    extends Controller
{
    public function actionDefault()
    {
        $this->data->items = CatalogGoods::findAllTree();
    }
} 