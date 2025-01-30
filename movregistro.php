<?php
require './control/cregistro.php';
?>
<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Page - MovilMad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
      
<body>
    <h1>MOVILMAD</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Registro Usuario</div>
		<div class="card-body">
		
          <form id="" name="form-registro" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="card-body">
		
		<div class="form-group">
			Nombre <input type="text" name="nombre" placeholder="nombre" class="form-control">
    </div>
		<div class="form-group">
			Apellido <input type="text" name="apellido" placeholder="apellido" class="form-control">
    </div>
        
		<input type="submit" name="submit" value="Crear Usuario" class="btn btn-warning disabled">
        </form>
		
      <a href='./movlogin.php'>Iniciar sesi&oacute;n</a>
	    </div>
    </div>
      <dialog class="card border-info <?php echo $visibilidad?>" >
        <!-- <div class="card-body"> -->
        <div class="card-header">
          Hola&nbsp;<?php echo $nombre ?>
        </div>
          <br>
          <b>Tu correo es:&nbsp;</b><?php echo $email ?>
          <br>
          <b>Tu clave es:&nbsp;</b><?php echo $clave ?>
          <br>
          <br>
          <a href='./movlogin.php'><button class="btn btn-info disabled w-100">Login</button></a>
        <!-- </div> -->
      </dialog>
    </div>

</body>

</html>
