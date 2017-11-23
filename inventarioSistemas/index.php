<?php session_start();

if(isset($_SESSION["Permisos"]['UserInventario']))
{
	switch ($_SESSION["Permisos"]['UserInventario']) 
	{				
		case '1':
		require 'views/inventario.view.php';
		break;
		case '2':
		require 'views/inventario.view.php';
		break;
		case '3':
		require 'views/inventario.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');	
}


 ?>