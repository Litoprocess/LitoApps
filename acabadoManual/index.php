<?php session_start();

if(isset($_SESSION["Permisos"]['UserMaquilas']))
{
	switch ($_SESSION["Permisos"]['UserMaquilas']) 
	{
		case '1':
		require 'views/regActividades.view.php';
		break;
		case '2':
		require 'views/regActividades.view.php';
		break;		
		case '3':
		require 'views/regActividades.view.php';
		break;
		
		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');
}

 ?>