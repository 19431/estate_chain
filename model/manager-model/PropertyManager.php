<?php
/**
 * Created by PhpStorm.
 * Date: 3/31/2018
 * Time: 6:53 PM
 */
require_once "../Tenant-model/processes.php";
require_once "../Tenant-model/Tenant.php";
class PropertyManager implements EstateProcesses
{
    use model;
    private $mobileNo;

    /**
     * PropertyManager constructor.
     * @param $givenName
     * @param $givenId
     * @param $givenNumber
     */
    function __construct($givenName, $givenId, $givenNumber)
    {
        if ($givenName && $givenId && $givenNumber){
            $this->name = $givenName;
            $this->id = $givenId;
            $this->mobileNo = $givenNumber;
        }
        else{
            die("Something went wrong with your arguments");
        }
    }

    public function work_order(){
        // TODO: Implement work_order() method.
    }

    public function get_no(){
        return $this->mobileNo;
    }

    public function check_request(WorkRequest $request){
        $workStatus = $request->get_status();
        $workDate = $request->get_date();
        $workDescription = $request->get_description();
    }

    function terminate_lease(Lease $lease){
        $lease->set_status("terminated");
        $lease->set_end_date(new DateTime(intlcal_get_now()));
    }

    /**
     * @param Lease $lease
     * @param DateTime $startDate
     * @param DateTime $endDate
     */
    function renew_lease(Lease $lease, DateTime $startDate, DateTime $endDate){
        $lease->set_status("renewed");
        $lease->set_end_date($endDate);
        $lease->set_start_date($startDate);
    }
}

?>