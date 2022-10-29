<?php


include ("conexion.php");

$id= $_GET["Id_usuario"];




$eliminar="DELETE FROM usuario WHERE cedula='$id'";

$elimina= $conexion->query($eliminar);

header("location:gestion_usuario.php");

$conexion->close();



?>