<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/1/2018
 * Time: 5:38 AM
 */
require_once "DBconnect.php";
require_once "manager_services/php/PropertyManager.php";

trait Queries
{
    use DBconnect;

    public function get_manager(){
        $mysqli = $this->connect_db();      //make a database connection object
        $query = "SELECT managerID FROM PropertyManager WHERE managerID = '$managerID';";
    }

    public function get_client(){

    }

    public function get_property(){

    }


}