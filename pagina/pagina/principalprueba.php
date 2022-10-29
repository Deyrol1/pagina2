
<?php

include ("conexion.php");



$busqueda = "SELECT Valor FROM categoria_habitacion ORDER BY FIELD (tipo_habitacion,'personal','doble','familiar','suite') ASC;";


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- decir k la pag sera en español-->
   <meta charset="UFT-8"> 
            <title>Hotel miau</title>
            <!--Estilos css, luegooooo-->

            <link rel="stylesheet" type="text/css" href="estilos/logo.css">
            <link rel="stylesheet" type="text/css" href="estilos/principal.css">
            <link rel="stylesheet" type="text/css " href="estilos/config-hotel.css">
            <link rel="stylesheet" type="text/css " href="estilos/mapa.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="dist/daterangepicker.min.css">
<script type="text/javascript" src="moment.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery.daterangepicker.min.js"></script>



</head>

<header>

<body>




<div>
 
<!--logo-->
<div class="logo" id="logo">
  <img src="imagenes/logo.svg">
</div>
<!--El menu-->
<div class="d-flex flex-row-reverse">
<div id="menu">


  <nav class="navbar navbar-expand-lg " id="barra_menu" style="background-color: #b8d6eb;">
      
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item active">
  <a class="nav-link" href="#inicio">Inicio <span class="sr-only">(current)</span></a>
  </li>
 
  <li class="nav-item active" id="menu_habitaciones">
  <a class="nav-link" href="#habitac">Habitaciones</a>
  </li>
  <li class="nav-item active" id="menu_habitaciones">
    <a class="nav-link" href="#agendar">Agendar</a>
    </li>
  <li class="nav-item active" id="menu_habitaciones">
    <a class="nav-link" href="#contacto">Contacto</a>
    </li>
 
  
  </ul>
  

  </div>
  </nav>

  </div>
</div>
  

</div>
               

</header>


<body>



  
          <!--inicio-->
<div id="inicio">
  <img src="imagenes/inicio.svg">
  </div>
  
 <div id="salto">
   <img src="imagenes/salto.svg">
  </div>   

 
 <div id="habitac">
  <h1 class="display-6 text-center font-weight-bold">Habitaciones</h1>
  <img src="imagenes/habitaciones.svg">
</div>

      <!--precios-->

      <div class="container-fluid " style="width:1340px"  >
      
        <div class="row">
          <div class="col">
          <?php 
        
        $resultado=mysqli_query($conexion,$busqueda);
        
        
        $firstRow=mysqli_fetch_assoc($resultado);
        $secondRow=mysqli_fetch_assoc($resultado);
        $thirstRow=mysqli_fetch_assoc($resultado);
        $fourthRow=mysqli_fetch_assoc($resultado);
        
        ?>
            <p class="text-center font-weight-bold" > $ <?php echo $firstRow["Valor"]; ?> </p>
          </div>
          <div class="col">
            <p class="text-center font-weight-bold"> $ <?php echo $secondRow["Valor"]; ?> </p>
          </div>
          <div class="col ">
            <p class="text-center font-weight-bold">$ <?php echo $thirstRow["Valor"]; ?> </p>
          </div>
          <div class="col-3">
            <p class="text-center font-weight-bold">$ <?php echo $fourthRow["Valor"]; ?></p>
          </div>
        </div>
         
      </div>
     

      <div id="salto">
        <img src="imagenes/salto.svg">
       </div>  
      <!--reservar-->

<form method="POST">      
<div class="container" id="agendar">
  <h1 class="display-6 text-center font-weight-bold">Agendar</h1>
  <br>
  <div class="row">
      <div class="col">
    
<?php 


$fecha_actual = date("Y-m-d"); 



?>
<label>Inicio:</label>
      <input type="date" id="inicio" name="inicio"
      
       min="<?php echo $fecha_actual?>" >

       <label>Fin:</label>
      <input type="date" id="final" name="final"
      
       min="<?php echo $fecha_actual?>" >
      </div>

        
      <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" name="fecha" data-target="#ventana_reserva">
                    Reservar
                  </button>
    </div>
    

   <!--clase modal crear habitacion-->
   <div class="modal" tabindex="-1" role="dialog" id="ventana_reserva">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Confirmar reserva</h5>
                          
                        </div>
                       
                        <div class="modal-body">
                            
                            <form method="POST">      
                                <div class="container" id="crear_habitacion">
                                  <div class="row">
                                  
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre>
                                              <br>
                                            </div>
                                       

                                       
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control" placeholder="Cedula" name="cedula">
                                              <br>
                                            </div>
                                       

                                       
                                    
                                     
                                      
                                </div>
                                </div>
                                
                                
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="crear_habitacion">Crear habitacion</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                         <!--
                          <?php



                        if(isset($_POST['crear_habitacion'])){
                            require("conexion.php");  
                        $nombre=$_POST['nombre'];
                        $cedula=$_POST['cedula'];
                        $fecha1=$_POST['inicio'];
                        $fecha2=$_POST['final'];


                      
                     
                        
                      


                        mysqli_query($conexion,"INSERT INTO prereserva (fecha_inicio,fecha_fin,Nombre,Cedula) VALUES ('$fecha1','$fecha2','$nombre','$cedula')");

                        }
                        
                        ?>
                        -->
                        </div>
                      </div>
                    </div>
                    
                  </div>
</div>
</div>
</form>





  
  <img src="imagenes/salto.svg">
 

           <!--seccion del final-->
           <footer >
            <div class="container" id="contacto">
              <h1 class="display-6 text-center font-weight-bold">Contacto</h1>
                <div class="row justify-content-md-center">
                    <!-- Footer Location-->
                    <div class="col-2">
                        <h4 class="text-uppercase mb-4">Ubicacion:</h4>
                        <p class="lead mb-0">
                            Buenaventura
                            <br />
                            Calle no se que a 
                        </p>
                    </div>
                    <!--mapa-->
                    <div class="col">
                      <div class="card mb-10 " id="mapa">
                        <div class="card-body">
                          <div class="mapa">
                            <h1>encuentranos </h1>
                            <hr>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.823356713449!2d-77.00132004848933!3d3.8480650239077687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                                  1!3m3!1m2!1s0x8e37056b4d1beadb%3A0xf6c9294943cb8528!2sUniversidad%20del%20Pac%C3%ADfico!5e0!3m2!1ses!2sco!4v1654098614468!5m2!1ses!2sco"
                                   width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                  </div>
                        </div>
                      </div>
                    </div>

                    <!-- Footer About Text-->
                    <div class="col-2">
                        <h4 class="text-uppercase mb-4">Telefono</h4>
                        <p class="lead mb-0">
                            +57 34434343434232323
                            232323232
                           
                            
                        </p>
                    </div>
                
          </div>
        </footer>
       


<script>
    document.getElementById("nombre").value = "";
</script>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
    <script src="src/jquery.daterangepicker.js"></script>
    <script src="cal.js"> </script>

</body>
</html>