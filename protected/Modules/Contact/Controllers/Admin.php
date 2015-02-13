<?php

namespace App\Modules\Contact\Controllers;


use App\Modules\Contact\Models\Answer;
use App\Components\Admin\Controller;
use App\Modules\Contact\Models\Contact;
use T4\Mail\Sender;


class Admin
    extends Controller
{

    public function actionDefault()
    {
        $this->data->items = Contact::findAll();
    }

    public function actionAnswer($id)
    {

        $this->data->item = Contact::findByPK($id);
    }

    public function actionSend($email=null, $theme, $message)
    {
        $answer = new Answer();
        $answer->fill($this->app->request->post);
        $answer->save();

        $mail = new Sender();
        $mail->sendMail('verablajennaya@mail.ru', $theme, $message);
        $this->redirect('/contact/admin');
    }

}