<?php session_start();

if(isset($_SESSION['Permisos']['UserMensaje2'])){

	switch ($_SESSION['Permisos']['UserMensaje2']) {
		case '1':
		header('Location: mensajeria2/solicitudes.php');
		break;

		case '2':
		header('Location: mensajeria2/agentes.php');
		break;

		case '2':
		header('Location: mensajeria2/usuarios.php');
		break;
		
		default:
		header('Location: mensajeria2/usuarios.php');
		break;
	}
	
} else {
	header ('Location: ../../login.php');
}

?>