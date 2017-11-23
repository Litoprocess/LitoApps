<?php
include 'conexion.php';

//Asignacion de variables
$orden = $_POST['orden'];
$cantidad = ereg_replace("[^A-Za-z0-9]", "",$_POST['cantidad']);
$aplica = $_POST['aplica'];

$sql = "INSERT INTO ControlMuestras (NumOrden,Fecha,CantidadMuestras,Aplica) VALUES ('$orden',getdate(),'$cantidad','$aplica')";
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$response->validacion="true";
echo json_encode($response);
?>