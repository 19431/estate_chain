<?php
    require_once "manager_services/php/PropertyManager.php";
    require_once "processes.php";
    require_once "client_services/php/Tenant.php";
    require_once "contractor_services/php/vendor.php";
    require_once "config.php";      //database connection file

    /*if (isset($_POST['managerID'])) {
        $managerID = $_POST['managerID'];
        $Query = "SELECT managerID FROM PropertyManager WHERE managerID = '$managerID';";

        //Query execution
        try{
            $ExecQuery = MySQLi_query($conn, $Query);
        }
        catch (Exception $e){
            echo "<p>incorrect id entered</p>";
            die(mysqli_error($conn));
        }*/
        $property = new Property( "2 BD Condo" , 1990,
            "occupied","100 Birch tree ln Temple Hills MD");
        $manager = new PropertyManager("Tobi Johnson", 4321, 987654362);
        //$lease = new Lease(1122, "01/23/2018", "01/23/2020", $property);
        $tenant = new Tenant("seyi Oni", 12345, new Lease("01/23/2018", "01/23/2020", $property));
        $vendor = new Vendor("Vendor A", 34767, "Oni & Sons", "2387665333", "Plumber");


?>