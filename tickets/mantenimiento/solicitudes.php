<?php session_start();

if(isset($_SESSION['Permisos']['UserManto'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: ../../login.php');
}

?>