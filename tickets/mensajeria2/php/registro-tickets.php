<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];

$sql = "SELECT * FROM Tickets WHERE NombreUsuario = '$NombreUsuario'";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$Hora1 = $row['HoraEntrega1']->format("H:i");
	$Hora2 = "";
	$FechaFin = "SIN FINALIZAR";

	if($row['HoraEntrega2']->format("H:i")!='00:00'){
		$Hora2 = " - ".$row['HoraEntrega2']->format("H:i");
	}

	if($row['FechaFinalizado']!=null){
		$FechaFin = $row['FechaFinalizado']->format("d-n-Y");
	}

	$data[] = array($row['IdTicket'],
		$row['Titulo'],
		$row['NombreEmpresa'],
		$row['FechaEntrega']->format("d-m-Y"),
		$Hora1.$Hora2,
		$row['Prioridad'],
		$row['Estatus'],
		$FechaFin); 

}

$response->data=$data;

echo json_encode($response);

?>