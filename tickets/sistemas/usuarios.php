<?php session_start();

if(isset($_SESSION['Permisos']['UserSistemas'])){

	require 'views/user.view.php';
	
} else {

	header ('Location: ../../login.php');
	
}

?>