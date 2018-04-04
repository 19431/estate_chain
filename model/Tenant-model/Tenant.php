<?php
/**
 * Created by PhpStorm.
 * Date: 3/31/2018
 * Time: 6:55 PM
 */
require_once 'processes.php';
class Tenant implements EstateProcesses
{
    use model;
    private $lease;

    /**
     * Tenant constructor.
     * @param $givenName
     * @param $givenId
     * @param Lease $lease
     */
    function __construct($givenName, $givenId, Lease $lease)
    {
        $this->name = $givenName;
        $this->id = random_int(0, 902942);      //generates crypto-unique id to identify each Tenant
        $this->lease = $lease;
    }

    function get_lease(){
        return $this->lease;
    }

    function set_lease($amount, DateTime $date){
        return new MonthlyPayment($amount, $date, $this->lease);   //returns a new MonthlyPayment object
    }

    // tenants submitting work request
    public function submit_request($description, DateTime $date){
        return new WorkRequest($description, $date, $this, $status = "new");
    }



}