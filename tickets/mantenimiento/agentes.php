<?php session_start();

if(isset($_SESSION['Permisos']['UserManto'])){

    require 'views/agente.view.php';
	
} else {
	header ('Location: ../../login.php');
}

?>
