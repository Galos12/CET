<?php
//if ($_POST['HostPass']!='NeverGonnaGiveYouUp') {
//     echo "<!DOCTYPE html><html lang='en'><head><title>Redirecting...</title></head><body>
 //   <style>*{color: white;}</style></body> <script>window.location.replace('https://www.youtube.com/watch?v=dQw4w9WgXcQ');</script>  </html>";
//}else{
date_default_timezone_set("America/Argentina/Buenos_Aires");
$datos=$_POST;


$dni_reco=$datos['dni'];
$email_reco=$datos['email'];
$secure_reco=$datos['secure'];


$checkb=0;
$phpmsg=1.0;

include('../conexion.php');

$checkb=mysqli_query($conex, "select count(*) total from USUARIOS where DNI='$dni_reco' and secure_question='$secure_reco' and email='$email_reco' ");

$filas=mysqli_fetch_assoc($checkb);

if ($filas['total'] > 0) {
    
$result = mysqli_query($conex, "select * from USUARIOS where DNI='$dni_reco' and secure_question='$secure_reco' and email='$email_reco' ");
  $row=mysqli_fetch_array($result);
 echo '4.0';
 
 }

echo $phpmsg;

//}
?>