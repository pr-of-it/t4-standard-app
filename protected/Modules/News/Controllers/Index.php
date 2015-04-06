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

    public function actionMainNews()
    {
        $this->data->items1=Topic::findByPK(1)->stories;
        foreach($this->data->items1 as $topic)
            var_dump($topic);
        var_dump($topic->topic);
        //var_dump($this->data->topic=$this->data->items[0]);
        //var_dump($this->data->topic->Collection[0]);
        die;
        $this->data->items2=Topic::findByPK(2)->stories;
        $this->data->items3=Topic::findByPK(3)->stories;
    }
    public function actionOne($id)
    {
        $this->data->item = Story::findByPK($id);
        if (empty($this->data->item)) {
            throw new E404Exception('Новость не найдена');
        }
    }

}