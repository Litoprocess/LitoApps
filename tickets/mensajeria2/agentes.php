<?php session_start();

if(isset($_SESSION['Permisos']['UserMensaje2'])){

    require 'views/agente.view.php';
	
} else {
	header ('Location: ../../login.php');
}

?>
