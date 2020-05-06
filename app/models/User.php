<?php
namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class User{
    private $name;

    public function __construct($name){
        $this->setName($name);
    }

    public function getCurrentUser(){
        $result = \CRest::call('user.current');
        return array_column($result, 'NAME');
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }


}