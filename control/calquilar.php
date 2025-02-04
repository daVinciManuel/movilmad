<?php
// require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/verifyLogin.php';
require './cookies/checkToken.php';
require './cookies/carrito.php';
require './model/updates.php';
if (!checkToken()) {
    header('Location: ./movlogin.php');
} else {
    // VALORES to HTML
    $name = ($_COOKIE['name']);
    $fullname = getFullName($name);
    $id = getIdcliente($name);
    $logoutURL = './control/logout.php';
    $fechayhora = date('Y-m-d H:i');

// ----------------- vaciar carrito ----------------------
if(isset($_POST['vaciar'])){
  if($_POST['vaciar']){
    foreach(explode(':',$_COOKIE['vehiculosList']) as $matricula){

      setVehiculoDisponible($matricula);
    }
    vaciar_carrito();
    $_POST['vehiculos'] = NULL;
    $agregarCarritoBTNstate = '';
  $msgLimitReached = '';
  }
}
// ----------------- agregar a carrito ----------------------
if(isset($_POST['agregar'])){
  setVehiculoOcupado($_POST['vehiculos']);
  addToCarrito($_POST['vehiculos']);
}
  $agregarCarritoBTNstate = '';
  //
// ------------------ SELECT > OPTIONS VEHICULOS ----------------
  $optionsList = '';
  $vehiculos = getAllVehiculos();
  foreach($vehiculos as $v){
      $optionsList .= '<option value="' . $v['matricula'] .'">'.$v['matricula'] . ' - ' . $v['marca'] . ' ' . $v['modelo'] .'</option>';
  }
}
// ----------------- LIMITE DE VEHICULOS ALCANZADO --------------------------
$msgLimitReached = '';
if(isset($_COOKIE['vehiculosList'])){
  $limitVehiculos = 3;
  $numberOfVehiculosAlquilados = substr_count($_COOKIE['vehiculosList'],':') + 1;
  if($numberOfVehiculosAlquilados > $limitVehiculos - 2){
    $agregarCarritoBTNstate = 'disabled';
    $msgLimitReached = 'title="Limite de vehiculos alcanzado"';
  }
}
