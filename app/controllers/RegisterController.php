<?php

namespace App\controllers;

use App\Contact;
use App\Company;
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

        echo '<pre>';
            print_r($contact->addContactUserfield("CPF"));
            print_r($company->addCompanyUserfield("CNPJ"));
            $contact->addContact();
        echo '</pre>';

        echo '<pre>';
            $company->addCompany();
        echo '</pre>';

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
