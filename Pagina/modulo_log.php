<?php

include('conexion.php');








$checkb = 0;

	$res= mysqli_query($conex, "select * from users where nickname='$_POST[nick]' and contrasena='$_POST[pass]' "); 

	$checkb= mysqli_query($conex, "select count(*) total from users where nickname='$_POST[nick]' and contrasena='$_POST[pass]' "); 

	$filas=mysqli_fetch_assoc($checkb);



	if ($filas['total'] > 0) {
		$row=mysqli_fetch_array($res);
		session_start();
		date_default_timezone_set("America/Argentina/Buenos_Aires");
		$_SESSION['id_usu']=$row['id_usu'];
		$_SESSION['nomusu']=$row['nickname'];
		$_SESSION['tiempo']=date("h:i");
		if ($row['nivel_usu']==3) {
					echo "<script>window.location.replace('muni.php');</script> ";
		}else{	echo "<script>window.location.replace('gestor.php');</script> ";}

	
	}else{
						echo "<script>\n";
						echo "Swal.fire({\n";
						echo "type: 'error',\n";
						echo "  title: 'Error',\n";
						echo "  text: 'Tu usuario o contraseña son incorrectos',\n";
						echo "});\n";
						echo "</script>\n";
	}




    
?>