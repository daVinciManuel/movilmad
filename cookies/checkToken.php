<?php
function checkToken(){
// require './model/verifyLogin.php'i;
// require './model/queries.php';
    $tokenok = false;
  if(isset($_COOKIE['acctk']) && isset($_COOKIE['name'])){
    $name = $_COOKIE['name'];
    $token = $_COOKIE['acctk'];
    $email = getEmail($name);
    $superNumber = strlen($name);
    $separador = substr($email,2,$superNumber);
    $key = (intval(explode($separador,$token)[2] - 1)) / $superNumber;
    if(verify($email,$key)){
      $tokenok = true;
    }
  }
  return $tokenok;
}
