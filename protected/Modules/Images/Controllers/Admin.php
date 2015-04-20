<?php
namespace App\Modules\Images\Controllers;

use App\Modules\Images\Models\ImgManager;
use App\Modules\Images\Models\TopicImage;
use T4\Mvc\Controller;


class Admin
    extends Controller
{
    public function actionDefault()
    {
        $this->data->items =TopicImage::findAll();
    }
} 