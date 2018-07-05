<?php session_start();

if(isset($_SESSION["Permisos"]['UserAccountability']))
{
	switch ($_SESSION["Permisos"]['UserAccountability']) 
	{				
		case '1':
		header('Location: cuestionario.php');
		break;
		case '2':
		header('Location: cuestionario.php');
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