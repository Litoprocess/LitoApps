<?php session_start();

include 'connRevision.php';

//Asignacion de variables
$nombreAgente = $_SESSION['Permisos']['NombreUsuario'];
$telefono = $_POST['code'];
$estado = $_POST['estado'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO Revision_1194 (agente_calidad,telefono,fecha,estado,comentario) VALUES ('$nombreAgente','$telefono',getdate(),'$estado','$comentario')";
$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();
//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

$response->validacion="true";

echo json_encode($response);

?>