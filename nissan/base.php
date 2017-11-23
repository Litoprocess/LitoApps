<?php session_start();

if(isset($_SESSION["Permisos"]['UserNissan']))
{
	switch ($_SESSION["Permisos"]['UserNissan']) 
	{				
		case '1':
		require 'views/base.view.php';
		break;
		case '2':
		require 'views/base.view.php';
		break;
		case '3':
		require 'views/base.view.php';
		break;
		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');	
}

?>