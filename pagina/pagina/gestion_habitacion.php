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
  <link href="assets/css/boostrap.min" rel="stylesheet"/>

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                    <li >
                        <a href="gestion_usuario.php"><i class="fa fa-user"></i>Gestion usuario  </a>
                    </li>
                    <li  class="active-link">
                        <a href="gestion_habitacion.php"><i class="fa fa-bed"></i>Gestion habitacion  </a>
                    </li>
                    <li  >
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
                     <h2>GESTION HABITACION </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <!--por aca-->
                 <!--boton modal-->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana_crear_habitacion">
                    Agregar habitacion
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana_modificar_habitacion">
                    Modificar precios habitacion
                  </button>
                  <!--clase modal modificar tipo habitacion-->
                  <div class="modal" tabindex="-1" role="dialog" id="ventana_modificar_habitacion">
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

                  
              
                <!--clase modal crear habitacion-->
                <div class="modal" tabindex="-1" role="dialog" id="ventana_crear_habitacion">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar habitacion</h5>
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST">      
                                <div class="container" id="crear_habitacion">
                                  <div class="row">
                                      <div class="col">
                                      
                                          
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <input type="number" class="form-control" placeholder="numero" name="numero">
                                              <br>
                                            </div>
                                        </div>
                                          
                                     
                                      </div>
                                   
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="tipo_habitacion">
    
                                                <option selected>Tipo de habitacion</option>
                                                <option value="personal">Personal</option>
                                                <option value="doble">Doble</option>
                                                <option value="familiar">Familiar</option>
                                                <option value="suite">Suite</option>
                                              </select>
                                              <br>
                                              
                                      </div>   
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="estado_habitacion">
    
                                                <option selected>Estado habitacion</option>
                                                <option value="Disponible">Disponible</option>
                                                <option value="Ocupado">Ocupado</option>
                                                <option value="Sucio">Sucio</option>
                                                <option value="Limpieza">Limpieza</option>
                                                <option value="Mantenimiento">Mantenimiento</option>
                                              </select>
                                              <br>
                                              
                                      </div>  
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="crear_habitacion">Crear habitacion</button>
                                </form>
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          
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

                        
                        
                      


                        mysqli_query($conexion,"INSERT INTO habitacion (numero,costo,estado,tipo) VALUES ('$numero','$valorf','$estado','$tipo')");

                        }

                        ?>
                        </div>
                      </div>
                    </div>
                    
                  </div>
             
                 <div class="row">
                <div class="col-lg-6 col-md-6">
                        <!-- /. Lista de habitaciones  -->
                        <?php

                        include ("conexion.php");


                        $usuarios = "SELECT * FROM habitacion " ;
                        
                        ?>
                        

                    <h5>Habitaciones registradas</h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Numero</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Estado</th>
                                <th>Modificar</th>
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
                                <td><?php echo $row ["tipo"]; ?></td>
                                <td><?php echo $row ["costo"]; ?></td>
                                <td><?php echo $row ["estado"]; ?></td>


                                <?php 

                                  $numero= $row["numero"];
                                ?>
                                <td><a href="modificar_habitacion.php ?id_habitacion=<?php echo $numero;?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="eliminarhabitacion.php ?id_habitacion=<?php echo $numero;?>"><i class="fa fa-eraser"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                 
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
    
    
 


</body>

</html>
