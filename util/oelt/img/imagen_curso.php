<?php
require_once("../conexion.php");

########## imagen_mostrar.php ##########

# debe recibir el id de la imagen a mostrar

# http://www.lawebdelprogramador.com

 @$mysqli = new mysqli($Config -> rutadb, $Config -> usuariodb, $Config -> clavedb, $Config -> nombredb);

# Conectamos con MySQL

$id=$_REQUEST["id"];

# Buscamos la imagen a mostrar
if ($id<>""){
	$sql= "SELECT imagen FROM cursos WHERE id_curso='".$id."'";
}

$url=$_REQUEST["url"];

# Buscamos la imagen a mostrar
if ($url<>""){
	$sql= "SELECT imagen FROM cursos WHERE url='".$url."'";
}



$resul = $mysqli->query($sql);

$row=$resul->fetch_array(MYSQLI_ASSOC);

 

# Mostramos la imagen

header("Content-type:".$row["tipoimg"]);

echo $row["imagen"];

?>