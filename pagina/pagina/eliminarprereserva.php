<?php 


include ("conexion.php");

$id= $_GET["Id_usuario"];

$eliminar="DELETE FROM prereserva WHERE cedula='$id'";

$elimina= $conexion->query($eliminar);

header("location:gestion_reserva.php");

$conexion->close();


?>