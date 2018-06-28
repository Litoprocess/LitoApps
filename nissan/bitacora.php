<?php session_start();

if(isset($_SESSION["Permisos"]['UserNissan']))
{
	switch ($_SESSION["Permisos"]['UserNissan']) 
	{				
		case '1':
		require 'views/bitacora.view.php';
		break;

		case '3':
		require 'views/bitacora.view.php';
		break;
		default:
		header('Location: index.php');
		break;
	}	
} else {
	header('Location: index.php');	
}

?>