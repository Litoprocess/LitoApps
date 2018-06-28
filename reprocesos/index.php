<?php session_start();

if(isset($_SESSION["Permisos"]['UserReprocesos']))
{
	switch ($_SESSION["Permisos"]['UserReprocesos']) 
	{				
		case '1':
		//require 'views/reprocesosCalidad.view.php';
		header('Location: consultaReprocesos.php');
		break;
		case '2':
		//require 'views/reprocesosCalidad.view.php';
		header('Location: reprocesosCalidad.php');
		break;
		case '3':
		//require 'views/reprocesosProduccion.view.php';
		header('Location: reprocesosProduccion.php');
		break;
		case '4':
		header('Location: consultaReprocesos.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');
}

?>