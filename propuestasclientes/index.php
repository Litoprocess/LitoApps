<?php session_start();

if(isset($_SESSION["Permisos"]['UserPropuestas']))
{
	switch ($_SESSION["Permisos"]['UserPropuestas']) 
	{				
		case '1':
		//require 'views/reprocesosCalidad.view.php';
		header('Location: propuestasclientes.php');
		break;
		case '2':
		//require 'views/reprocesosCalidad.view.php';
		header('Location: propuestasclientes.php');
		break;
		case '3':
		//require 'views/reprocesosProduccion.view.php';
		header('Location: propuestasclientes.php');
		break;
		

		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');
}

?>