<?php


namespace App\Modules\Catalogs\Controllers;

use App\Modules\Catalogs\Models\Catalog as CatalogModel;
use T4\Mvc\Controller;


class Index
        extends Controller
{
    public function actionDefault()
    {
        $this->data->items = CatalogModel::findAllTree();
    }
}