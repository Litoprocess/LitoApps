<?php session_start();

if(isset($_SESSION["Permisos"]['UserAccountability']))
{
	switch ($_SESSION["Permisos"]['UserAccountability']) 
	{		
		case '1':
		require 'views/listado.view.php';
		break;
		case '2':
		require 'views/listado.view.php';
		break;
		//case '3':
		//require 'views/listado.view.php';
		//break;
		default:
		header('Location: ../index.php');
		break;
	}		
} else{
	header('Location: ../index.php');
}

 ?>