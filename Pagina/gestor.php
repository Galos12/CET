<?php 
session_start();

include('conexion.php');

if (isset($_SESSION['nomusu']) ) {



$nomusu=$_SESSION['nomusu'];
$id_usu=$_SESSION['id_usu'];

}else{
header("Location:login.php");
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Bienvenido</title>
</head>

<body>


    <header>

      <div class="container-fluid">

        <div class="row">

          <div class="col-6"><img  src="img/logocet.png"></div>
           

          <div class="col-6"> 
            <center>  
           <button class="btn btn-info" onclick="conff()"> Cerrar sesión</button>
           </center>
         </div>
          
        </div>

      </div>
    
    </header>
   
<!-- The Modal -->
<div class="modal" id="MakeQR">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">QR de <?php echo $nomusu; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="thisqr" class="modal-body">
        <div id="qrcode"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"> 
      <button class="btn btn-warning" onclick="dwnlqr()">Descargar</button>
       <button class="btn btn-warning mr-auto">Imprimir</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    
        <div class="col-2"></div>

        <div class="col-8 table">
          <div id="testimg"></div>
            <p class="placename" id="contenido"> <?php echo $nomusu; ?></p>
         <div class="qrmake" data-toggle="modal" data-target="#MakeQR" >
         <p>  <img  src="img/QRbtn.png">Código QR del local<p>
        </div>
        <table class="code table" id="code" >
          <tr>
          <th scope="col">Nombre del usuario</th>
          <th scope="col">Localidad</th>
          <th scope="col">Fecha de escaneo</th>
          <th scope="col">Hora de escaneo</th>
        </tr>


        <?php 


        $tabla=mysqli_query($conex, "SELECT * FROM visitas where id_lugar = '$id_usu'");


        while ($visitasBase=mysqli_fetch_array($tabla)) {

         
          $UsuData= mysqli_fetch_array(mysqli_query($conex, "SELECT * FROM usuarios where id_usu ='$visitasBase[id_usu]'"));
          
          $pieces = preg_split('/ (?!.* )/',$visitasBase['fecha_subido']);
        echo"<tr>
        <td>".$UsuData['nombre']."</td>
        <td>".$UsuData['LocalidadPrincipal']."</td>
        <td>".$pieces[0]."</td>
        <td>". $pieces[1]."hs</td>
        </tr>";

        }
         ?>
        </table>
        </div>

        <div class="col-2"></div>


  </div>
 </div>










</body>
</html>

<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/java.js"></script>
<script type="text/javascript" src="JS/sa/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="JS/qrcode.js"></script>
<script type="text/javascript" src="JS/download.js"></script>




<script>
  
  new QRCode(document.getElementById("qrcode"), '<?php echo $id_usu.'.'.$nomusu?>');
   function myOnLoadFunction(){}


function dwnlqr() { 

download($('#qrcode').children('img').attr('src'),"<?php echo $nomusu?>"+"QR"+".png","image/png");
      }



function conff(){
            Swal.fire({
  title: 'Cerrar sesión',
  text: "¿Desea cerrar la sesion ahora?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Cerrar sesión'}).then((result) => { if (result.value){
  <?php session_destroy();?> window.location.replace('index.html');}})} 




    </script>



