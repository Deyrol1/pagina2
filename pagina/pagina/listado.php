<?php 
require("conexion.php"); 


$log=$_POST["tipo"];


$sql="select * from habitacion where tipo='$log' AND estado='Disponible'";

$miau= array();
$result=mysqli_query($conexion,$sql);

while($row=mysqli_fetch_assoc($result)){
    
    
    
    $miau[]=$row;
  
    //lo introduzco en un array asociativo o un objeto json
}

$json = json_encode($miau);
$bytes = file_put_contents("myfile.json", $json); 


?>