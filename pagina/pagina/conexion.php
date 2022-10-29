<?php

$server="localhost";
$user="root";
$pass="";
$db="pagina";

$conexion= new mysqli($server,$user,$pass,$db);
mysqli_set_charset($conexion,"utf8");
if($conexion->connect_errno){
    die("la conexion ha fallado".$conexion->connect_errno);

}

?>