<?php session_start();

if(isset($_SESSION["Permisos"]['UserMuestras']))
{
	switch ($_SESSION["Permisos"]['UserMuestras']) 
	{				
		case '1':
		require 'views/NoAplica.view.php';
		break;
		case '2':
		require 'views/NoAplica.view.php';
		break;
		case '3':
		require 'views/NoAplica.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');	
}

?>