<?php session_start();

if(isset($_SESSION["Permisos"]['UserReprocesos']))
{
	switch ($_SESSION["Permisos"]['UserReprocesos']) 
	{				
		case '1':
		require 'views/reprocesosQuejas.view.php';
		break;
		case '2':
		require 'views/reprocesosQuejas.view.php';
		break;
		default:
		header('Location: index.php');
		break;
	}
} else {
	header('Location: index.php');
}

?>