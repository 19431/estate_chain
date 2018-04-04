<?php
/**
 * Created by PhpStorm.
 * Date: 3/31/2018
 * Time: 7:15 PM
 */
require_once 'processes.php';
class Property implements EstateProcesses
{
    use model;
    private $year;
    private $status;
    private $address;

    /**
     * Property constructor.
     * @param $givenName
     * @param $givenYear
     * @param $propertyStatus
     * @param $givenAddress
     */
    function __construct($givenName, $givenYear, $propertyStatus, $givenAddress){
        $this->id = random_int(1, 10000);
        $this->name = $givenName;
        $this->year = $givenYear;
        $this->status = $propertyStatus;
        $this->address = $givenAddress;
    }

    public function work_order()
    {
        // TODO: Implement work_order() method.
    }
}