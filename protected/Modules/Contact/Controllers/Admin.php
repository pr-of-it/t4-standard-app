<?php

namespace App\Modules\Contact\Controllers;


use T4\Mvc\Controller;
use App\Modules\Contact\Models\Contact;

class Admin
      extends Controller{

    protected function access($action)
    {
        return !empty($this->app->user);
    }

    public function actionDefault()
    {
        $this->data->contact = Contact::findAll();
    }

    public function actionAnswer($id)
    {

    }

}