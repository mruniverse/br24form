<?php

namespace Controllers;

use App\Contact;
use App\Company;
use App\User;

class HomeController{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(){
        $user = new \Models\User("");
        $name = $user->getCurrentUser();

        \App\View::make('index', $name);
    }

}
