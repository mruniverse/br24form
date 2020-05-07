<?php

namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Company{
    private $company, $cnpj, $tdeals;

    public function __construct($company, $cnpj){
        $this->setCompany($company);
        $this->setCnpj($cnpj);
        $this->setTdeals(0);
    }

    //Delete company using it's ID ====================================================================
    public function delete($id){
        return \CRest::call('crm.company.delete', [
            'id' => $id
        ]);
    }

    //Return if a company exist (bool) =================================================================
    public function companyExist(){
        $result = \CRest::call('crm.company.list', [
            'filter' => [
                'UF_CRM_CNPJ' => $this->cnpj
            ],
            'select' => 'ID',
        ]);

        return empty(!$result['result']);
    }

    //Set company values given the company ID ====================================================================
    public function setCompanyByID($id){
        $result = \CRest::call('crm.company.get', [
            'id' => $id
        ]);

        $result = $result['result'];

        $this->setCompany($result['TITLE']);
        $this->setCnpj($result['UF_CRM_CNPJ']);
        $this->setTdeals($result['UF_CRM_TDEALS']);
    }

    //Return a list of companies =====================================================================================
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
                'id' => $this->getCompanyId(),
                'fields' => [
                    'TITLE' => $this->getCompany(),
                    'UF_CRM_CNPJ' => $this->getCnpj(),
                    'UF_CRM_TDEALS' => $this->getTdeals()
                ]
            ]
        );
    }

    //Add a contact to the specified company ====================================================================
    public function companyContactAdd($companyId, $contactId){
        return \CRest::call('crm.company.contact.add', [
            'ID' => $companyId,
            'fields' => [
                'CONTACT_ID' => $contactId
            ]
        ]);
    }

    //Add company into the portal ====================================================================
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

    //Add a new field to a company ====================================================================
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

    public function getTdeals(){
        return $this->tdeals;
    }

    public function setTdeals($tdeals){
        $this->tdeals = $tdeals;
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
