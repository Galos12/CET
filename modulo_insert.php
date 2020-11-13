<?php
    include('conexion.php');

    $email = $_POST['email'];
    $pass = $_POST ['pass'];
    $nick = $_POST ['nick'];
    $tel = $_POST ['tel'];
    $localidad = $_POST ['localidad'];
    $calle = $_POST ['calle'];
    $horarios = $_POST ['horarios'];
    $checkb= 0;
    $checkbnuev=0;


$datab = mysqli_query($conex, "select nickname from users where nickname='$_POST[nick]'");
					while ($lista = mysqli_fetch_row($datab)){
					$checkb += 1;
					}

					if ($checkb >= 1) {
						echo "<script>\n";
						echo "Swal.fire({\n";
						echo "type: 'error',\n";
						echo "  title: 'No ingresado',\n";
						echo "  text: 'Ya existe un local con ese nombre en la base',\n";
						echo "});\n";
						echo "</script>\n";

					}elseif ($checkb == 0) {

						mysqli_query($conex,"insert into users values ('NULL','$nick', '$pass', '2')");
						mysqli_query($conex,"insert into locales values ('NULL','$email', '$tel', '$localidad', '$calle', '$horarios')");

						$databnuev = mysqli_query($conex, "select nickname from users where nickname='$_POST[nick]'");

						$lista=0;

						while ($lista = mysqli_fetch_row($databnuev)){
						$checkbnuev += 1;
						}

						if ($checkbnuev>=1) {
							echo "<script>\n";
						echo "Swal.fire({\n";
						echo "type: 'success',\n";
						echo "  title: 'Opereacion completada',\n";
						echo "  text: 'Se ha ingresado el usuario correctamente',\n";
						echo "});\n";
						echo "</script>\n";

						}elseif ($checkbnuev==0) {

							echo "<script>\n";
						echo "Swal.fire({\n";
						echo "type: 'error',\n";
						echo "  title: 'No ingresado',\n";
						echo "  text: 'Ocurrió un error al tratar de ingresar el usuario, por favor intente nuevamente.',\n";
						echo "});\n";
						echo "</script>\n";
						}

						

						
					}

			

?>