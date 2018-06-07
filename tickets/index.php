<?php session_start();

if(isset($_SESSION['Permisos']['UserSistemas'])
	&& isset($_SESSION['Permisos']['UserManto'])
	&& isset($_SESSION['Permisos']['UserMensaje1'])
	&& isset($_SESSION['Permisos']['UserMensaje2'])){

	require 'views/principal.view.php';
	
} else {

	header ('Location: ../login.php');
	
}

?>