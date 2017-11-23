<?php session_start();

if(isset($_SESSION['UserMensaje1'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: login.php');
}

?>