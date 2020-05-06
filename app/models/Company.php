<?php

namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Company{
    private $company, $cnpj;

    public function __construct($company, $cnpj){
        $this->setCompany($company);
        $this->setCnpj($cnpj);
    }

    public function companyExist(){
        $result = \CRest::call('crm.company.list', [
            'filter' => [
                'UF_CRM_CNPJ' => $this->cnpj
            ],
            'select' => 'ID',
        ]);

        return empty(!$result['result']);
    }

    public function getCompanyId(){
        $result = \CRest::call('crm.company.list', [
            'filter' => [
                'UF_CRM_CNPJ' => $this->cnpj
            ],
            'select' => 'ID',
        ]);

        return $result['result']['ID'];
    }

    public function companyContactAdd($companyId, $contactId){
        return \CRest::call('crm.company.contact.add',[
           'ID' => $companyId,
            'fields' => $contactId
        ]);
    }

    public function addCompany(){
        return \CRest::call('crm.company.add',
            [
                'fields' => [
                    'TITLE' => $this->getCompany(),
                    'UF_CRM_CNPJ' => $this->getCnpj()
                ]
            ]
        );
    }

    public function addCompanyUserfield($field, $label){
        return \CRest::call('crm.company.userfield.add',[
            'fields' => [
                'FIELD_NAME' => $field,
                'USER_TYPE_ID' => 'string',
                'EDIT_FORM_LABEL' => $label,
                'LIST_COLUMN_LABEL' => $label,
                'SETTINGS' => [
                    'DEFAULT_VALUE' => ""
                ]
            ]
        ]);
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
