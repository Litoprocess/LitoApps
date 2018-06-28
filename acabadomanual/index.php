<?php session_start();

if(isset($_SESSION["Permisos"]['UserMaquilas']))
{
	switch ($_SESSION["Permisos"]['UserMaquilas']) 
	{
		case '1':
		header('Location: actividades.php');
		break;
	
		case '3':
		header('Location: empleados.php');
		break;
		
		default:
		header('Location: index.php');
		break;
	}
} else {
	header('Location: index.php');
}

 ?>