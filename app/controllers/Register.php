<?php

use app\core\Controller;
use App\Contact;
use App\Company;

class Register extends Controller{
    public function index(){

        $this->view('crud/register');
    }


    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $contact = new Contact(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone'),
            $request->get('cpf')
        );
        $company = new Company(
            $request->get('company'),
            $request->get('cnpj')
        );


        echo '<pre>';
            print_r($contact->addContactUserfield("CPF"));
            print_r($company->addCompanyUserfield("CNPJ"));
            $contact->addContact();
        echo '</pre>';

        echo '<pre>';
            $company->addCompany();
        echo '</pre>';


        echo 'deu bom';
//        return view('home');
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
