<?php session_start();

if(isset($_SESSION["Permisos"]['UserMuestras']))
{
	switch ($_SESSION["Permisos"]['UserMuestras']) 
	{				
		case '3':
		require 'views/ordenes.view.php';
		break;

		default:
		header('Location: index.php');
		break;
	}	
} else {
	header('Location: index.php');	
}

?>