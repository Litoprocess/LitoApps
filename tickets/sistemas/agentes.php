<?php session_start();

if(isset($_SESSION['UserSistemas'])){

    require 'views/agente.view.php';
	
} else {
	header ('Location: ../login.php');
}

?>
