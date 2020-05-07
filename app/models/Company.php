<?php

namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Company{
    private $company, $cnpj;

    public function __construct($company, $cnpj){
        $this->setCompany($company);
        $this->setCnpj($cnpj);
    }

    public function delete($id){
        return \CRest::call('crm.company.delete', [
            'id' => $id
        ]);
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

    public function setCompanyByID($id){
        $result = \CRest::call('crm.company.get', [
            $id => 'id'
        ]);

        $this->setCompany($result['TITLE']);
        $this->setCnpj($result['UF_CRM_CNPJ']);
    }

    public function listCompanies(){
        $result = \CRest::call('crm.company.list', [
            'select' => [
                'ID',
                'TITLE',
                'UF_CRM_CNPJ'
            ]
        ]);

        return $result['result'];
    }

    public function getCompanyId(){
        $result = \CRest::call('crm.company.list', [
            'filter' => [
                'UF_CRM_CNPJ' => $this->cnpj
            ],
            'select' => 'ID',
        ]);

        return array_value_recursive('ID', $result);
    }

    public function updateCompany(){
        return \CRest::call('crm.company.update',
            [
                'fields' => [
                    'TITLE' => $this->getCompany(),
                    'UF_CRM_CNPJ' => $this->getCnpj()
                ]
            ]
        );
    }


    public function companyContactAdd($companyId, $contactId){
        return \CRest::call('crm.company.contact.add', [
            'ID' => $companyId,
            'fields' => [
                'CONTACT_ID' => $contactId
            ]
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
