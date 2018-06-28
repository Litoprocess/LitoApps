<?php session_start();
if(isset($_SESSION["Permisos"]['UserCapacitacion']))
{

	switch ($_SESSION["Permisos"]['UserCapacitacion']) 
	{
		case '1':
		header('Location: resultado.php');
		break;

		case '3':
		header('Location: registro.php');
		break;	

		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');	
}


?>