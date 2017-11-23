<?php session_start();

if(isset($_SESSION['UserMensaje1'])){

	switch ($_SESSION['UserMensaje1']) {
		case '1':
		header('Location: mensajeria1/solicitudes.php');
		break;

		case '2':
		header('Location: mensajeria1/agentes.php');
		break;

		case '2':
		header('Location: mensajeria1/usuarios.php');
		break;
		
		default:
		header('Location: mensajeria1/usuarios.php');
		break;
	}
	
} else {
	header ('Location: login.php');
}

?>