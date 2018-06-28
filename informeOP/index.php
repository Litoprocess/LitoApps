<?php session_start();

if(isset($_SESSION["Permisos"]['UserPreviewOP']))
{
	switch ($_SESSION["Permisos"]['UserPreviewOP']) 
	{		
		case '3':
		header('Location: informes.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}		
} else{
	header('Location: ../index.php');
}

 ?>