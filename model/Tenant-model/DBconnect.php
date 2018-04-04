<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/1/2018
 * Time: 5:21 AM
 */

trait DBconnect
{
    public function connect_db(){
        $conn = new mysqli("localhost", "root", "Olomitt1", "estateChain");
        if ($conn->connect_errno){
            return $conn;
        }
        else{
            die("connection error" . $conn->connect_errno);
        }
    }
}