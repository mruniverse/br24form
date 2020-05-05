<?php

namespace App;
require_once('crest/src/crest.php');
class Company{
    private $company, $cnpj;

    public function __construct($company, $cnpj){
        $this->setCompany($company);
        $this->setCnpj($cnpj);
    }

    public function addCompany(){
        $result = \CRest::call('crm.company.add',
            [
                'fields' => [
                    'TITLE' => $this->getCompany(),
                    'UF_CRM_CNPJ' => $this->getCnpj()
                ]
            ]
        );

        return $result;
    }

    public function addCompanyUserfield($field){
        $result = \CRest::call('crm.company.userfield.add',[
            'fields' => [
                'FIELD_NAME' => $field,
                'USER_TYPE_ID' => 'string',
                'EDIT_FORM_LABEL' => $field,
                'LIST_COLUMN_LABEL' => $field,
                'SETTINGS' => [
                    'DEFAULT_VALUE' => ""
                ]
            ]
        ]);

        return $result;
    }

    public function getCompany(){
        return $this->company;
    }

    public function setCompany($company): void{
        $this->company = $company;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj): void{
        $this->cnpj = $cnpj;
    }
}
