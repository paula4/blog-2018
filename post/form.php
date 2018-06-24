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


if(isset($_POST['enviar'])){ //Si se envio el formulario
  //argelos comunes
  $postedit = array(
    'title' =>$_POST['title'],
    'brief'=>$_POST['brief'],
    'body'=>$_POST['body'],

  );

  if($estaEditando){
    //editar
    editarPost($conexion,$postedit,$id);

  }else{
    //agregar
  //  agregarLenguaje($conexion,$name);//agrega en la db
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
  <div class="row">
    <div class="col-3 mx-auto bg-light shadow mt-4 py-4 px-2 rounded text-center">
      <form action="form.php<?php if($estaEditando) echo '?id='.$id; ?>" method="POST">
        <div class="form-group">
          <h6>Blog a editar</h6>
          <label>Titulo<input type="text" name="title" class="form-control" placeholder="Título" value="<?php echo $post['title'];?>"></label>
            <label>Resumen<input type="text" name="brief" class="form-control" placeholder="Resumen" value="<?php echo $post['brief'];?>"></label>
            <label class="d-block">Cuerpo del Blog</label>
            <textarea name="body" width="100%" rows="10" placeholder="Ingrese el texto"><?php echo $post['body']; ?></textarea>
        </div>
        <input name="enviar" type="submit" class="btn btn-warning" value="guardar" />
      </form>
    </div>
  </div>

</body>
</html>
