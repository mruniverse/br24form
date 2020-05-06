<?php
namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class User{
    private $name;

    public function __construct($name){
        $this->setName($name);
    }

    public function setCurrentUser(){
        $result = \CRest::call('user.current');
        $name = array_column($result, 'NAME');
        $this->setName($name[0]);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }


}