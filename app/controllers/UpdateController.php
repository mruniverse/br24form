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

        View::make('updateCompany', [
            'company' => $company
        ]);
    }

    public function update(){
        if($_POST['name'] != null){
            $contact = new Contact(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['cpf']
            );
            $contact->updateContact();

        } else{
            $company = new Company(
                $_POST['company'],
                $_POST['cnpj']
            );
            $company->updateCompany();
        }

        header('Location: /');
        exit;
    }

}