<?php session_start();

if(isset($_SESSION['UserManto'])){

	require 'views/user.view.php';
	
} else {

	header ('Location: ../login.php');
	
}

?>