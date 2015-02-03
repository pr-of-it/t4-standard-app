<?php

namespace App\Components\Admin;

class Controller
    extends \T4\Mvc\Controller
{

    protected function access($action)
    {
        return !empty($this->app->user) && $this->app->user->hasRole('admin');
    }

} 