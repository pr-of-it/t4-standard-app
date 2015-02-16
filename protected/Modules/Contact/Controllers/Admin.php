<?php

namespace App\Modules\Contact\Controllers;


use App\Modules\Contact\Models\Answer;
use App\Components\Admin\Controller;
use App\Modules\Contact\Models\Contact;
use T4\Mail\Sender;


class Admin
    extends Controller
{

    const PAGE_SIZE = 20;

    public function actionDefault($page = 1)
    {
        $this->data->itemsCount = Contact::countAll();
        $this->data->pageSize = self::PAGE_SIZE;
        $this->data->activePage = $page;

        $this->data->items = Contact::findAll([
            'order' => 'datetime DESC',
            'offset'=> ($page-1)*self::PAGE_SIZE,
            'limit'=> self::PAGE_SIZE
        ]);
         }


    public function actionAnswer($id)
    {
        $this->data->item = Contact::findByPK($id);
    }

    public function actionSend($email = null, $theme, $message)
    {
        $answer = new Answer();
        $answer->fill($this->app->request->post);
        $answer->save();

        $mail = new Sender();
        $mail->sendMail('verablajennaya@mail.ru', $theme, $message);
        $this->redirect('/contact/admin');
    }

}