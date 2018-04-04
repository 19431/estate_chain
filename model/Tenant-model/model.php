<?php
/**
 * Created by PhpStorm.
 * Date: 4/1/2018
 * Time: 4:43 PM
 */

trait model
{
    private $name;
    private $id;


    function get_name(){
        return $this->name;
    }

    function get_id(){
        return $this->id;
    }
}