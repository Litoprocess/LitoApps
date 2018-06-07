<?php session_start();

if(isset($_SESSION["Permisos"]['UserReportesProduccion']))
{
	switch ($_SESSION["Permisos"]['UserReportesProduccion']) 
	{		
		case '1':
		require('views/reportes.view.php');
		break;

		case '3':
		require('views/reportes.view.php');
		break;
		
		default:
		header('Location: index.php');
		break;
	}		
} else{
	header('Location: index.php');
}

 ?>