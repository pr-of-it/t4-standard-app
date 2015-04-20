<?php

namespace App\Modules\News\Controllers;

use App\Modules\News\Models\Story;
use App\Modules\News\Models\Topic;
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

    public function actionNewsForTopic($title)
    {
        $this->data->items=Topic::findByTitle($title)->stories;
        if (empty($this->data->items)) {
            throw new E404Exception('Рубрика не найдена');
        }

    }
    public function actionOne($id)
    {
        $this->data->item = Story::findByPK($id);
        if (empty($this->data->item)) {
            throw new E404Exception('Новость не найдена');
        }
    }

}