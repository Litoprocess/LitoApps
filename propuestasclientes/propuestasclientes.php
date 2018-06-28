<?php session_start();



if(isset($_SESSION["Permisos"]['UserPropuestas']))
{
	switch ($_SESSION["Permisos"]['UserPropuestas']) 
	{				
		case '1':
		require 'views/propuestasclientes.view.php';
		break;
		case '2':
		require 'views/propuestasclientes.view.php';
		break;
		default:
		header('Location: index.php');
		break;
	}
} else {
	header('Location: index.php');
}

?>
