<?php session_start();

if(isset($_SESSION["Permisos"]['UserMaquilas']))
{
	switch ($_SESSION["Permisos"]['UserMaquilas']) 
	{
		case '1':
		header('Location: programa.php');
		break;
	
		case '3':
		header('Location: programa.php');
		break;
		
		default:
		header('Location: index.php');
		break;
	}
} else {
}
 ?>