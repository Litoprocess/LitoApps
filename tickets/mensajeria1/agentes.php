<?php session_start();

if(isset($_SESSION['UserMensaje1'])){

    require 'views/agente.view.php';
	
} else {
	header ('Location: login.php');
}

?>
