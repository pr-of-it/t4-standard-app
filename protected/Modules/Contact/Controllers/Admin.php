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

    public function actionSendMail()
    {
        $mail = new Sender();

        $mail->setFrom('verablajennaya@mail.ru', 'First Last');
        $mail->addReplyTo('veramir10@gmail.com', 'First Last');
        $mail->addAddress('veramir10@gmail.com', 'Вера');
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the message body';
        try {
            $mail->send();
            $this->redirect('/contact/admin/');
        }
         catch(Exception $e) {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

}