<?php session_start();

if(isset($_SESSION['UserManto'])){

    require 'views/agente.view.php';
	
} else {
	header ('Location: ../login.php');
}

?>
