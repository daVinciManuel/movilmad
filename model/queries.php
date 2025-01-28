<?php
// require_once './sql/connect.php';
function getEmail($name){
  $conn = connect();
    $query = "SELECT email FROM rclientes WHERE nombre='".$name."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $email = $stmt->fetchColumn();
  return $email;
}
function getName($email){
  $conn = connect();
    $query = "SELECT nombre FROM rclientes WHERE email='".$email."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $name = $stmt->fetchColumn();
  return $name;
}
function getIdcliente($name){
  $conn = connect();
    $query = "SELECT idcliente FROM rclientes WHERE nombre='".$name."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $id = $stmt->fetchColumn();
  return $id;
}
function getFullName($name){
  $conn = connect();
    $query = "SELECT nombre, apellido FROM rclientes WHERE nombre='".$name."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rawResult = $stmt->fetchAll();
    $name = $rawResult[0]['nombre'];
    $apellido = $rawResult[0]['apellido'];
  $fullname = $name . ' '. $apellido;
  return $fullname;
}
