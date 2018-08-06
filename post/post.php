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
  <div class="container bg-light rounded  py-4 px-4 mt-4">
    <?php
    require_once('../functions/database.php');
    $conexion = nuevaConexion();
    $post = traerPost($conexion);
    ?>
    <div class="row">
      <div >
        <table class="table table-striped table-dark">
          <tbody class="w-100">
            <?php
            foreach ($post as $elemento) {

              if ((isset($_GET['lang']) && $_GET['lang'] ==$elemento['language_id']) || !isset($_GET['lang']) ){
                echo '<tr>
                <td><h5>' .$elemento['title'].'</h5></td>
                <td><h6>'.$elemento['brief'].'</h6></td>
                <td><h6>'.$elemento['body'].'</h6></td>
                <td>';
                if($elemento['image'] != ''){
                  echo '<img src="../img/'.$elemento['image'].'" height="50px"  />';
                }
                echo '
                </td>
                <td class="text-right"><a href="eliminar.php?id='.$elemento['id'].'" class="btn btn-primary">Eliminar este post</a>
                <a href="form.php?id='.$elemento['id'].'" class="btn btn-success">Editar, este post</a></td>
                </tr>';
              }
            }
            ?>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <a href="form.php" class="btn btn-warning btn-lg">Agregar un post</a>

        </div>
      </div>
    </div>
  </body>
  </html>
