<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];

$sql = "SELECT * FROM Tickets WHERE Solicitante = '$NombreUsuario'";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	if($row['FechaCompromiso']== null){

		$FechaCompromiso = "SIN DATOS";

	}else{
		$FechaCompromiso = $row['FechaCompromiso']->format("d-m-Y");
	}

	if($row['FechaFinalizado']== null){

		$FechaVencimiento = "SIN FINALIZAR";

	}else{
		$FechaVencimiento = $row['FechaFinalizado']->format("d-m-Y");
	}

	$data[] = array(utf8_encode($row['Id_Ticket']),
		utf8_encode($row['Titulo']),
		utf8_encode($row['Tarea']),
		$row['FechaRegistro']->format("d-m-Y H:i"),
		utf8_encode($row['Asignado']),
		$FechaCompromiso,
		utf8_encode($row['Estado']),
		$FechaVencimiento); 

}

$response->data=$data;

echo json_encode($response);

?>