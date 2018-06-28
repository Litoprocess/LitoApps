<?php session_start();

if(isset($_SESSION["Permisos"]['UserReportesProduccion']))
{
	switch ($_SESSION["Permisos"]['UserReportesProduccion']) 
	{		
		case '1':
		header('Location: bitacora.php');
		break;

		case '3':
		header('Location: reportes.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}		
} else{
	header('Location: ../index.php');
}

 ?>