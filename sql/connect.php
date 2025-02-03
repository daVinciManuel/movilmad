<?php
function connect(){
// require './movconfig.php';
    $dbhost = substr($_ENV['DB_HOST'],0,78);
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_DATABASE'];

    try{
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
  return $conn;
}
