<?php
namespace Controllers;

use Models\Contact;
use Models\Company;
use App\View;

class UpdateController{

    public function index(){

    }

    public function contactEdit($id){
        $contact = new \Models\Contact("","","","");

        $contact->setContactByID($id);

        View::make('updateContact', [
            'contact' => $contact
        ]);
    }

    public function companyEdit($id){
        $company = new \Models\Company("","");

        $company->setCompanyByID($id);

        View::make('updateCompany', [
            'company' => $company
        ]);
    }

    public function updateContact(){
        $contact = new Contact(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['cpf']
        );
        $contact->updateContact();

        header('Location: /');
        exit;
    }

    public function updateCompany(){
        $company = new Company(
            $_POST['company'],
            $_POST['cnpj']
        );

        echo $_POST['company'];
        echo $_POST['name'];

        $company->updateCompany();

//        header('Location: /');
//        exit;
    }

}