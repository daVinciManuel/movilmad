<?php
function connect(){
// require './movconfig.php';
    $dbhost = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;

    try{
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
  return $conn;
}
