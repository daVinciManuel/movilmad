<?php
// THIS PHP SCRIPT ONLY WORKS IF movilmad.topsecret TABLE IS EMPTY
// EXECUTE passwordsTable.sql BEFORE RUNNING THIS SCRIPT
require "../movconfig.php";
require "./connect.php";

function getIdList(){
  $conn = connect();
    $query = "SELECT idcliente FROM rclientes;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    // $id = $stmt->fetchColumn();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $idArr = $stmt->fetchAll();
  $idList = [];
  foreach($idArr as $i){
    foreach($i as $column => $id){
      array_push($idList, $id);
    }
  }
  return $idList;
}
function encryptAllId($idList){
  $passwordList = [];
  foreach($idList as $id){
    $idHash = password_hash($id, PASSWORD_DEFAULT);
    array_push($passwordList,$idHash);
  }
  return $passwordList;
}
function storePasswords($idList, $passList){
  $query = 'INSERT INTO topsecret (idcliente,clave) VALUES ';
for($i = 0; $i<sizeof($passList); $i++){
  if($query[strlen($query)-1] == ')'){
    $query .= ',';
  }
  $query .= '('. $idList[$i].',"'.$passList[$i].'")';
}
 $query .= ';';
     $conn = connect();
     try {
         $conn->beginTransaction();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $conn->commit();
    } catch (PDOException $e) {
        $conn->rollback();
        die($e->getMessage());
    }
    $conn = null;
  return $insertDone;
}
storePasswords(getIdList(),encryptAllId(getIdList()));
echo '<b>OK hashed passwords stored succesfully<b>';

