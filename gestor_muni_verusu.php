

       <div id='usuvisitas' class='w-100 usuvisitas'>
   

      <div class="row searchtime">
   
          
          
        <div class="col-12 table-responsive">
        <table class="code table "  >
         <!-- <tr>
            <td>
              <div class="form-row">
                  <div class="col-12 col-form-label col-form-label-sm">
                    <label for="">DNI</label>
                    <input type="text" class="form-control form-control-sm" id="" placeholder="..." required>
                </div>
                </div>
              </td>
            </td>

            </td>

            <td>
              <div class="form-row">
                <div class="col-12 col-form-label col-form-label-sm">
                  <label for="">Nombre/Apellido</label>
                  <input type="text" class="form-control form-control-sm" id="" placeholder="..." required>
              </div>
              </div>
            </td>
        
            <td> 
              <div class="form-row">
                  <div class="col-6">
                    <label class="col-sm-2 col-form-label col-form-label-sm" for="">Desde</label>
                    <input type="date" class="form-control form-control-sm" id=""  placeholder="Desde" required>
                  </div>
                  <div class="col-6">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Hasta</label>
                    <input type="date" class="form-control form-control-sm" id=""  placeholder="hasta" required>
                  </div>
              </div> 
            </td>-->

          </tr>

          <tr>
          <th scope="col">Lugar</th>
          <th scope="col">Escaneado por</th>
          <th scope="col">Fecha Escaneado</th>
     
 </tr>
<?php
 include('conexion.php');
$tabla=mysqli_query($conex, "SELECT * FROM visitas where id_usu ='$_POST[id_usu]' ");
while ($DatosVisita=mysqli_fetch_array($tabla)) {

  $NombreLugar=mysqli_query($conex, "SELECT nickname FROM users where id_usu ='$_POST[id_usu]' ");
while($NombreThisLugar=mysqli_fetch_array($NombreLugar)){

  $NombreEscaneador=mysqli_query($conex, "SELECT nombre FROM usuarios where id_usu ='$DatosVisita[id_escaneador]' ");
while($NombreThisEscaneador=mysqli_fetch_array($NombreEscaneador)){


echo"<tr>
<td>".$NombreThisLugar['nickname']."</td>
<td>".$NombreThisEscaneador['nombre']."</td>
<td>".$DatosVisita['fecha_escaneado']."</td>
</tr>";

      }
  }
}

   ?>
        </table>
        </div>


         </div>
     
     


      </div>

        </div>
  
  
          <div id='usudata' class='container-fluid w-100 d-none'>
 
        
          <div class="row">

            <div class="col-4">


            <?php 

include('conexion.php');
$tabla=mysqli_query($conex, "SELECT * FROM usuarios where id_usu ='$_POST[id_usu]' ");


while ($UsuData=mysqli_fetch_array($tabla)) {
  if($UsuData['LocalidadTemporal'] != 'Null'){$Estadia='Residente';}else{$Estadia='Visitante';   echo '<script>$(".visitante").css("display","none")</script>'; }
  if($UsuData['Patente'] == 'NoAuto'){$UsuData['Patente']='No tiene';
    echo '<script>$(".patente").css("display","none");$(".estadia").css("display","block");</script>';}
  echo'
  <div class="card-body">
  <h6 class="card-title">DNI</h6>
  <p class="card-text">'.$UsuData['DNI'].'</p>
</div>
<div class="card-body">
  <h6 class="card-title">Localidad Principal</h6>
  <p class="card-text">'.$UsuData['LocalidadPrincipal'].'</p>
</div>
<div class="card-body visitante">
  <h6 class="card-title">Provincia Temporal</h6>
  <p class="card-text">'.$UsuData['ProvinciaTemporal'].'</p>
</div>
<div class="card-body visitante">
  <h6 class="card-title">Tiempo de estadia</h6>
  <p class="card-text">'.$UsuData['TiempoEstadia'].'</p>
</div>



          </div>
          <div class="col-4">
<div class="card-body">
  <h6 class="card-title">Nombre</h6>
  <p class="card-text">'.$UsuData['nombre'].'</p>
</div>
<div class="card-body ">
  <h6 class="card-title">Calle y Numero Principales</h6>
  <p class="card-text">'.$UsuData['CallePrincipal'].', N°'.$UsuData['NumeroPrincipal'].'</p>
</div>
<div class="card-body visitante">
  <h6 class="card-title">Localidad Temporal</h6>
  <p class="card-text">'.$UsuData['LocalidadTemporal'].'</p>
</div>

 </div>

<div class="col-4">
 <div class="card-body">
  <h6 class="card-title">Email</h6>
  <p class="card-text">'.$UsuData['email'].'</p>
</div>
<div class="card-body patente">
<h6 class="card-title">Patente</h6>
<p class="card-text">'.$UsuData['Patente'].'</p>
</div>
<div class="card-body visitante">
  <h6 class="card-title">Calle y Numero Temporales</h6>
  <p class="card-text">'.$UsuData['CalleTemporal'].',  N°'.$UsuData['NumeroTemporal'].'</p>
</div>

  
  ';

}



    

        
         ?>

            
     


        </div>





      </div>
       

       </div>







    
 





   



