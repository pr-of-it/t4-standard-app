<?php

namespace App\Modules\News\Controllers;

use App\Modules\News\Models\Story;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault($limit = null)
    {
        $this->data->items = Story::findAll(
            [
                'order' => 'published DESC',
                'limit' => $limit,
            ]
        );
    }

    public function actionOne($id)
    {
        $this->data->item = Story::findByPK($id);
        if (empty($this->data->item)) {
            throw new E404Exception('Новость не найдена');
        }
    }

}