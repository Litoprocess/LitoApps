<?php session_start();

if(isset($_SESSION['Permisos']['UserMensaje2'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: ../../login.php');
}

?>