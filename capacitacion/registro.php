<?php session_start();
if(isset($_SESSION["Permisos"]['UserCapacitacion']))
{

	switch ($_SESSION["Permisos"]['UserCapacitacion']) 
	{
		case '1':
		require 'views/registro.view.php';
		break;

		case '3':
		require 'views/registro.view.php';
		break;

		default:
		header('Location: index.php');
		break;
	}
} else {
	header('Location: index.php');	
}


?>