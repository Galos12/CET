<?php
//if ($_POST['HostPass']!='NeverGonnaGiveYouUp') {
//     echo "<!DOCTYPE html><html lang='en'><head><title>Redirecting...</title></head><body>
 //   <style>*{color: white;}</style></body> <script>window.location.replace('https://www.youtube.com/watch?v=dQw4w9WgXcQ');</script>  </html>";
//}else{
date_default_timezone_set("America/Argentina/Buenos_Aires");
$datos=$_POST;


$id_usu=$datos['id_usu'];
$id_lugar=$datos['id_lugar'];
$id_escaneador=$datos['id_escaneador'];
$scan_date=$datos['fecha_escaneado'];

$checkb=0;
$phpmsg=0;

$upload_date=date("Y/m/d H");
include('conexion.php');
$visitasold=0;
$visitasnew=0;



$datab = mysqli_query($conex, "select * from VISITAS");
	while ($lista = mysqli_fetch_row($datab)){	$visitasold += 1;	}


$id_usu = substr($id_usu, 1); 
$scaned_array=( explode( '.', $id_usu ) );


foreach($scaned_array as $value){mysqli_query($conex, "INSERT INTO `VISITAS` (`id_visita`, `id_usu`, `id_lugar`, `fecha_subido`, `id_escaneador`,`fecha_escaneado`) VALUES (0, '$value', '$id_lugar', '$upload_date', '$id_escaneador', '$scan_date')");}

$datab = mysqli_query($conex, "select * from VISITAS");
	while ($lista = mysqli_fetch_row($datab)){$visitasnew += 1;	}

if ($visitasnew !=  $visitasold){$phpmsg='3';}	// tira 3 si esta todo bien
else{$phpmsg=2;}

echo $phpmsg;

//}
?>