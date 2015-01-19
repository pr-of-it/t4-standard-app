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
        $this->data->page = $page;
        if (empty($this->data->page)) {
            throw new E404Exception;
        }
    }

} 