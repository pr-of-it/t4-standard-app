<?php


namespace App\Modules\Contact\Controllers;



use App\Models\User;
use T4\Mvc\Controller;
use App\Modules\Contact\Models\Contact;

class Index
         extends Controller{

    public function actionDefault(){
    }

    public function actionSave()
        {
             $this->app->request->post->id;
             $contact = new Contact();
             $contact->fill($this->app->request->post);
             $contact->published = date('Y-m-d H:i:s', time());
             $contact->save();
             $this->redirect('/');
        }
}