<?php session_start();

if(isset($_SESSION['UserSistemas'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: ../login.php');
}

?>