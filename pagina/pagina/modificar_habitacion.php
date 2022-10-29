<?php ob_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    





     <!--clase modal modificar habitacion-->
     <div class="modal" tabindex="-1" role="dialog" id="modificar_habitacion">




  
     <?php


include ("conexion.php");


$id= $_GET["id_habitacion"];

$buscar="SELECT * FROM habitacion WHERE numero='$id'";



$aush=mysqli_query($conexion,$buscar);
                                
                                



while($row=mysqli_fetch_assoc($aush))
    
   
        
{



?>





                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modificar habitacion</h5>
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST">      
                                <div class="container" id="crear_habitacion">
                                  <div class="row">
                                      <div class="col">
                                      
                                          
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <input type="number" class="form-control" placeholder="numero" name="numero" value="<?php echo $row ["numero"];?>">
                                              <br>
                                            </div>
                                        </div>
                                          
                                     
                                      </div>
                                   
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="tipo_habitacion">
    
                                                <option selected><?php echo $row ["tipo"];?></option>
                                                <option value="personal">Personal</option>
                                                <option value="doble">Doble</option>
                                                <option value="familiar">Familiar</option>
                                                <option value="suite">Suite</option>
                                              </select>
                                              <br>
                                              
                                      </div>   
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="estado_habitacion">
    
                                                <option selected><?php echo $row ["estado"];?></option>
                                                <option value="Disponible">Disponible</option>
                                                <option value="Ocupado">Ocupado</option>
                                                <option value="Sucio">Sucio</option>
                                                <option value="Limpieza">Limpieza</option>
                                                <option value="Mantenimiento">Mantenimiento</option>
                                              </select>
                                              <br>
                                              <?php } ?>
                                      </div>  
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="crear_habitacion">Modificar</button>
                                </form>
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='gestion_habitacion.php'">Cerrar</button>
                          
                          <?php
                        if(isset($_POST['crear_habitacion'])){
                            require("conexion.php");  
                        $numero=$_POST['numero'];
                        $tipo=$_POST['tipo_habitacion'];
                        $estado=$_POST['estado_habitacion'];

                        
                        $valor = "SELECT * from categoria_habitacion WHERE tipo_habitacion='$tipo'";

                       
                        $amm=mysqli_query($conexion,$valor);
                        $val=mysqli_fetch_assoc($amm);

                        $valorf= $val["Valor"];

                        
                        
                      
                        mysqli_query($conexion,"UPDATE habitacion SET numero = '$numero', tipo = '$tipo', estado = '$estado', costo=$valorf WHERE numero = '$id'");

                        header("location:gestion_habitacion.php");
                        }

                        ?>
                        </div>
                      </div>
                    </div>
                    
                  </div>
             


<script src="mostrarhab.js"></script>




</body>
</html>

<?php ob_end_flush(); ?>