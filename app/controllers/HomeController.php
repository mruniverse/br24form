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
        \App\View::make('index');
    }

}
