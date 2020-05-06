<?php

namespace App\controllers;

use App\Contact;
use App\Company;
class HomeController{

    /*
    * chama a view index.php do  /home   ou somente   /
    */
    public function index(\CRest $CRest){
        $CRest = new \CRest();
        $result = CRest::call('user.current');
        $name = array_column($result, 'NAME');

        \App\View::make('index', $name);
    }

}
