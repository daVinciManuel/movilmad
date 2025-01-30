<?php
require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/verifyLogin.php';
require './cookies/checkToken.php';
if(!checkToken()){
  header('Location: ./movlogin.php');
}else{
  // VALORES to HTML
  $name = ($_COOKIE['name']);
  $fullname = getFullName($name);
  $id = getIdcliente($name);
  $logoutURL = './control/logout.php';
  $alquilarURL = './movalquilar.php';
  $consultarURL = './movconsultar.php';
  $devolverURL = './movdevolver.php';
}
if(isset($_POST['volver'])){
  header('Location: ./movwelcome.php');
}
