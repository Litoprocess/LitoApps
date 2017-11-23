<?php session_start();

if(isset($_SESSION['UserSistemas'])
	&& isset($_SESSION['UserManto'])
	&& isset($_SESSION['UserMensaje1'])
	&& isset($_SESSION['UserMensaje2'])){

	require 'views/principal.view.php';
	
} else {

	header ('Location: ../login.php');
	
}

?>