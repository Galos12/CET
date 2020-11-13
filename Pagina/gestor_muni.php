




<div class="container-fluid">
  <div class="row">
    
 

        <div class="col-12 table-responsive ">
        <table class="code table" id="code" >
          <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre / Apellido</th>
          <th scope="col">Localidad</th>
          <th class="d-none d-lg-table-cell" scope="col">Patente</th>
          <th class='d-none d-lg-table-cell' scope="col">Estadía</th>
           <th scope="col">Ver</th>
 </tr>


        <?php 
      include('conexion.php');
        $tabla=mysqli_query($conex, "SELECT * FROM usuarios where DNI like '%$_POST[DNI]%' and nombre like '%$_POST[nom]%' and LocalidadPrincipal like '%$_POST[loca]%'");


        while ($UsuData=mysqli_fetch_array($tabla)) {
          if($UsuData['LocalidadPrincipal'] == 'Null' || $UsuData['TiempoEstadia'] == 'Desde: NullHasta: Null'){$Estadia='Residente';}else{$Estadia='Visitante';}
          if($UsuData['Patente'] == 'NoAuto'){$UsuData['Patente']='No tiene';}
        echo"<tr>
        <td>".$UsuData['DNI']."</td>
        <td>".$UsuData['nombre']."</td>
        <td>".$UsuData['LocalidadPrincipal']."</td>
        <td class='d-none d-lg-table-cell'>".$UsuData['Patente']."</td>
        <td class='d-none d-lg-table-cell'>".$Estadia."</td>
         <td><button class='btn btn-success' onclick='CallVerVisitas(".$UsuData['id_usu'].")')>→</button></td>
        </tr>";

        }
         ?>
        </table>
        </div>

      


  </div>
 </div>
