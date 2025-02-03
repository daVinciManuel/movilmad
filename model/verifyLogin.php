<?php
function verify($email,$pass){
 // require_once('../sql/connect.php');
  $conn = connect();
  $ok = false;
    $query = "SELECT count(idcliente) FROM rclientes WHERE email='".$email."' AND idcliente='".$pass."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $exist = $stmt->fetchColumn();
  if($exist == 1){
    $ok = true;
  } 
  $conn = null;
  return $ok;
}
function baja($pass){
  $conn = connect();
  $ok = true;
    $query = "SELECT fecha_baja FROM rclientes WHERE idcliente='".$pass."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $baja = $stmt->fetchColumn();
  if($baja != null){
    $ok = false;
  } 
  $conn = null;
  return $ok;
}
function moroso($pass){
  $conn = connect();
  $ok = true;
    $query = "SELECT pendiente_pago FROM rclientes WHERE idcliente='".$pass."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $moroso = $stmt->fetchColumn();
  if($moroso == 0){
    $ok = false;
  } 
  $conn = null;
  return $ok;
}
