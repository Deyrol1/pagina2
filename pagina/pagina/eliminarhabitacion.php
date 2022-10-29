<?php 


include ("conexion.php");

$id= $_GET["id_habitacion"];

$eliminar="DELETE FROM habitacion WHERE numero='$id'";

$elimina= $conexion->query($eliminar);

header("location:gestion_habitacion.php");

$conexion->close();


?>