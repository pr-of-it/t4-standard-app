<?php


namespace App\Modules\Contact\Controllers;


use App\Models\User;
use T4\Core\Exception;
use T4\Mvc\Controller;
use App\Modules\Contact\Models\Contact;

class Index
    extends Controller
{

    public function actionDefault()
    {

    }

    public function actionSave()
    {
        //понять , куда ставить exception
        if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
            if (!filter_var($this->app->request->post->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Введите Ваш email');
            }
            $contact = new Contact();
            $contact->fill($this->app->request->post);
            $contact->datetime = date('Y-m-d H:i:s', time());
            $contact->save();
            $this->redirect('/contact');
        }


    }
}