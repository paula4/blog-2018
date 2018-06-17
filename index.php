<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <?php
  require('head.php');
  ?>
</head>
<body class="bg-secondary">
  <?php
  require('navbar.php');
  ?>
  <div class="container bg-light rounded shadow py-4 px-2 mt-4">
    <?php
    require_once('functions/database.php');
    $conexion = nuevaConexion('localhost','root','','php_blog');
    $lenguajes = traerLenguajes($conexion);
    $cantidad = count($lenguajes);
    ?>
    <h4>Cantidad de Lenguajes: <?php echo $cantidad; ?></h4>
    <div class="row">
      <div class="col-6">
        <table class="table table-striped table-dark">
          <?php
          foreach ($lenguajes as $elemento) {
            echo '<tr>
            <td><h5>' .$elemento.'</h5></td>
            <td><button type="button" class="btn btn-primary">Eliminar esta cosa</button></td>
            <td><button type="button" class="btn btn-success">Editar, me confundi</button></td>
            </tr>';
          }?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
