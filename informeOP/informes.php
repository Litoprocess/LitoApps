<?php session_start();

if(isset($_SESSION["Permisos"]['UserPreviewOP']))
{
	switch ($_SESSION["Permisos"]['UserPreviewOP']) 
	{		
		case '3':
		require 'views/informes.view.php';
		break;

		default:
		header('Location: index.php');
		break;
	}		
} else{
	header('Location: index.php');
}

 ?>