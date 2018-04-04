<?php

class MonthlyPayment
{
    use model;
    private $price;
    private $date;
    private $status;

    /**
     * MonthlyPayment constructor.
     * @param $price
     * @param DateTime $paidDate
     * @param Lease $lease
     */
    function __construct($price, DateTime $paidDate, Lease $lease){
        //checks for null references
        if ($price && $paidDate && $lease){
            //confirm that lease object exists
            if (!empty($lease->get_id())){
                $this->date = $paidDate;
                $this->price = $price;
                $this->id = random_int(0, 100000);
                try{
                    $this->status = new PaymentStatus(2);   //every new payment is pending until confirmed successful
                }
                catch (UnexpectedValueException $value){
                    echo $value->getMessage();
                }

            }
        }
    }

    function get_amount(){
        return $this->price;
    }

    function get_date(){
        return $this->date;
    }

    function set_amount($priceIn){
        $this->price = $priceIn;
    }

    function set_date(DateTime $dateGiven){
        $this->date = $dateGiven;
    }

    function get_status(){
        return $this->status;
    }

    //gets called to update payment status
    function set_status(PaymentStatus $statusGiven){
        $this->status = $statusGiven;
    }

}