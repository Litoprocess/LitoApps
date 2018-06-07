<?php session_start();

if(isset($_SESSION["Permisos"]['UserInventario']))
{
	switch ($_SESSION["Permisos"]['UserInventario']) 
	{				
		case '1':
		header('Location: inventario.php');
		break;

		case '3':
		header('Location: detalle.php');
		break;		

		default:
		header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');	
}


 ?>