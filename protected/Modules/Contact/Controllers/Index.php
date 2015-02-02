<?php

namespace App\Modules\Contact\Controllers;


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
             $contact->save();
             $this->redirect('/');
        }
}