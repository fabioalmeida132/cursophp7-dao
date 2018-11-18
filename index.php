<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 11/11/2018
 * Time: 14:23
 */

require_once ("config.php");

/*$user = new Usuario();
$user->loadById(3);*/

$lista = Usuario::getLista();
echo json_encode($lista);

//$busca = Usuario::search("jo");
//echo json_encode($busca);

// CARREGA UM USUARIO
//$usuario = new Usuario();
//$usuario->login("root","456789d");

// COMANDO INSERT
//$aluno = new Usuario("Roberto", "741852");
//$aluno->insert();

// UPDATE
//$usuario = new Usuario();
//$usuario->loadByid(7);
//$usuario->update("professor", "123abc");

// DELETE

//$usuario = new Usuario();
//$usuario->loadByid(7);
//$usuario->delete();

//echo $usuario;

?>


