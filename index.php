<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 11/11/2018
 * Time: 14:23
 */

require_once ("config.php");

$user = new Usuario();
$user->loadById(3);

echo $user;
?>

