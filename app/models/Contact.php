<?php

namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Contact{
    private $id, $name, $email, $phone, $cpf;

    public function __construct($name, $email, $phone, $cpf){
        $this->setName($name);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setCpf($cpf);
    }

    public function delete($id){
        return \CRest::call('crm.contact.delete', [
            'id' => $id
        ]);
    }

    public function setContactByID($id){
        $result = \CRest::call('crm.contact.get', [
            'id' => $id
        ]);

        $result = $result['result'];

        $this->setName($result['NAME']);
        $this->setEmail(array_value_recursive('VALUE', $result['EMAIL']));
        $this->setPhone(array_value_recursive('VALUE', $result['PHONE']));
        $this->setCpf($result['UF_CRM_CPF']);
    }

    public function updateContact(){
        return \CRest::call('crm.contact.updateContact',
            [
                'id' => $this->getContactId(),
                'fields' => [
                    'NAME' => $this->getName(),
                    'EMAIL' => [
                        '0' => [
                            'VALUE_TYPE' => "WORK",
                            'VALUE' => $this->getEmail(),
                            'TYPE_ID' => "EMAIL",
                        ]
                    ],
                    'PHONE' => [
                        '0' => [
                            'VALUE_TYPE' => "WORK",
                            'VALUE' => $this->getPhone(),
                            'TYPE_ID' => "PHONE",
                        ]
                    ],
                    'UF_CRM_CPF' => $this->getCpf()
                ]
            ]
        );
    }

    public function contactExist(){
        $result = \CRest::call('crm.contact.list', [
            'filter' => [
                'UF_CRM_CPF' => $this->cpf
            ],
            'select' => 'ID',
        ]);

        return empty(!$result['result']);
    }

    public function getContactId(){
        $result = \CRest::call('crm.contact.list', [
            'filter' => [
                'UF_CRM_CPF' => $this->cpf
            ],
            'select' => 'ID',
        ]);

        return array_value_recursive('ID', $result);
    }

    public function listContacts(){
        $result = \CRest::call('crm.contact.list', [
            'select' => [
                'ID',
                'NAME',
                'EMAIL',
                'PHONE',
                'UF_CRM_CPF'
            ]
        ]);

        return $result['result'];
    }

    public function addContact(){
        $result = \CRest::call('crm.contact.add',
            [
                'fields' => [
                    'NAME' => $this->getName(),
                    'EMAIL' => [
                        '0' => [
                            'VALUE_TYPE' => "WORK",
                            'VALUE' => $this->getEmail(),
                            'TYPE_ID' => "EMAIL",
                        ]
                    ],
                    'PHONE' => [
                        '0' => [
                            'VALUE_TYPE' => "WORK",
                            'VALUE' => $this->getPhone(),
                            'TYPE_ID' => "PHONE",
                        ]
                    ],
                    'UF_CRM_CPF' => $this->getCpf()
                ]
            ]
        );

    return $result;
    }

    public function addContactUserfield($field){
        $result = \CRest::call('crm.contact.userfield.add',[
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

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function getPhone(): string{
        return $this->phone;
    }

    public function setPhone(string $phone): void{
        $this->phone = $phone;
    }

    public function getCpf(): string{
        return $this->cpf;
    }

    public function setCpf(string $cpf): void{
        $this->cpf = $cpf;
    }


}
