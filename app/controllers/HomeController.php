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
        $user->setCurrentUser();
        print_r($user);
//        View::make('index', $user);
    }

}
