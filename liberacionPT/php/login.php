<?php session_start();

include 'conexion3.php';

$usuario = strtolower($_POST['usuario']);
$password =  strtolower($_POST['password']);


$sql = "SELECT * FROM cat_Usuarios WHERE Login = '$usuario' AND Password = '$password'";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false)
{
	die( print_r( sqlsrv_errors(), true) );

}

$response = new stdClass();
//$response->validacion="false";
//$array=array();
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	$_SESSION["nombre"] = $row['Nombre'];
	$_SESSION["login"] = $row['Login'];

	$response->estatus=$row['EstatusLibera'];
	$response->validacion="true";
	$response->tipo=$row['TipoUsuarioLibera'];
}


echo json_encode($response);

?>