<?php session_start();

if(isset($_SESSION['UserManto'])){

	switch ($_SESSION['UserManto']) {
		case '1':
		header('Location: mantenimiento/solicitudes.php');
		break;

		case '2':
		header('Location: mantenimiento/agentes.php');
		break;

		case '2':
		header('Location: mantenimiento/usuarios.php');
		break;
		
		default:
		header('Location: mantenimiento/usuarios.php');
		break;
	}
	
} else {
	header ('Location: login.php');
}

?>