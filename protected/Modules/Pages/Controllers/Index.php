<?php

namespace App\Modules\Pages\Controllers;

use App\Modules\Pages\Models\Page;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{
    public function actionPageByUrl($url)
    {
        $page = Page::findByUrl($url);
        if (empty($page))
            throw new E404Exception;
        $this->data->page = $page;
    }

    public function actionPageById($id)
    {
        $page = Page::findByPK($id);
        if (empty($page))
            throw new E404Exception;
        $this->data->page = $page;
    }

}