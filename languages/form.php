<?php
require_once('../functions/database.php');
$conexion=nuevaConexion();


if(isset($_GET['id'])){//si existe la variable $_GET[id] o sea si se quiere editar.
  $estaEditando = true;
  $id=$_GET['id'];
  $textoeditar=nombreLenguaje($conexion,$id);
}else{
  $estaEditando = false;
  $textoeditar = ""; //vacio
}


if(isset($_POST['nombre'])){ //Si se envio el formulario
  $name=$_POST['nombre'];

  if($estaEditando){
    //editar
    editarLenguaje($conexion,$name,$id);

  }else{
    //agregar
    agregarLenguaje($conexion,$name);//agrega en la db
  }
  header("Location:lista.php");

}
?>
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
  <div class="row">
    <div class="col-3 mx-auto bg-light shadow mt-4 py-4 px-2 rounded text-center">
      <form action="form.php<?php if($estaEditando) echo '?id='.$id; ?>" method="POST">
        <div class="form-group">
          <label>Nombre del lenguaje:</label>
          <input type="text" name="nombre" class="form-control" placeholder="Por ejemplo PHP" value="<?php echo $textoeditar ?>">
        </div>
        <button type="submit" class="btn btn-warning">Guardar</button>
      </form>

    </div>
  </div>

</body>
</html>
