<?php session_start();

if(isset($_SESSION["Permisos"]['UserReqPersonal']))
{
	switch ($_SESSION["Permisos"]['UserReqPersonal']) 
	{				
		case '1':
		header('Location: requisicion.php');
		break;
		case '2':
		header('Location: requisicion.php');
		break;
		case '3':
		header('Location: solicitudes.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');
}

?>