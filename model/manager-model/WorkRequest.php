<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/2/2018
 * Time: 4:40 PM
 */

class WorkRequest
{
    use model;
    private $status;
    private $description;
    private $todoDate;

    /**
     * WorkRequest constructor.
     * @param $description
     * @param DateTime $date
     * @param Tenant $tenant
     * @param $status
     */
    function __construct($description, DateTime $date, Tenant $tenant, $status){
        $this->todoDate = $date;
        $this->description = $description;
        $this->status = $status;
    }

    function get_description(){
        return $this->description;
    }

    function get_date(){
        return $this->todoDate;
    }

    function get_status(){
        return $this->status;
    }

    function set_status($givenStatus){
        $this->status = $givenStatus;
    }

    function set_date($someDate){
        $this->todoDate = $someDate;
    }

    function set_description($description){
        $this->description = $description;
    }



}