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
        $contact->addContactUserfield("CPF");
        $company->addCompanyUserfield("CNPJ");
        $contact->addContact();
        $company->addCompany();

        header('Location: /');
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
