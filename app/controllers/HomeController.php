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
        $deal = new \Models\Deal("", "");
        $company = new \Models\Company("", "");
        $contact = new \Models\Contact("","","","");

        if($_REQUEST['ONCRMDEALADD']){
            $id = array_value_recursive('id', $_REQUEST);
            $deal->delete($id);
        }

        $companies = $company->listCompanies();
        $contacts = $contact->listContacts();
        $request = $user->setCurrentUser();
        View::make('index', [
            'request' => $request,
            'contacts' => $contacts,
            'companies' => $companies
        ]);
    }

    public function contactRemove($id){
        $contact = new \Models\Contact("","","","");
        $contact->delete($id);

        header('Location: /');
        exit;
    }

    public function companyRemove($id){
        $company = new \Models\Company("", "");
        $company->delete($id);

        header('Location: /');
        exit;
    }


    public function install(){
        include_once BASE_PATH."/app/crest/src/install.php";
    }

}
