<?php

namespace App\Modules\Menu\Controllers;




use T4\Mvc\Controller;

class Index
    extends Controller{

    public function actionMenu(){
        $this->data->items = \App\Modules\Menu\Models\Menu::findAllTree();
    }

}