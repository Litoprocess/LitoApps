<?php session_start();

if(isset($_SESSION["Permisos"]['UserRevBDD']))
{

	switch ($_SESSION["Permisos"]['UserRevBDD']) 
	{
		case '1':
		header('Location: bitacora.php');
		break;

		case '3':
		header('Location: lcpersonal.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');
}
?>
