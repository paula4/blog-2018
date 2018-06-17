<?php
//aca van todas las funciones para manejar los datos de la bd

/*
Para agregar, modificar, o eliminar datos de la bd necesitamos una conexion
esa conexion es un objeto que ya trae las funciones para hacer todo eso.
*/

//esta funcion nos devuelve el objeto de la conexion, si falla muestra un mensaje de error.
function nuevaConexion($host,$usuario,$contraseña,$bd){
  // este es el objeto de la conexion
  $conexion = new mysqli($host,$usuario,$contraseña,$bd);

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
      /*
        la funcion fetch_assoc() de los datos de la consulta sql transforma estos datos
        en un arreglo que tiene los datos de la consulta. es raro de entender, pero la variable $datos si bien
        tiene todos los datos de la consulta, no los tiene ordenados en un arreglo, entonces hay que hacer eso.
      */
      array_push($listaLenguajes,$lenguaje['name']);//se agrega cada nombre de lenguaje (que es un string) a la lista de lenguajes.
    }
  }
  //una vez que se metieron todos los nombres de los lenguajes en el arreglo, lo devolvemos
  return $listaLenguajes;
}

?>
