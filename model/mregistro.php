<?php
function saveUser($idcliente,$nombre,$apellido,$email){

    $conn = connect();
    try {
        $conn->beginTransaction();
        $query = "INSERT INTO rclientes(idcliente,nombre,apellido,email,fecha_alta)
                            VALUES (:idcliente,:nombre,:apellido,:email,:fecha_alta)";
        $stmt = $conn->prepare($query);

        $fecha_alta = date('Y-m-d H:i');

        $stmt->bindParam(':idcliente', $idcliente);
        $stmt->bindParam(':nombre', strtoupper($nombre));
        $stmt->bindParam(':apellido', strtoupper($apellido));
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fecha_alta', $fecha_alta);
        // $stmt->bindParam(':fecha_baja', null);
        // $stmt->bindParam(':pendiente_pago', null);
        $stmt->execute();
        $conn->commit();
    } catch (PDOException $e) {
        $conn->rollback();
        die($e->getMessage());

    }
    $conn = null;
}
function savePassword($pass){
    $conn = connect();
    $clave = password_hash($pass, PASSWORD_DEFAULT);
  try {
      $conn->beginTransaction();
      $query = 'INSERT INTO topsecret (idcliente,clave) VALUES (:idcliente,:clave)';
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':idcliente', $pass);
      $stmt->bindParam(':clave', $clave);
      $stmt->execute();
      $conn->commit();
  } catch (PDOException $e) {
      $conn->rollback();
      die($e->getMessage());
  }
    $conn = null;
}
