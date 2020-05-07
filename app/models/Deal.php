<?php
namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Deal{
    private $id, $opportunity;

    /**
     * Deal constructor.
     * @param $id
     * @param $opportunity
     */
    public function __construct($id, $opportunity){
        $this->id = $id;
        $this->opportunity = $opportunity;
    }

    public function delete($id){
        return \CRest::call('crm.deal.delete', [
            'id' => $id
        ]);
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOpportunity(){
        return $this->opportunity;
    }

    /**
     * @param mixed $opportunity
     */
    public function setOpportunity($opportunity){
        $this->opportunity = $opportunity;
    }



}