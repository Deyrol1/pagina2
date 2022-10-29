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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</head>
   
<body>


   <!--clase modal completar reserva-->

                  <!--clase modal completar reserva-->


               
                  <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="completar_reserva">
                 
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Completar reserva</h5>
                      </div>
                      <div class="modal-body">
                       <form method="POST">
                     

                       <div class="row justify-content-center">

                     
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Nombre</label>
                                        <?php

                                            include ("conexion.php");


                                              $id= $_GET["Id_usuario"];

                                              $buscar="SELECT * FROM prereserva WHERE cedula='$id'";


                                              $aush=mysqli_query($conexion,$buscar);
                                                        
                                                        



                                              while($a=mysqli_fetch_assoc($aush)){
                                                  
                                                
                                                      
                                             

                                            ?>
                                        <input type="text" class="form-control" id="inputPrecio1" placeholder=" <?php echo $a["Nombre"];?>"  value="<?php echo $a["Nombre"];?>"  name="nombre" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCedula4">Cedula</label>
                                        <input type="cedula" class="form-control" id="inputCedula4" placeholder="<?php echo $a["Cedula"];?>"  name="cedula" disabled>
                                    </div>
                                    <?php 
                                  
                                  $ced= $a["Cedula"];
                                  $nomb= $a["Nombre"];
                                  
                                  } ?>

                                      


                                   
                                        <div class="form-group col-md-4">
                                        <label for="inputCorreo">Correo</label>
                                        <input type="text" class="form-control" id="inputCorreo" placeholder="Gmail">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputTelefonp">Telefono</label>
                                        <input type="number" class="form-control" id="inputTelefono" placeholder="Telefono">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputDireccion">Direccion</label>
                                        <input type="text" class="form-control" id="inputDireccion" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputDireccion">Ciudad</label>
                                        <input type="text" class="form-control" id="inputCiudad" placeholder="Ciudad">
                                        
                                        </div>

                                        <div>

                                        <?php 


                                          $fecha_actual = date("Y-m-d"); 



                                          ?>
                                          <label>Inicio:</label>
                                                <input type="date" id="inicio" name="inicio"
                                                
                                                min="<?php echo $fecha_actual?>" required>

                                                <label>Fin:</label>
                                                <input type="date" id="final" name="final"
                                                
                                                min="<?php echo $fecha_actual?>" required>
                                                <br>  
                                              </div>
                                                

                                       
                                        <div class="form-check col-md-3" id="eleccion">
                                         
                                        <select class="form-select" aria-label="Default select example" name="tipo" id="tipo">
                                            <option value="eh" selected disabled>Seleccione tipo habitacion</option>
                                            <option value="personal">personal</option>
                                            <option value="doble">doble</option>
                                            <option value="familiar">familiar</option>
                                            <option value="suite">suite</option>
                                          </select>
                                      </div>
                                
                                  
                                    


                                      <?php  
                                          if(isset($_REQUEST['completar_reserva'])){
                                           
                                            if($_REQUEST['tipo'] == "personal"){
                                              $tipo="personal";

                                            }
                                            if($_REQUEST['tipo'] == "doble"){
                                              $tipo="doble";

                                            }
                                            if($_REQUEST['tipo'] == "familiar"){
                                              $tipo="familiar";

                                            }
                                            if($_REQUEST['tipo'] == "suite"){
                                              $tipo="suite";

                                            }
                                       
                                      }
                                        
                                      ?>
                                         



                                      
                                      


                                    
                        </div>
                       
                        <div id="tabla">
                        <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Numero habitacion</th>
                                <th>Seleccionar</th>
                                
                            </tr>
                        </thead>
                        <tbody id="fila">
                        
                        </tbody>
                    </table>                  

                                            </div>

                                        <div id="tab"></div>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="completar_reserva" class="btn btn-primary">Completar reserva</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='gestion_reserva.php'">Cerrar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                                        
           
             

                <script src="mostrarpre.js"></script>
                <script src="lis.js"></script>
               

                <script>

</script>



       
</body>
</html>

<?php 
     if(isset($_POST['completar_reserva'])){
      require("conexion.php");  
  $fecha1=$_POST['inicio'];
  $fecha2=$_POST['final'];
  $tipo=$_POST['tipo'];
  $hab=$_POST['radio'];
  $cedula=$ced;
  $nombre=$nomb;


 

  $valor = "SELECT * from categoria_habitacion WHERE tipo_habitacion='$tipo'";

                       
                        $am=mysqli_query($conexion,$valor);
                        $vals=mysqli_fetch_assoc($am);

                        $valorf= $vals["Valor"];

                



  $dis= "SELECT TIMESTAMPDIFF(DAY,'$fecha1','$fecha2') as dias";
   
  $amm=mysqli_query($conexion,$dis);
  $val=mysqli_fetch_assoc($amm);

  $dias= $val['dias'];



  

  $total=$dias*$valorf;
  

echo $total;

  mysqli_query($conexion,"INSERT INTO reserva_completa (fecha_inicio,fecha_fin,Cedula,Nombre,tipo_habitacion,dias,valor_a_pagar,num_habitacion) VALUES ('$fecha1','$fecha2','$cedula','$nombre','$tipo','$dias','$total','$hab')");
 
$actualizar="UPDATE habitacion SET estado = 'Ocupado' WHERE numero ='$hab'";

$actualiza= $conexion->query($actualizar);
$eliminar="DELETE FROM prereserva WHERE Cedula='$cedula'";

$elimina= $conexion->query($eliminar);


}



ob_end_flush(); ?>