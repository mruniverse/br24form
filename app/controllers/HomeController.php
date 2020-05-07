<?php

namespace Controllers;

use App\Contact;
use App\Company;
use App\User;
use App\View;

include_once BASE_PATH."/app/crest/src/crest.php";

//This class controls all the requests that ask for the index path or / (Also remove or delete, since these
// requests come from the index path).
class HomeController{

    //This is the first function to be executed, it came from: "/" or "...url.com/"
    public function index(){
        \CRest::installApp();
        //Instantiating Models or Classes ========================================================================
        $user = new \Models\User("");
        $deal = new \Models\Deal("", "", "");
        $company = new \Models\Company("", "");
        $contact = new \Models\Contact("","","","");

        // Checking for request from Outbound webhook ============================================================
        if(array_value_recursive('event', $_REQUEST) == 'ONCRMDEALADD'){
            $id = array_value_recursive('ID', $_REQUEST);
            $deal->setDealByID($id);
            $company->setCompanyByID($deal->getCompanyId());
            $company->setTdeals($company->getTdeals()+$deal->getOpportunity());
            $company->updateCompany();
        }

        //Adding values to the Objects, so that they can be listed into the homescreen ============================
        $companies = $company->listCompanies();
        $contacts = $contact->listContacts();
        $request = $user->setCurrentUser();

        //All the Views::make methods, make views using the template.php as header and footer ====================
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

    //This is the "/install" path ============================================================================
    public function install(){
        include_once BASE_PATH."/app/crest/src/install.php";
    }

}
