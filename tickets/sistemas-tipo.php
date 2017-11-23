<?php session_start();

if(isset($_SESSION['UserSistemas'])){

	switch ($_SESSION['UserSistemas']) {
		case '1':
		header('Location: sistemas/solicitudes.php');
		break;

		case '2':
		header('Location: sistemas/agentes.php');
		break;

		case '2':
		header('Location: sistemas/usuarios.php');
		break;
		
		default:
		header('Location: sistemas/usuarios.php');
		break;
	}
	
} else {

	//header ('Location: login.php');
}

?>