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

        View::make('update', [
            'contact' => $contact
        ]);
    }

    public function companyEdit($id){
        $company = new \Models\Company("","");

        $company->setCompanyByID($id);

        View::make('update', [
            'company' => $company
        ]);
    }

    public function update(){
        //Instantiate objects ==================================================
        $contact = new Contact(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['cpf']
        );
        $company = new Company(
            $_POST['company'],
            $_POST['cnpj']
        );

        //Store the "objects" into bitrix ==================================================
        $company->updateCompany();
        $contact->updateContact();

        $company->companyContactAdd($company->getCompanyId(), $contact->getContactId());

        header('Location: /');
        exit;
    }

}