<?php
require_once('functions/database.php');
$conexion = nuevaConexion();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  eliminarLenguaje($conexion,$id);
}
header("Location:index.php ");
?>
