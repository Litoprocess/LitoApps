<?php session_start();

if(isset($_SESSION['UserMensaje2'])){

	require 'views/user.view.php';
	
} else {

	header ('Location: ../login.php');
	
}

?>