<?php
/**
 * Created by PhpStorm.
 * User: ooni1
 * Date: 4/3/2018
 * Time: 1:38 PM
 */

trait view{

    public function load($filename, $param){
        ob_start();
        extract($param);
        $view_dir = '../views';
        include ($view_dir.$filename."php");
        return $output = ob_get_clean();
    }

}