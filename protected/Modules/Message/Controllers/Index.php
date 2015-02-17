<?php


namespace App\Modules\Message\Controllers;

use App\Models\User;
use App\Modules\Message\Models\Message;
use T4\Core\Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {

    }

    public function actionSave($data)
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['question'])) {
            if (!filter_var($this->app->request->post->email, FILTER_VALIDATE_EMAIL)) {
             throw new Exception('Введите Ваш email');
            }
            $question = new Message();
            $question->fill($this->app->request->post);
            $question->save();
            $this->redirect('/message');
        }
    }
}