<?php session_start();

if(isset($_SESSION['UserManto'])){

	require 'views/solicitudes.view.php';
	
} else {
	header ('Location: ../login.php');
}

?>