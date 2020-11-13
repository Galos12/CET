<?php
//if ($_POST['HostPass']!='NeverGonnaGiveYouUp123#') {
//     echo "<!DOCTYPE html><html lang='en'><head><title>Redirecting...</title></head><body>
//    <style>*{color: white;}</style></body> <script>window.location.replace('https://www.youtube.com/watch?v=dQw4w9WgXcQ');</script>  </html>";
//}else{

$datos=$_POST;

$DNI=$datos['DNI'];
$contra=$datos['contra'];
$name=$datos['name'];
$ape=$datos['ape'];
$email=$datos['email'];
$preg_seg=$datos['preg_seg'];
$Patente=$datos['Patente'];
$LocalidadPrincipal=$datos['LocalidadPrincipal'];
$CallePrincipal=$datos['CallePrincipal'];
$NumeroPrincipal=$datos['NumeroPrincipal'];
$TiempoEstadia=$datos['TiempoEstadia'];
$ProvinciaTemporal=$datos['ProvinciaTemporal'];
$LocalidadTemporal=$datos['LocalidadTemporal'];
$CalleTemporal=$datos['CalleTemporal'];
$NumeroTemporal=$datos['NumeroTemporal'];





$checkb=0;
$phpmsg=0;
$checkDNI=0;
$checkemail=0;
$checkDNINEW=0;
$checkemailNEW=0;

include('conexion.php');

$fullname=$name.' '. $ape;




$datab = mysqli_query($conex, "select email from USUARIOS where email='$email' ");
	while ($lista = mysqli_fetch_row($datab)){	$checkemail += 1;	}




if ($checkemail>=1){$phpmsg='2.0';}// tira 2 si ya esta el mail, el .0 es para hacer lista en app
	     
elseif ($checkemail==0)
{mysqli_query($conex, "INSERT INTO `USUARIOS` (`id_usu`, `DNI`, `nombre`, `email`, `contrasena`, `secure_question`, `Patente`, `LocalidadPrincipal`, `CallePrincipal`, `NumeroPrincipal`, `LocalidadTemporal`, `CalleTemporal`, `NumeroTemporal`, `ProvinciaTemporal`, `TiempoEstadia`)VALUES ('0', '$DNI', '$fullname', '$email', '$contra', '$preg_seg', '$Patente', '$LocalidadPrincipal', '$CallePrincipal', '$NumeroPrincipal', '$LocalidadTemporal', '$CalleTemporal', '$NumeroTemporal', '$ProvinciaTemporal', '$TiempoEstadia')");

$datab = mysqli_query($conex, "select email from USUARIOS where email='$email' ");
	while ($lista = mysqli_fetch_row($datab)){	$checkemailNEW += 1;	}

				
if ($checkemailNEW>=1){$phpmsg='3.'.$fullname;}	// tira 3 si esta todo bien, el . es para hacer lista en app
				
					
}
echo $phpmsg;
//}

?>