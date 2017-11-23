<?php session_start();

if(isset($_SESSION["Permisos"]['UserLibera']))
{
	switch ($_SESSION["Permisos"]['UserLibera']) 
	{				
		case '1':
		require 'views/liberacion.view.php';
		break;
		case '2':
		require 'views/liberacion.view.php';
		break;
		case '3':
		require 'views/liberacion.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');
}
?>