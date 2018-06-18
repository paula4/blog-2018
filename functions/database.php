<?php
//aca van todas las funciones para manejar los datos de la bd


//esta funcion nos devuelve el objeto de la conexion, si falla muestra un mensaje de error.
function nuevaConexion(){
  // este es el objeto de la conexion
  $conexion = new mysqli('localhost','root','','php_blog');

  if($conexion->connect_errno){    //si se produce un error de conexion
    //la funcion "die" hace que no se siga cargando nada y muestra el mensaje que le pones.
    die("Error de conexion");
  }
  else{ // si no hubo errores
    return $conexion; //devuleve la conexion.
  }
}



function traerLenguajes($conexion){
  //los datos son el resultado de ejecutar esa consulta.
  $datos = $conexion->query('select * FROM languages');

  $listaLenguajes = array(); //es un arreglo vacio donde se van a meter todos los nombres de los lenguajes.

  if($datos){//si hay datos que cumplan la consulta
    while($lenguaje = $datos->fetch_assoc()){//este es un ciclo que se repite para cada lenguaje en datos

      array_push($listaLenguajes,$lenguaje);
    }
  }

  return $listaLenguajes;
}


//Elimina un lenguaje segun su id
function eliminarLenguaje($conexion,$id){
  $id = $conexion->real_escape_string( (int) $id);
  $conexion->query("delete FROM languages where id ='$id'");
}
//Elimina un lenguaje por su nombre
function agregarLenguaje($conexion,$nombre){
  $nombre = $conexion->real_escape_string( (string) $nombre);
  $conexion->query("insert into languages (name) values('$nombre')");
}
//Edita un lenguaje segun su id
function editarLenguaje($conexion,$nombre,$id){
  $nombre = $conexion->real_escape_string( (string) $nombre);
  $id = $conexion->real_escape_string( (int) $id);
  $conexion->query("update languages set name='$nombre' where id='$id'");
}

//Devuelve el nombre de un lenguaje segun su id
function nombreLenguaje($conexion,$id){
  $id = $conexion->real_escape_string( (int) $id);
  $datos = $conexion->query("select name from languages where id ='$id'");
  if($datos){ //si hay datos
    $arregloDeDatos =  $datos->fetch_assoc();
    return $arregloDeDatos['name'];
  }
  else return "Este lenguaje no existe";
}
?>
