<?php
/**
 * Created by PhpStorm.
 * Date: 3/31/2018
 * Time: 6:51 PM
 */

require_once "processes.php";

class Lease
{
    use model;
    private $start;
    private $end;
    private $price;
    private $status;

    function __construct($startDate, $endDate, $leasePrice, Property $property){
        // checks for nulls
        if ($startDate && $endDate && $property){
            $this->id = random_int(0, 10000);
            $this->start = $startDate;
            $this->end = $endDate;
            $this->price = $leasePrice;
            $this->status = "active";
        }
        else {
            die("Something wrong with your arguments");
        }
    }

    function get_start_date(){
        return $this->start;
    }

    function get_end_date(){
        return $this->end;
    }

    function set_end_date(DateTime $dateTime){
        $this->end = $dateTime;
    }

    function set_start_date(DateTime $dateTime){
        $this->start = $dateTime;
    }

    function get_price(){
        return $this->price;
    }

    function set_price($priceGiven){
        $this->price = $priceGiven;
    }

    function set_status($status){
        $this->status = $status;
    }

}