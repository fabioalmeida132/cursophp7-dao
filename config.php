<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 11/11/2018
 * Time: 14:20
 */

spl_autoload_register(function ($className){

    $filename = "class" . DIRECTORY_SEPARATOR . $className . ".php";

    if (file_exists($filename)){
        require_once ($filename);
    }
});
