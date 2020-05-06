<?php

namespace App\controllers;

use App\Contact;
use App\Company;
use App\User;

class HomeController{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(){
        $user = new User("");
        $name = $user->getCurrentUser();
        \App\View::make('index', $name);
    }

}
