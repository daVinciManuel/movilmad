<?php
function connect(){
    $dbhost = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_DATABASE'];

    // $dbhost = 'localhost';
    // $username = 'root';
    // $password = 'rootroot';
    // $dbname = 'movilmad';

    try{
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
  return $conn;
}
