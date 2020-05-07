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
        $company = new \Models\Company("", "");
        $contact = new \Models\Contact("","","","");

        $companies = $company->listCompanies();
        $contacts = $contact->listContacts();
        $request = $user->setCurrentUser();
        View::make('index', [
            'request' => $request,
            'contacts' => $contacts,
            'companies' => $companies
        ]);
    }

    public function install(){
        include_once BASE_PATH."/app/crest/src/install.php";
    }

}
