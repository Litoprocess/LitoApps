<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conexion.php';




$clave_cliente = $_POST['clave_cliente'];
$cliente = $_POST['cliente'];
$fRegistro = $_POST['fRegistro'];
$fAplicacion =$_POST['fAplicacion'];
$propuesta = $_POST['propuesta'];
$idusuario= $_SESSION["Permisos"]['IdUsuario'];
$propuesta_titulo=$_POST['propuesta_titulo'];

$response = new stdClass();
 if (!empty($cliente))
 {

	$sql = "INSERT INTO Nueva_Propuesta (clave_Cliente, fecha_Registro, fecha_Aplicacion, propuesta, usuario,titulo,nom_cliente) 
	VALUES ('$clave_cliente', '$fRegistro', '$fAplicacion', '$propuesta','$idusuario','$propuesta_titulo','$cliente')";
	$stmt = sqlsrv_query($conn,$sql);


	$response->validation="true";
	echo json_encode($response);


if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}
	}

else
{
	$response->validation="false";
	echo json_encode($response);
}

	
?>