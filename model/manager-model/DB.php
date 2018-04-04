<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/1/2018
 * Time: 5:21 AM
 */

//singleton class to ensure single connection throughout
class DB
{
    //restricted to within class usage
    private static $instance = NULL;

     //private in order to ensure only one class instance
    private function __construct() {
        //no implementation needed
    }

    //private in order to ensure
    private function __clone() {
        //no implementation needed
    }

    //only way to access DB object outside class, leaving only one instance possible
    public static function get_instance() {
        if (!isset(self::$instance)) {
            //using pdo for greater security
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=estateChain', 'root', 'root', $pdo_options);
        }
        return self::$instance;
    }
}