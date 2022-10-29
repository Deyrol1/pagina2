<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>

    <title>Mobile & Desktop usage</title>

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="assets/css/mobiscroll.jquery.min.css">
    <script src="assets/js/mobiscroll.jquery.min.js"></script>

    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        height: 100%;
    }

    .md-mobile-picker-header {
        font-size: 14px;
    }
    
    input.md-mobile-picker-input {
        color: initial;
        width: 100%;
        padding: 10px;
        margin: 6px 0 12px 0;
        border: 1px solid #ccc;
        border-radius: 0;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }
    
    .md-mobile-picker-button.mbsc-button {
        font-size: 13px;
        padding: 0 15px;
        line-height: 36px;
        float: right;
        margin: 6px 0;
        width: 100%;
    }
    
    .mbsc-col-no-padding {
        padding-left: 0;
    }
    
    .md-mobile-picker-box-label.mbsc-textfield-wrapper-box,
    .md-mobile-picker-box-label .mbsc-textfield-wrapper-box,
    .md-mobile-picker-inline {
        margin: 6px 0 12px 0;
    }
    </style>

</head>
<body>


<form method="POST">
<label>
    LLegada
    <input name= "inicio" id="start" mbsc-input placeholder="Oprima" />
</label>
<label>
    Salida
    <input name= "final" id="end" mbsc-input placeholder="Oprima" />
</label>
<button type="submit" class="btn btn-primary" name="crear_usuario">Crear usuario</button>
</form>

<?php 


if(isset($_POST['crear_usuario'])){
  require("conexion.php");  
$fecha1=$_POST['inicio'];
$fecha2=$_POST['final'];

}

echo $fecha1;
echo $fecha2;
?>


<script>
  var now = new Date();


  $('#start').mobiscroll().datepicker({
    select: 'range',
    startInput: '#start',
    endInput: '#end',
    dateFormat: 'YYYY-MM-DD',
    rangeStartLabel: 'Llegada',
    rangeEndLabel: 'Salida',
    min: now,
    pages: 2
    
    
});

    mobiscroll.setOptions({
        locale: mobiscroll.localeEs,               // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                              // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light'                  // More info about themeVariant: https://docs.mobiscroll.com/5-17-0/range#opt-themeVariant
    });
    
    $(function () {
    
        var now = new Date(),
            week = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 6);
    
        // Mobiscroll Range initialization
        $('#demo-mobile-picker-input').mobiscroll().datepicker({
            
            controls: ['calendar'],
            dateFormat: 'YYYY-MM-DD',  // More info about controls: https://docs.mobiscroll.com/5-17-0/range#opt-controls
            select: 'range',                       // More info about select: https://docs.mobiscroll.com/5-17-0/range#methods-select
            showRangeLabels: true
        });
    
        var instance = $('#demo-mobile-picker-button').mobiscroll().datepicker({
            
            controls: ['calendar'],  // More info about controls: https://docs.mobiscroll.com/5-17-0/range#opt-controls
            select: 'range',                       // More info about select: https://docs.mobiscroll.com/5-17-0/range#methods-select
            showRangeLabels: true,
            showOnClick: false,                    // More info about showOnClick: https://docs.mobiscroll.com/5-17-0/range#opt-showOnClick
            showOnFocus: false,                    // More info about showOnFocus: https://docs.mobiscroll.com/5-17-0/range#opt-showOnFocus
        }).mobiscroll('getInst');
    
        instance.setVal([now, week], true);
    
        // Mobiscroll Range initialization
        $('#demo-mobile-picker-mobiscroll').mobiscroll().datepicker({
            
            controls: ['calendar'],  // More info about controls: https://docs.mobiscroll.com/5-17-0/range#opt-controls
            select: 'range',                       // More info about select: https://docs.mobiscroll.com/5-17-0/range#methods-select
            showRangeLabels: true
        });
    
        var inlineInst = $('#demo-mobile-picker-inline').mobiscroll().datepicker({
            
            controls: ['calendar'],  // More info about controls: https://docs.mobiscroll.com/5-17-0/range#opt-controls
            select: 'range',                       // More info about select: https://docs.mobiscroll.com/5-17-0/range#methods-select
            showRangeLabels: true,
            display: 'inline',                     // Specify display mode like: display: 'bottom' or omit setting to use default
        }).mobiscroll('getInst');
    
        inlineInst.setVal([now, week], true);
    
        $('#show-mobile-date-picker').click(function () {
            instance.open();
            return false;
        });
    
    });
</script>

</body>
</html>
