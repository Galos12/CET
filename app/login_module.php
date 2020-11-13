<?php
if ($_POST['HostPass']!='NeverGonnaGiveYouUp') {
     echo "<!DOCTYPE html><html lang='en'><head><title>Redirecting...</title></head><body>
    <style>*{color: white;}</style></body> <script>window.location.replace('https://www.youtube.com/watch?v=dQw4w9WgXcQ');</script>  </html>";
}else{


$datos=$_POST;
$DNI=$datos['DNI'];
$contra=$datos['contra'];



include('conexion.php');

$checkb=mysqli_query($conex, "select count(*) total from USUARIOS where DNI='$DNI' and contrasena='$contra' ");

$filas=mysqli_fetch_assoc($checkb);

if ($filas['total'] > 0) {
$result = mysqli_query($conex, "select * from USUARIOS where DNI='$DNI' and contrasena='$contra'");
  $row=mysqli_fetch_array($result);
 echo '1.'.$row['nombre'].'.'.$row['id_usu'];
 }else{echo 0;}

}

?>

