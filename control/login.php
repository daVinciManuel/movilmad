<?php
// require_once '../movconfig.php';
require_once '../sql/connect.php';
require '../model/verifyLogin.php';
require '../cookies/makeToken.php';
require '../cookies/saveUsername.php';
if(isset($_POST['email']) && isset($_POST['password'])){

  $email = $_POST['email'];
  $pass = $_POST['password'];
  // verifica que usuario + contrasenna sean correctos
  if(verify($email,$pass)){
    // comprueba si cliente esta de baja
    if(baja($pass)){
      // comprueba si cliente debe algo
      if(!moroso($pass)){
        header('Location: ../movwelcome.php');
        makeToken($email,$pass);
        saveUsername($email);
      }else{ echo "Pague su deuda y vuelva a intentarlo. Go back to login"; }
    }else{ echo "te has dado de baja. Reactiva tu cuenta"; }
  }else{ echo "usuario o contraseña incorrecta"; }

}else{
  echo "Por favor rellene todos los campos y vuelva a intentar.";
}
