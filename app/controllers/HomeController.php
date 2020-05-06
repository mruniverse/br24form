<?php

namespace Controllers;

use App\Contact;
use App\Company;
use App\User;
use App\View;

class HomeController{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(){
        $user = new \Models\User("");
        print_r($user->setCurrentUser());

//        View::make('index', $user);
    }

    public function install(){
        include_once BASE_PATH."/app/crest/src/install.php";
    }

}
