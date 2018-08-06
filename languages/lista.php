<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <?php
  require('../head.php');
  ?>
</head>
<body class="bg-secondary">
  <?php
  require('../navbar.php');
  ?>
  <div class="container bg-light rounded shadow py-4 px-2 mt-4">
    <?php
    require_once('../functions/database.php');
    $conexion = nuevaConexion();
    $lenguajes = traerLenguajes($conexion);
    $cantidad = count($lenguajes);
    ?>
    <h4>Cantidad de Lenguajes: <?php echo $cantidad; ?></h4>
    <div class="row">
      <div class="col-6">
        <table class="table table-striped table-dark">
          <tbody class="w-100">
            <?php
            foreach ($lenguajes as $elemento) {
              echo '<tr>
              <td><h5>' .$elemento['name'].'</h5></td>
              <td class="text-right"><a href="eliminar.php?id='.$elemento['id'].'" class="btn btn-primary">Eliminar</a>
              <a href="form.php?id='.$elemento['id'].'" class="btn btn-success">Editar</a></td>
              </tr>';
            }?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <a href="form.php" class="btn btn-warning btn-lg">Agregar un lenguaje</a>
      </div>
    </div>
  </div>
</body>
</html>
