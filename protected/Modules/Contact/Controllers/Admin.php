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
       $mail->CharSet = 'utf-8';
        $mail->setFrom('admin@t4.org', 'Sender');
        $mail->addReplyTo('example@mail.ru', 'recipient');
        $mail->addAddress($this->app->request->post->email, 'Sender');
        $mail->Subject = $this->app->request->post->theme;
        $mail->Body = $this->app->request->post->theme;
        $mail->msgHTML($this->app->request->post->msg);
        $mail->AltBody = $this->app->request->post->msg;
        try {
            $mail->send();
            $this->redirect('/contact/admin/');
        }
         catch(Exception $e) {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

}