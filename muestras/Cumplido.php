<?php session_start();

if(isset($_SESSION["Permisos"]['UserMuestras']))
{
	switch ($_SESSION["Permisos"]['UserMuestras']) 
	{				
		case '1':
		require 'views/Cumplido.view.php';
		break;
		case '2':
		require 'views/Cumplido.view.php';
		break;
		case '3':
		require 'views/Cumplido.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');	
}

?>