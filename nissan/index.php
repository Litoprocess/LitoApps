<?php session_start();

if(isset($_SESSION["Permisos"]['UserNissan']))
{
	switch ($_SESSION["Permisos"]['UserNissan']) 
	{				
		case '1':
		header('Location:escaner.php');
		break;

		case '3':
		header('Location: escaner.php');
		break;

		default:
		header('Location: ../index.php');
		break;
	}	
} else {
	header('Location: ../index.php');	
}

?>