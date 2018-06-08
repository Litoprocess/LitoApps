<?php session_start();

if(isset($_SESSION["Permisos"]['UserReqPersonal']))
{
	switch ($_SESSION["Permisos"]['UserReqPersonal']) 
	{		
		case '1':
		require 'views/solicitudes.view.php';
		break;
		case '2':
		require 'views/solicitudes.view.php';
		break;
		case '3':
		require 'views/solicitudes.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}		
} else{
	header('Location: ../index.php');
}

 ?>