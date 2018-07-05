<?php session_start();

if(isset($_SESSION["Permisos"]['UserAccountability']))
{
	switch ($_SESSION["Permisos"]['UserAccountability']) 
	{		
		case '1':
		require 'views/cuestionario.view.php';
		break;
		case '2':
		require 'views/cuestionario.view.php';
		break;
		//case '3':
		//require 'views/cuestionario.view.php';
		//break;
		default:
		header('Location: ../index.php');
		break;
	}		
} else{
	header('Location: ../index.php');
}

 ?>