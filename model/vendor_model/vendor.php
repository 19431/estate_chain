<?php  
/**
* 
*/
require_once "../manager-model/processes.php";
class Vendor implements EstateProcesses
{
    use model;      //values and functions imported from trait 'model'. See model for more info
	private $type;
	private $companyName;
	private $mobileNo;

    //make a new vendor
    /**
     * Vendor constructor.
     * @param $vName
     * @param $vId
     * @param $vCompany     //company subcontracting for
     * @param $vPhone
     * @param $vType    //describing job role
     */
    function __construct($vName, $vId, $vCompany, $vPhone, $vType){
		$this->name = $vName;
		$this->id = random_int(0, 999);
		$this->type = $vType;
		$this->companyName = $vCompany;
		$this->mobileNo = $vPhone;
	}

	function get_type(){
		return $this->type;
	}

	function get_company(){
		return $this->companyName;
	}

	function get_no(){
		return $this->mobileNo;
	}

	function set_company($givenCompany){
	    $this->companyName = $givenCompany;
    }

    /**
     * @param WorkRequest $work     //work object to be processed
     * @param $vComments        //vendor's thoughts on work after attempting fix
     * @param $doable        //indicates whether work is doable or not
     * @param $workStatus       //vendor's update on work status
     * @return WorkRequest      //really should be work order
     */
    public function do_work(WorkRequest $work, $vComments, $doable, $workStatus){
	    if ($doable == "yes"){
            $work->set_date(new DateTime(intlcal_get_now()));
        }
        $work->set_description($vComments);
        $work->set_status($workStatus);
        return $work;
    }
}

?>