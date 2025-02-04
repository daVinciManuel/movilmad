<?php
function setVehiculoOcupado($matricula){
    $updateDone = false;
    $conn = connect();
    try {
        $conn->beginTransaction();
        //la tabla esta declarada en lowercase en la base de datos
        $disponible = 'N';
        $query = 'UPDATE rvehiculos SET disponible="'.$disponible.'" WHERE matricula="'.$matricula.'";';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $conn->commit();
    } catch (PDOException $e) {
        $conn->rollback();
        die($e->getMessage());
    }
    $conn = null;
}
function setVehiculoDisponible($matricula){
    $updateDone = false;
    $conn = connect();
    try {
        $conn->beginTransaction();
        //la tabla esta declarada en lowercase en la base de datos
        $disponible = 'S';
        $query = 'UPDATE rvehiculos SET disponible="'.$disponible.'" WHERE matricula="'.$matricula.'";';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $conn->commit();
    } catch (PDOException $e) {
        $conn->rollback();
        die($e->getMessage());
    }
    $conn = null;
}
