<?php
namespace Models;
include_once BASE_PATH."/app/crest/src/crest.php";

class Deal{
    private $id, $opportunity, $companyId;

    /**
     * Deal constructor.
     * @param $id
     * @param $opportunity
     */
    public function __construct($id, $opportunity, $companyId){
        $this->id = $id;
        $this->opportunity = $opportunity;
        $this->companyId = $companyId;
    }

    public function setDealByID($id){
        $result = \CRest::call('crm.deal.get', [
            'id' => $id
        ]);

        $result = $result['result'];

        $this->setOpportunity($result['OPPORTUNITY']);
        $this->setCompanyId($result['COMPANY_ID']);
    }


    public function delete($id){
        return \CRest::call('crm.deal.delete', [
            'id' => $id
        ]);
    }




    /**
     * @return mixed
     */
    public function getCompanyId(){
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId){
        $this->companyId = $companyId;
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