<?php

namespace Controllers;

use Models\Contact;
use Models\Company;
use App\View;


//This class controls all the requests that ask for the form to register path or /register =========================
class RegisterController{
    public function index(){

    }


    public function create(){
        View::make('register');
    }

    public function store(){
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

        //Create new fields ==================================================
        $contact->addContactUserfield("CPF");
        $company->addCompanyUserfield("CNPJ", "CNPJ");
        $company->addCompanyUserfield("TDEALS","Total em Negócios (R$)");

        //Store the "objects" into bitrix ==================================================
        if($company->companyExist() && $contact->contactExist()){
            $company->updateCompany();
            $contact->updateContact();
        } else if ($company->companyExist()){
            $contact->addContact();
        } else if  ($contact->contactExist()){
            $company->addCompany();
        } else{
            $contact->addContact();
            $company->addCompany();
        }

        $company->companyContactAdd($company->getCompanyId(), $contact->getContactId());

        header('Location: /');
        exit;
    }

    public function show($id){
        //
    }

    public function destroy($id){
        //
    }
}
