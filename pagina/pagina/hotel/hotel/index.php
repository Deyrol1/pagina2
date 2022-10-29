<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Titulo</h1>
<div class="row">
    <div class="col col-md-6">
        <form action="" method="post" class="form">
            <label for="">Login</label>
        <input type="text" name="login" id="login" class="form-control">

            <label for="Password">PAssword</label>
        <input type="text" name="password" id="password" class="form-control">
        <label for="">Nombre</label>
        <input type="text" name="" id="nombre" name="nombre" class="form-control">
            <button class="btn btn-primary" id="guardar">Guardar</button>
        </form>
        <div id="resultado"></div>
    </div>

    
</div>
    
</body>
</html>
<script>
    $(document).ready(function(){
        $("#guardar").on("click",function(){
            alert($("#login").val());
        })
        $("#password").on("click",function(){
            var parametros = {
                "login" : $("#login").val(),
                "password" : $("#password").val()
        };
        $.ajax({
                data:  parametros,
                url:   'comprobar.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#login").val(response);
                }
        });
            



        })
        
    })

</script>