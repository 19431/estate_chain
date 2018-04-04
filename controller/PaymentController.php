<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/4/2018
 * Time: 4:14 AM
 */

class PaymentController{
    private $payment;

    public function __construct(){
        $price = $_POST[''];
        $paidDate = $_POST[''];
        $leaseIn = $_POST['leaseID'];
        $lease = "select ID from leases where ID = '$leaseIn';";    //get lease data from db
        $this->payment = new monthlyPayment($price,  $paidDate, $lease);
    }

    public function handle_payments(){

    }

    public function showError($title, $message) {
        include '../views/error.php';

}

}