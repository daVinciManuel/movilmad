<?php
function addToCarrito($vehiculo){
  if(isset($_COOKIE['vehiculosList'])){
    $vehiculosList = $_COOKIE['vehiculosList'] . ':' . $vehiculo;
    setCookie("vehiculosList",$vehiculosList, time() + 3600, "/");
  }else {
    // to do: poner el email al inicio de la lista, y luego modificar las funciones que lean la lista
    // $startVehiculosList = getEmail($_COOKIE['name']) . '/' . 
    setCookie("vehiculosList",$vehiculo, time() + 3600, "/");
  }
}
function vaciar_carrito(){
  setCookie("vehiculosList",'',time() - 9999, "/");
}
