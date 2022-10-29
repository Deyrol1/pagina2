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
                 

                                    <li class="active-link">
                                        <a href="gestion_usuario.php"><i class="fa fa-user"></i>Gestion usuario  </a>
                                    </li>
                                    <li >
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
                     <h2>GESTION USUARIO </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <!--por aca-->
                 <!--boton modal-->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana_crear_usuario">
                    Agregar usuario
                  </button>
                <!--clase modal crear usuario-->
                <div class="modal" tabindex="-1" role="dialog" id="ventana_crear_usuario">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Agregar usuario</h5>
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST" id="crear">      
                                <div class="container" id="crear_usuario">
                                  <div class="row">
                                      <div class="col">
                                      
                                          
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <input type="number" class="form-control" placeholder="Cedula" name="cedula_usuario" required>
                                              <br>
                                            </div>
                                        </div>
                                          
                                     
                                      </div>
                                      <div class="col">
                                        <div class="row">
                                            <div class="col-xs-2">
                                              <input type="text" class="form-control" placeholder="Nombre" name="nombre_usuario" required>
                                              <br>
                                            </div>
                                        </div>
                                          
                                      </div>
                                
                                      <div class="col">
                                      <select class="form-select" aria-label="Default select example" name="tipo_usuario" required>
    
                                                <option selected disabled>Tipo de usuario</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Recepcionista">Recepcionista</option>
                                                <option value="Limpiador">Limpiador</option>
                                              </select>
                                              <br>
                                              
                                      </div>    
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="crear_usuario" id="refrescar" >Crear usuario</button>
                                </form>
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          
                          <?php

                          if (isset($_POST['crear_usuario'])){

                            
                            require("conexion.php");  
                            
                            $fecha1=$_POST['cedula_usuario'];
                            $fecha2=$_POST['nombre_usuario'];
                            $tipo=$_POST['tipo_usuario'];
                           
                        $stmt=mysqli_prepare($conexion,"INSERT INTO usuario (cedula,nombre,tipo) VALUES (?,?,?)");   


                       
                        mysqli_stmt_bind_param($stmt, "iss", $fecha1, $fecha2, $tipo);
                        mysqli_stmt_execute($stmt);
                        
                        unset($_POST['cedula_usuario'] );
                        unset($_POST['nombre_usuario'] );
                        unset($_POST['tipo_usuario'] );
                        unset($_POST['crear_usuario'] );

                        
                        

                        
                        
                          }
                          else {
                           
                       echo "miau";
                          }

                   

                        ?>




                        </div>
                      </div>
                    </div>
                    
                  </div>







                  

              <div class="row">
                <div class="col-lg-6 col-md-6">
                        <!-- /. Lista de usuarios  -->
                        <?php

                        include ("conexion.php");


                        $usuarios = "SELECT * FROM usuario";
                        
                        ?>
                        

                    <h5>Usarios registrados</h5>
                    <form method="POST" action="gestion_usuario.php" id="usuario">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Rol</th>
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
                                <td><?php echo $row ["cedula"]; ?></td>
                                <td><?php echo $row ["nombre"]; ?></td>
                                <td><?php echo $row ["tipo"]; ?></td>
                                
                                <?php
                               
                               
                                $cedula= $row["cedula"];
                                $Eliminar=$cedula;
                                
                                ?>
                               
                                <td><a href="modificar_usuario.php ?id_cedula=<?php echo $cedula;?>"><i class="fa fa-pencil"></i></a></td>
                               
                                <td><a href="eliminarusuario.php ?Id_usuario=<?php echo $cedula;?>"><i class="fa fa-eraser"></i></a></td>
                               
                               
                                  
                               
                                
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                               
                   
                    </form>

                 
                </div>
                
            </div>
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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
    <script src="mostrar.js"></script>
    
 


</body>

</html>
