<?php
require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/verifyLogin.php';
require './cookies/checkToken.php';
if(!checkToken()){
  header('Location: ./movlogin.php');
}else{
  // VALORES to HTML
  $name = ($_COOKIE['name']);
  $fullname = getFullName($name);
  $id = getIdcliente($name);
  $logoutURL = './control/logout.php';
  $alquilarURL = './movalquilar.php';
  $consultarURL = './movconsultar.php';
  $devolverURL = './movdevolver.php';
}
?>
<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
   
 <body>
    <h1>Servicio de ALQUILER DE E-CARS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


    <B>Bienvenido/a: </B><?php echo $fullname; ?><BR><BR>
		<B>Identificador Cliente:</B> <?php echo $id; ?> <BR><BR>
	 
		
       <!--Formulario con botones -->
	
          <input type="button" value="Alquilar Vehículo" onclick="window.location.href='<?php echo $alquilarURL; ?>'" class="btn btn-warning disabled">
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='<?php echo $consultarURL; ?>'" class="btn btn-warning disabled">
		<input type="button" value="Devolver Vehículo" onclick="window.location.href='<?php echo $devolverURL; ?>'" class="btn btn-warning disabled">
		</br></br>
		
		
		
<BR><a href="<?php echo $logoutURL;?>">Cerrar Sesión</a>
	</div>  
	  
	  
     
   </body>
   
</html>


