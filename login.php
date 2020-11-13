<?php  

session_start();

if (isset($_SESSION['nomusu']) ) {
 echo "<script>window.location.replace('gestor.php');</script> ";
}


?>


<div id="gestor">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link type="text/javascript" href="JS/sa/dist/sweetalert2.min.css">
  <link type="text/javascript" href="JS/sa/dist/sweetalert2.min.css">
  
    <title>Iniciar sesión</title>

</head>
<body>
  


    <header>
        <a href="index.html">← Volver al Inicio</a>
        
    </header>
      
    <h1>Iniciar sesión</h1>
    <span>o <a href="registro.html">Regístre el lugar</a></span>

    
        <br><br><br>
        <center> 
        <label for="nick">Nombre de local/lugar</label>
        <input type="text" id="nick" name="nick" placeholder="Ingrese su nombre del local/lugar">
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" name="pass" placeholder="Ingrese su contraseña">
        </center>  
<br>
        <button class="btn btn-info" id="logbut" value="1" onclick="confirmarlog()">Ingresar</button>



<div id="code">
    
</div>


</body>
</html>





    
<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/java.js"></script>
<script src="JS/sa/dist/sweetalert2.all.min.js"></script>

</div>