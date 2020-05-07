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

        /** * Write data to log file. * * @param mixed $data * @param string $title * * @return bool */
        function writeToLog($data, $title = ''){
            $log = "\n------------------------\n";
            $log .= date("Y.m.d G:i:s") . "\n";
            $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
            $log .= print_r($data, 1);
            $log .= "\n------------------------\n";
            file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
            return true;
        }

        print_r($_REQUEST);
        writeToLog($_REQUEST, 'incoming');

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
