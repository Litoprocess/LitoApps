<script>

	$(document).ready(function() {

		$('.modal').modal();
		$(".dropdown-button").dropdown();
		$('.button-collapse').sideNav();

		switch(<?php echo $_SESSION["UserMensaje1"];?>){

			case 1: $('#li-usuario, #li-agente, #li-admin').show();
			$('#li-agente').hide();
			break;

			case 2: $('#li-admin').hide();
			break;

			case 3: $('#li-usuario, #li-agente, #li-admin').hide();
			break;

			default: alert("No se detecto tipo de usuario");
			break;

		}

		if(<?php echo $_SESSION["MenuSistemas"];?> != 1){

			$('#aside-sistemas').hide();

		}

		if(<?php echo $_SESSION["MenuManto"];?> != 1){

			$('#aside-manto').hide();

		}

		if(<?php echo $_SESSION["MenuMensaje1"];?> != 1){

			$('#aside-mensaje1').hide();

		}

		if(<?php echo $_SESSION["MenuMensaje2"];?> != 1){

			$('#aside-mensaje2').hide();

		}

	} );

</script>