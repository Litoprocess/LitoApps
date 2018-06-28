<?php session_start();

if( isset($_SESSION["Permisos"]["NombreUsuario"]))
{
	require 'views/panel.view.php';
	
} else {

	header ('Location: login.php');
	
}

?>