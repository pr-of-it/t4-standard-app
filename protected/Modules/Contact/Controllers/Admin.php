<?php

namespace App\Modules\Contact\Controllers;


use App\Modules\Contact\Models\Answer;
use T4\Mvc\Controller;
use App\Modules\Contact\Models\Contact;
use T4\Mail\Sender;


class Admin
      extends Controller
{

    protected function access($action)
    {
        return !empty($this->app->user);
    }

    public function actionDefault()
    {
        $this->data->contact = Contact::findAll();
    }

    public function actionAnswer($id){

        $this->data->contact = Contact::findByPK($id);
    }

    public function actionSend()
    {
        $answer = new Answer();
        $answer->fill($this->app->request->post);
        $answer->datetime = date('Y-m-d H:i:s', time());
        $answer->save();

        $mail = new Sender();
        $post = $this->app->request->post;
        $mail->sendMail('verablajennaya@mail.ru',$post->theme,$post->message);
        $this->redirect('/contact/admin');
    }

}