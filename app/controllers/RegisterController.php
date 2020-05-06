<?php

namespace Controllers;

use Models\Contact;
use Models\Company;
use App\View;

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
        $company->addCompanyUserfield("TDEALS","Total de Negócios");

        //Store the objects into bitrix ==================================================
        $contact->addContact();
        $company->addCompany();

        header('Location: /');
        exit;
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
