<?php

namespace App\Modules\Contact\Controllers;


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
        $mail = new Sender();
        $mail->setFrom('admin@t4.org', 'First Last');
        $mail->addReplyTo('example@mail.ru', 'First Last');
        $mail->addAddress($this->app->request->post->email, 'Вера');
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $this->app->request->post->msg;
        try {
            $mail->send();
            $this->redirect('/contact/admin/');
        }
         catch(Exception $e) {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

}