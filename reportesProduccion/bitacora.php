<?php session_start();

if(isset($_SESSION["Permisos"]['UserReportesProduccion']))
{
	switch ($_SESSION["Permisos"]['UserReportesProduccion']) 
	{		

		case '1':
		require('views/bitacora.view.php');
		break;
		
		default:
		header('Location: index.php');
		break;
	}		
} else{
	header('Location: index.php');
}

 ?>