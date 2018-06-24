<?php
require_once('../functions/database.php');
$conexion = nuevaConexion();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  eliminarPost($conexion,$id);
}
header("Location:post.php ");
?>
