<?php session_start();

if(isset($_SESSION['Permisos']['UserMensaje1'])){

	require 'views/user.view.php';
	
} else {

	header ('Location: ../../login.php');
	
}

?>