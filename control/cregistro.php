<?php
require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/mregistro.php';
$visibilidad = 'invisible';
$nombre = '';
$apellido = '';
$clave = '';
$email = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nombre = strtolower(htmlentities(trim($_POST['nombre'])));
  $apellido = strtolower(htmlentities(trim($_POST['apellido'])));
  $email = $nombre .'.'.$apellido . '@movilmad.net';
  $clave = getNewIdcliente();
  if(thisEmailExist($email)){
    $visibilidad = 'invisible';
    include './errormsg/registro/thisUserAlreadyExists.php';
  }else{
    $visibilidad = 'visible';
    saveUser($clave,$nombre,$apellido,$email);
    savePassword($clave);
  }
}
