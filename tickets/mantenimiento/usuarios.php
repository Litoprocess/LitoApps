<?php session_start();

if(isset($_SESSION['Permisos']['UserManto'])){

	require 'views/user.view.php';
	
} else {

	header ('Location: ../../login.php');
	
}

?>