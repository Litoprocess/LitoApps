<?php session_start();

if(isset($_SESSION["Permisos"]['UserMantenimiento']))
{
	switch ($_SESSION["Permisos"]['UserMantenimiento']) 
	{
		case '1':
		require 'views/programa.view.php';
		break;
	
		case '3':
		require 'views/programa.view.php';
		break;
		
		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');
}

 ?>