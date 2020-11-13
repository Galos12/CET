'use strict'

		var conf= 0;
		var pass = "";
		var email = "";
		var nick = "";
		var desde;
		var hasta;
		var horarios;
		var pref;
		var num;
		var tel;
		var localidad = "";
		var calle = "";


var	alerta = "Complete siguientes campos:";

	function confirmarreg(){ 
	//aca se confirman si todos los campos del registro estan vacios, si no, se suben a la base

		if ($('#email').val() != '')
		{conf += 1;	email = $('#email').val();
		}else{    alerta= alerta+" Email"	}


		if ($('#pass').val() != '')
		{conf += 1;	pass = $("#pass").val();
		}else{	alerta= alerta+" Contraseña"	}


		if ($('#nick').val() != '')
		{conf += 1;	nick = $("#nick").val();
		}else{alerta= alerta+" Nombre del local/lugar"	}


		if ($('#desde').val() != '' || $('#hasta').val() != '')
		{	conf += 1;	horarios = 'Desde: '+$('#desde').val()+'  Hasta: '+$('#hasta').val();
		}else{  alerta= alerta+" Horarios";	}


		if ($('#pref').val() != '' || $(' #num').val() != '')
		{	conf += 1;	tel = +$('#pref').val()+' '+$(' #num').val();
		}else{  alerta= alerta+" Teléfono";	}


		if ($('#localidad').val() != '')
		{conf += 1; localidad = $('#localidad').val()
		}else{   alerta= alerta+" Localidad"	}


		if ($('#calle').val() != '')
		{conf += 1;calle = $('#calle').val()
		}else{ alerta= alerta+" Calle"	}



		//console.log(conf + ' es el conf '+ pass +email);

		
		if (conf == 7) {conf=0
			
		var entrar = $('#logbut').val();

		$('#code').load('modulo_insert.php',{email:email , pass:pass, nick:nick, 
			horarios:horarios, tel:tel, localidad:localidad, calle:calle});

		}else{conf=0;

		Swal.fire({
		 type: 'error',
		 title: 'Completar campos:',
		 text: alerta,
				  })
		
		alerta = "Complete siguientes campos:";
		
			}

			
		}



	function confirmarlog(){   // aca se confirman si los campos de log estan vacios, si no, los manda a modulo_log.php

	if ($('#nick').val() != '')
		{conf += 1;nick = $('#nick').val()
		}else{   alerta= alerta+" nick"	}


		if ($('#pass').val() != '')
		{conf += 1;	pass = $("#pass").val()
		}else{alerta= alerta+" contraseña"	}


//console.log(conf + ' es el conf');
	

		if (conf == 2) {conf=0

			$('#code').load('modulo_log.php',{nick:nick , pass:pass});
			
		}else{conf=0;

		Swal.fire({
		 type: 'error',
		 title: 'Completar campos:',
		 text: alerta,
				  })
		alerta = "Complete siguientes campos:";
			 }

	}

	







