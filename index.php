<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 11/11/2018
 * Time: 14:23
 */

require_once ("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);

?>

