<?php session_start();

if(isset($_SESSION["Permisos"]['UserRevBDD']))
{

	switch ($_SESSION["Permisos"]['UserRevBDD']) 
	{
		case '1':
		require 'views/lcpersonal.view.php';
		break;

		case '3':
		require 'views/lcpersonal.view.php';
		break;

		default:
		header('Location: index.php');
		break;
	}
} else {
	header('Location: index.php');
}
?>