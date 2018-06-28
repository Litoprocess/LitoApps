<?php session_start();

if(isset($_SESSION['Permisos']['UserSistemas'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: ../../login.php');
}

?>