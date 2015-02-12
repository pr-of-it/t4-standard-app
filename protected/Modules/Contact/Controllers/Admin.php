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
        $mail = new Sender();
        $mail->setFrom('admin@t4.org', 'Sender');
        $mail->addReplyTo('admin@t4.org', 'recipient');
        $mail->addAddress('verablajennaya@mail.ru', 'Sender');
        $mail->Subject = $this->app->request->post->theme;
       // $mail->Body = $this->app->request->post->text;
        $mail->msgHTML($this->app->request->post->text);
        //$mail->AltBody = $this->app->request->post->text;
        try {
            $mail->send();
            $this->redirect('/contact/admin/');
        }
         catch(Exception $e) {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
        try{
        $answer = new Answer();
        $answer->fill($this->app->request->post);
        $answer->datetime = date('Y-m-d H:i:s', time());
        $answer->save();
        $this->redirect('/contact/admin');
        }catch(Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

    }


    public function actionDelete($id){

            $item = Contact::findByPK($id);
            $item->delete();
            $this->redirect('/contact/admin/');
    }

}