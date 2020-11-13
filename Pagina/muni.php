<?php 
session_start();

include('conexion.php');

if (isset($_SESSION['nomusu']) ) {



$nomusu='muni';
$id_usu='2';


$nomusu='muni';
$id_usu='2';

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

<body class='h-100 muni'>


    <header class='shadow-sm'>

      <div class="container-fluid ">

        <div class="row">

          <div class="col-3"><img class='logopage' src="img/logocet.png"></div>
           
          <div class="col-5 "> <p class="placename" id="contenido"> Seguimiento de infectados </p></div>

         

          <div class="col-4 "> 
           <button type="button" class=" btn-sm btn-info" onclick="conff()">Cerrar Sesion</button>
         </div>
          
        </div>

      </div>
    
    </header>
   


<div class="container border-left border-right rounded p-3  bg-white shadow showdata">
  <div class="row rowsearch">
    <div class='col-2'><img data-toggle="modal" data-target="#searchuser" src="IMG/buscar.svg" alt="">
    
    </div>
    <div class="col-8"><h4> Busqueda de usuario</h4></div>
    <div class='col-2'></div>
  </div>
  <div class="row rowbuttons">
          <div class="col-6">
            <button onclick="swview('usuvisitas')" id="btnvisitas" class=" border-right border-bottom  mun-selected">Visitas</button>  
          </div>
          <div class="col-6">
            <button onclick="swview('usudata')" id="btndatos" class="border-left border-bottom">Datos</button>
          </div>
  </div>



      


      <div class="row" id='usudatasfull'> 
       <div id='usuvisitas' class='w-100 usuvisitas'>
     <P>busque y seleccione un usuario para ver visitas</P>

        </div>
  
  
          <div id='usudata' class='container-fluid w-100 d-none'>
       <h6>busque y seleccione un usuario para ver datos</h6> 


       </div>




</div>
</div>

<!-- The Modal -->
<div class="modal" id="searchuser">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Buscar persona</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="searchperso">

      <div class="container  bg-white ">

<div class="form-row">

  <div class="col-4 mb-3">
    <label for="validationCustom01">DNI</label>
    <input type="text" class="form-control form-control-sm" id="dniSearch" placeholder="..." required>
  </div>

  <div class="col-4 mb-3">
    <label for="validationCustom02">Nombre/Apellido</label>
    <input type="text" class="form-control form-control-sm" id="nomSearch" placeholder="..." required>
  </div>


  <div class="col-4 mb-3">
    <label for="validationCustomUsername">Localidad</label>
       <select class="form-control form-control-sm" id="locaSearch">
    <option value="">Cualquiera</option>
    <option value="Santa santa">Santa Teresita</option>
    <option value="Las Toninas">Las Toninas</option>
    <option value="San Clemente">San Clemente</option>
    <option value="Mar del tuyú">Mar del tuyú</option>
    <option value="La Valle">La Valle</option>
  </select>
      </div>

  </div> 
</div>

<div id="code"></div>

          </div>

      <!-- Modal footer -->
      <div class="modal-footer"> 
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
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


function swview(view){
if(view=='usuvisitas'){
  $( "#"+view ).removeClass( "d-none" );
  $('#usudata').addClass( "d-none" );
  $( "#btnvisitas" ).addClass( "mun-selected" );
  $( "#btndatos" ).removeClass( "mun-selected" );
}
if(view=='usudata'){
  $( "#"+view ).removeClass( "d-none" );
  $('#usuvisitas').addClass( "d-none" );
  $( "#btndatos" ).addClass( "mun-selected" );
  $( "#btnvisitas" ).removeClass( "mun-selected" )
}


}



function CallVerVisitas(id){
  $("#searchuser").modal('hide');//ocultamos el modal
  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  $('.modal-backdrop').remove();//eliminamos el backdrop del modal
 $('#usudatasfull').load('gestor_muni_verusu.php',{id_usu:id });

}




var typingTimer;
$(":input").on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, 500);
});


$(":input").on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {

  datas = [$('#nomSearch').val(),$('#dniSearch').val(),$('#locaSearch').val()]


    $('#code').load('gestor_muni.php',{nom:datas[0], DNI:datas[1], loca:datas[2] });

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



