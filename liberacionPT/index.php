<?php session_start();

if(isset($_SESSION["Permisos"]['UserLibera']))
{
	switch ($_SESSION["Permisos"]['UserLibera']) 
	{				
		case '3':
		header('Location: liberacion.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');
}
?>