 <?php
$login=$_POST["login"];
$password=$_POST["password"];

$con=mysqli_connect("localhost","root","","empresa");
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
  }
$sql="select * from usuario where login='$login'";
//echo $sql;

$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);



while($row=mysqli_fetch_assoc($result)){
    echo $row["login"];
    //lo introduzco en un array asociativo o un objeto json
}

$cantidad=mysqli_num_rows($result);
if($cantidad==1){
    echo "usuario ya existe";
}else{
    echo $login;
}


?>