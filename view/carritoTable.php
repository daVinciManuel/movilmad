<table border=1>
  <thead>
    <th>Vehiculo</th>
    <th>Precio Base</th>
  </thead>
  <tbody>
    <?php
    if(isset($_COOKIE['vehiculosList'])){
    if(strpos($_COOKIE['vehiculosList'],$_POST['vehiculos']) != false){
        ?>
    <tr>
      <td><?php echo getModel($_POST['vehiculos']); ?></td>
      <td><?php echo getPrecioBase($_POST['vehiculos']); ?></td>
    </tr>

    <?php
    }
    }else {
        ?>
    <tr>
      <td><?php echo getModel($_POST['vehiculos']); ?></td>
      <td><?php echo getPrecioBase($_POST['vehiculos']); ?></td>
    </tr>

    <?php
    }
    if(isset($_COOKIE['vehiculosList'])){

      $vehiculos = explode(":", $_COOKIE['vehiculosList']);
    foreach ($vehiculos as $v) {
    ?>
    <tr>
      <td><?php echo getModel($v); ?></td>
      <td><?php echo getPrecioBase($v); ?></td>
    </tr>
    <?php
    }
    }
    ?>
  </tbody>
</table>
