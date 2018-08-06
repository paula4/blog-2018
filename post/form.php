<?php
require_once('../functions/database.php');
$conexion=nuevaConexion();


if(isset($_GET['id'])){//si existe la variable $_GET[id] o sea si se quiere editar.
  $estaEditando = true;
  $id=$_GET['id'];
  $post=datosPost($conexion,$id);
}else{
  $estaEditando = false;
  $post = null; //vacio
}


if(isset($_POST['enviar'] )){ //Si se envio el formulario
  //arreglos comunes
  $postedit = array(
    'title' =>$_POST['title'],
    'brief'=>$_POST['brief'],
    'body'=>$_POST['body'],
    'language'=> $_POST['language']
  );

  if($estaEditando){
    //editar
    editarPost($conexion,$postedit,$id);

  }else{
    //agregar
    agregarPost($conexion,$postedit);//agrega en la db
  }
  header("Location:post.php");

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
  <div>
    <div class="col-4 mx-auto bg-light shadow mt-4 py-4 px-2 rounded">
      <form action="form.php<?php if($estaEditando) echo '?id='.$id; ?>" method="POST">
        <div class="form-group">
          <h6 class="text-center">Blog a editar</h6>
          <label class="d-block">Titulo<input  required type="text" name="title" class="form-control" placeholder="Título" value="<?php echo $post['title'];?>"></label>
            <label class="d-block">Resumen<input required  type="text" name="brief" class="form-control" placeholder="Resumen" value="<?php echo $post['brief'];?>"></label>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Lenguaje</label>
          <select required class="form-control" name="language">
            <option>Seleccione un lenguaje</option>
            <?php
            require_once('../functions/database.php');
            $conexion = nuevaConexion();
            $lenguajes = traerLenguajes($conexion);
            foreach ($lenguajes as $elemento) {
              echo '<option value="'.$elemento['id'].'"'.($post['language_id'] == $elemento['id'] ? ' selected' : '').'>'.$elemento['name'].'</option>';
            }?>
          </select>
        </div>
        <div class="form-group">
          <label class="d-block">Cuerpo del Blog</label>
          <textarea required name="body" class="form-control" width="100%" rows="10" placeholder="Ingrese el texto"><?php echo $post['body']; ?></textarea>
        </div>
        <div class="form-group text-center">
          <input name="enviar" type="submit" class="btn btn-warning" value="guardar" />
        </div>
      </form>
    </div>
  </div>

</body>
</html>
