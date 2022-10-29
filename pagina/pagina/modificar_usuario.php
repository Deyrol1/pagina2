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


   <!--clase modal modificar usuario-->

 
   <div class="modal" tabindex="-1" role="dialog" id="modificar_usuario">



  
   <?php


include ("conexion.php");


$id= $_GET["id_cedula"];

$buscar="SELECT * FROM usuario WHERE cedula='$id'";



$aush=mysqli_query($conexion,$buscar);
                                
                                



while($row=mysqli_fetch_assoc($aush))
    
   
        
{



?>
 



                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modificar usuario</h5>
           
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST">      
                                <div class="container" id="crear_usuario">
                                  <div class="row">
                                      <div class="col">
                                      
                                          
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <input type="number" class="form-control" placeholder="Cedula" name="cedula_usuario" value="<?php echo $row ["cedula"];?>" >
                                              <br>
                                            </div>
                                        </div>
                                          
                                     
                                      </div>
                                      <div class="col">
                                        <div class="row">
                                            <div class="col-xs-2">
                                              <input type="text" class="form-control" placeholder="Nombre" name="nombre_usuario" value="<?php echo $row ["nombre"];?>">
                                              <br>
                                            </div>
                                        </div>
                                          
                                      </div>
                                
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="tipo_usuario">
                                                <option selected><?php echo$row["tipo"];?></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Recepcionista">Recepcionista</option>
                                                <option value="Limpiador">Limpiador</option>
                                              </select>
                                              <br>
                                      </div>    
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="actu_usuario">Crear usuario</button>
                               
                                </form><?php  }?>
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='gestion_usuario.php'">Cerrar</button>
                          
                          <?php

                        
                        if(isset($_POST['actu_usuario'])){
                         
                            require("conexion.php");  
                        $fecha1=$_POST['cedula_usuario'];
                        $fecha2=$_POST['nombre_usuario'];
                        $tipo=$_POST['tipo_usuario'];
                        
                        
                        
                        mysqli_query($conexion,"UPDATE usuario SET cedula = '$fecha1', nombre = '$fecha2', tipo = '$tipo' WHERE cedula = '$id'");
                        header("location:gestion_usuario.php");
                       
                        }
                        ?>

                 
                        </div>
                      </div>
                    </div>
                    
                  </div>

<script src="mostrar.js"></script>

      
</body>
</html>

<?php ob_end_flush(); ?>