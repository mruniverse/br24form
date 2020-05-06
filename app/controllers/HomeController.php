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
        $result = $user->setCurrentUser();

        View::make('index', [
            'result' => $result]);
    }

    public function install(){
        include_once BASE_PATH."/app/crest/src/install.php";
    }

}
