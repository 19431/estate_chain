<?php
/**
 * Created by PhpStorm.
 * Date: 4/4/2018
 * Time: 4:07 AM
 */

require_once "model/manager-model/PropertyManager.php";
require_once "model/manager-model/processes.php";
require_once "model/Tenant-model/Tenant.php";
require_once "model/vendor_model/vendor.php";
require_once "model/manager-model/DBconnect.php";      //database conn

$paymentController = new PaymentController();
$paymentController->handle_payments();

?>