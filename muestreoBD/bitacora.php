<?php session_start();

if(isset($_SESSION["Permisos"]['UserRevBDD']))
{

	/*switch ($_SESSION["Permisos"]['UserRevBDD']) 
	{
		case '1':
		require 'views/bitacora.view.php';
		break;
	
		default:
		header('Location: index.php');
		break;
	}*/
	require 'views/bitacora.view.php';
} else {
	header('Location: index.php');
}
?>
