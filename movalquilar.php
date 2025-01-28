<?php
require './movconfig.php';
require './sql/connect.php';
require './model/queries.php';
require './model/verifyLogin.php';
require './cookies/checkToken.php';
if (!checkToken()) {
    header('Location: ./movlogin.php');
} else {
    // VALORES to HTML
    $name = ($_COOKIE['name']);
    $fullname = getFullName($name);
    $id = getIdcliente($name);
    $logoutURL = './control/logout.php';
    $alquilarURL = './movalquilar.php';
    $consultarURL = './movconsultar.php';
    $devolverURL = './movdevolver.php';
    $fechayhora = date('Y-m-d H:i');
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
		<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
		<div class="card-body">
	  	  

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	
    <B>Bienvenido/a: </B><?php echo $fullname; ?><BR><BR>
		<B>Identificador Cliente:</B> <?php echo $id; ?> <BR><BR>
		
            <B>Vehiculos disponibles en este momento:</B> <?php echo $fechayhora; ?> <BR><BR>
		
			<B>Matricula/Marca/Modelo: </B><select name="vehiculos" class="form-control">
				
			</select>
			
		
		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
<BR><a href="<?php echo $logoutURL;?>">Cerrar Sesión</a>
  </body>
   
</html>

