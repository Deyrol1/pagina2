<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="fontawesome/css/all.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</head>
<body>
     
           
          
    <div id="wrapper">
           
<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
              
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                    <li >
                        <a href="gestion_usuario.php"><i class="fa fa-user"></i>Gestion usuario  </a>
                    </li>
                    <li >
                        <a href="gestion_habitacion.php"><i class="fa fa-bed"></i>Gestion habitacion  </a>
                    </li>
                    <li  class="active-link">
                        <a href="gestion_reserva.php"><i class="fa fa-edit "></i>Gestion reserva</a>
                    </li>


               
                </ul>
                            </div>




                      


        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>GESTION RESERVA </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <!--por aca-->
                
                
                  <!--clase modal modificar tipo habitacion-->
                  <div class=" modal bd-example-modal-lg in" tabindex="-1" role="dialog" id="ventana_modificar_habitacion ">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modificar habitacion</h5>
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST">      
                                <div class="container" id="crear_habitacion">
                                  <div class="row">
                                     
                                
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="tipo_habitacion">
    
                                                <option selected>Tipo de habitacion</option>
                                                <option value="Personal">Personal</option>
                                                <option value="Doble">Doble</option>
                                                <option value="Familiar">Familiar</option>
                                                <option value="Suite">Suite</option>

                                              </select>
                                              <br>
                                              
                                      </div> 
                                      <div class="col">
                                      
                                          
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <input type="number" class="form-control" placeholder="Precio de habitacion" name="precio_habitacion">
                                          <br>
                                        </div>
                                    </div>
                                      
                                 
                                  </div>   
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="modificar_habitacion">Modificar habitacion</button>
                                </form>
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          
                          <?php
                        if(isset($_POST['modificar_habitacion'])){
                            require("conexion.php");  
                        $fecha1=$_POST['tipo_habitacion'];
                        $tipo=$_POST['precio_habitacion'];


                        
                        
                        mysqli_query($conexion,"UPDATE categoria_habitacion SET Valor='$tipo' WHERE categoria_habitacion.tipo_habitacion='$fecha1'");

                        }

                        ?>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                <div class="col-lg-10 col-md-6">
                        <!-- /. Lista de habitaciones  -->
                        <?php

                        include ("conexion.php");


                        $usuarios = "SELECT * FROM prereserva " ;
                        
                        ?>
                        
                        <!--reservas pendientes-->
                    <h5>Reservas pendientes</h5>
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Numero</th>
                                <th>Fecha llegada</th>
                                <th>Fecha salida</th>
                                <th>Cedula cliente</th>
                                <th>Nombre cliente</th>
                                
                                <th>Completar reserva</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php 
        
                                $aush=mysqli_query($conexion,$usuarios);
                                
                                while($row=mysqli_fetch_assoc($aush))
                               
                                {
                                ?>
                                <td><?php echo $row ["numero"]; ?></td>
                                <td><?php echo $row ["fecha_inicio"]; ?></td>
                                <td><?php echo $row ["fecha_fin"]; ?></td>
                                <td><?php echo $row ["Cedula"]; ?></td>
                                <td><?php echo $row ["Nombre"]; ?></td>
                                  
                                  
                                
                                
                                <td><a href="completar_reserva.php ?Id_usuario=<?php echo $row ["Cedula"];?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="eliminarprereserva.php ?Id_usuario=<?php echo $row ["Cedula"];?>"><i class="fa fa-eraser"></i></a></td>
                            </tr>
                            <?php 
                         
                          
                          } 
                          
                         

                       
                                
               




                          
                          
                          ?>
                        </tbody>
                    </table>



                      <!--clase modal completar reserva-->
       <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ventana_crear_habitacion">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Completar reserva</h5>
                      </div>
                      <div class="modal-body">
                       <form method="POST">
                     

                       <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Nombre</label>
                                        <input type="text" class="form-control" id="inputnombrel4" placeholder="<?php echo $nombres ["Nombre"]; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCedula4">Cedula</label>
                                        <input type="cedula" class="form-control" id="inputCedula4" placeholder="Cedula" disabled>
                                    </div>


                                  
                                   
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
                                        <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" name="tipo" value="simple" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Simple
                                        </label>
                                      </div>
                                      <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" name="tipo" value="doble" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Doble
                                        </label>
                                      </div>
                                      <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" name="tipo" value="familiar" id="flexRadioDefault3" checked>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                          Familiar
                                        </label>
                                      </div>
                                      <div class="form-check col-md-3">
                                        <input class="form-check-input" type="radio" name="tipo" value="suite" id="flexRadioDefault4" checked>
                                        <label class="form-check-label" for="flexRadioDefault4">
                                          Suite
                                        </label>
                                      </div>


                                      <?php 
                                          if(isset($_REQUEST['completar_reserva'])){
                                           
                                            if($_REQUEST['tipo'] == "simple"){
                                              $tipo="simple";

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
                                        
                                      
                                          include ("conexion.php");


                                          $precios = "SELECT * FROM categoria_habitacion";

                                          $aush=mysqli_query($conexion,$precios);
                                
                                



                                          while($row=mysqli_fetch_assoc($aush))
                                              
                                             
                                                  
                                          {
                                          

                                            ?>



                                      <div class="form-check col-md-3">
                                      <input type="number" class="form-control" id="inputPrecio1" placeholder=" <?php echo "$". $row ["Valor"];?>" disabled>
                                      </div>
                                      

                                          <?php } ?>

                                    
                        </div>



                      
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="completar_reserva" class="btn btn-primary">Completar reserva</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>



     <!--reservas Completadas-->
     <h5>Reservas Completadas</h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Numero</th>
                                <th>Fecha llegada</th>
                                <th>Fecha salida</th>
                                <th>Cedula cliente</th>

                                
                                <th>Tipo_habitacion</th>
                                <th>Numero habitacion</th>
                                <th>Total a pagar</th>
                                <th>Pagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php 
        


        include ("conexion.php");


        $reserva = "SELECT * FROM reserva_completa";

        $aush=mysqli_query($conexion,$reserva);



                                
                                while($row=mysqli_fetch_assoc($aush))
                                {
                                ?>
                                <td><?php echo $row ["numero"]; ?></td>
                                <td><?php echo $row ["fecha_inicio"]; ?></td>
                                <td><?php echo $row ["fecha_fin"]; ?></td>
                                <td><?php echo $row ["Cedula"]; ?></td>
                                

                                <td><?php echo $row ["tipo_habitacion"]; ?></td>
                                <td><?php echo $row ["num_habitacion"]; ?></td>
                                <td>$<?php echo $row ["valor_a_pagar"]; ?></td>
                                <td><button type="button"  class="btn btn-primary btn-sm " data-toggle="modal" data-target="#ventana_pagar">Pagar</button></td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                   
         

              




 <!--clase modal Pagar-->
 <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ventana_pagar">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pagar</h5>
                
              </div>
             
              <div class="modal-body">
                  
                  <form method="POST">      
                    <div class="d-flex justify-content-center">
                      <div id="pago">
                        <p class="font-weight-bold">Forma de pago</p>
                        <form>
                      
                          <div class="row">
                            <div class="col-lg-3 mb-5 mb-lg-0">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Efectivo</label>
                              </div>
                            </div>
                              <div class="col-lg-3 mb-5 mb-lg-0">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                  <label class="form-check-label" for="inlineRadio2">Tarjeta</label>
                                </div>
                              </div>
                              <div class="col-lg-3 mb-5 mb-lg-0">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                  <label class="form-check-label" for="inlineRadio3">Mixto</label>
                                </div>
                              </div>
                            </div>
                            
                        </form>
                      
                      <div id="efectivo">   
                      <form>
                      <div class="form-row align-items-center">
                      <div class="col">
                      
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Total a pagar">
                      </div>
                      </div>
                      <div class="col-auto">
                      
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Total pagado">
                      </div>
                      </div>
                      <div class="col-auto">
                      
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Devueltas">
                      </div>
                      </div>
                      <div class="col-auto">
                      
                      </div>
                      <div class="col-auto" id="boton_efectivo">
                      <button type="submit" class="btn btn-primary mb-2">Pagar</button>
                      </div>
                      </div>
                      </form>
                      
                      </div>
                      
                        
                          
                            
                         
                       
                        
                      
                      
                    <div class="container">
                      <div class="border d-flex justify-content-center">
                      
            
            <div id="tarjeta">
              <div class="padding">
                <div class="row">
                <div class="col-sm-8">
                <div class="card">
                <div class="card-header">
                <strong>Tarjeta de credito</strong>
                <br>
                <small>Ingrese los datos de tarjeta</small>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                    
                
                    
                <label for="name">Nombre</label>
                <input class="form-control" id="name" type="text" placeholder="Ingresa el nombre">
                </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                <label for="ccnumber">Numero tarjeta de credito</label>
                
                
                <div class="input-group">
                <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                <div class="input-group-append">
                <span class="input-group-text">
                <i class="mdi mdi-credit-card"></i>
                </span>
                </div>
                </div> 
                </div>
                </div>
                </div>
                
                <div class="row">
                <div class="form-group col-sm-4">
                <label for="ccmonth">Mes</label>
                <select class="form-control" id="ccmonth">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                </select>
                </div>
                <div class="form-group col-sm-4">
                <label for="ccyear">Año</label>
                <select class="form-control" id="ccyear">
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                </select>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <label for="cvv">CVV/CVC</label>
                <input class="form-control" id="cvv" type="text" placeholder="123">
                </div>
                </div>
                </div>
                
                </div>
                <div class="card-footer">
                <button class="btn btn-sm btn-success float-right" type="subir">
                <i class="mdi mdi-gamepad-circle"></i> Pagar</button>
                <button class="btn btn-sm btn-danger" type="reset">
                <i class="mdi mdi-lock-reset"></i> Resetear</button>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
            
              
            
                    </div>
                  </div>
                   
                      
                      
                      
                      </div>       
                              </div>



                      
                      </form>
                      
                      
                      
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              
              </div>
            </div>
          </div>
          
        </div>
                    
                 
                </div>
                
            </div>
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;"  target="_blank">www.binarytheme.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <scrip src="assets/js/modal.js"></scrip>
    
    <script>
          
          $('#efectivo').hide();
$('#tarjeta').hide();


     function efectivo() { 
                $('#efectivo').show();
                $('#tarjeta').hide();
                $('#boton_efectivo').show();
                
                
            }
            
            function tarjeta() { 
              $('#efectivo').hide();
              $('#tarjeta').show();
             
                
            }



            function mixto(){
              $('#efectivo').show();
              $('#boton_efectivo').hide();
              $('#tarjeta').show();
            }
            document.getElementById("inlineRadio1").onclick = function(){
              efectivo();
            }
            
            document.getElementById("inlineRadio2").onclick = function(){
              tarjeta();
            }

            document.getElementById("inlineRadio3").onclick = function(){
              mixto();
             
            }
        </script>
 






</body>

</html>
