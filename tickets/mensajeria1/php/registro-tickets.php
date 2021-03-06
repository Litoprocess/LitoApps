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

	$detalle = "<a class='waves-effect waves-teal btn-flat btn-detalles'><i class='material-icons'>web</i></a>";
	$print = "<a class='waves-effect waves-teal btn-flat btn-imp'><i class='material-icons'>print</i></a>";

	$data[] = array(utf8_encode($row['IdTicket']),
		utf8_encode($row['Titulo']),
		utf8_encode($row['NombreEmpresa']),
		$row['FechaEntrega']->format("d-m-Y"),
		$Hora1.$Hora2,
		utf8_encode($row['Prioridad']),
		utf8_encode($row['Estatus']),
		$FechaFin,
		$detalle,
		$print


		); 

}

$response->data=$data;

echo json_encode($response);

?>