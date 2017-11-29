<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];
$SelectEstatus = "";
$SelectPrioridad = "";

$sql = "SELECT * FROM Tickets";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$Vencimiento = "SIN FINALIZAR";

	if($row['FechaFinalizado'] != null){

		$Vencimiento = $row['FechaFinalizado']->format("Y-m-d");
	}

	$EstatusBD = utf8_encode($row['Estatus']);
	$PrioridadBD = utf8_encode($row['Prioridad']);

//Select Estatus
	require 'DB Table/select-estatus.php';

//Select Prioridad
	require 'DB Table/select-prioridad.php';

	$Hora1 = $row['HoraEntrega1']->format("H:i");
	$Hora2 = "";

	if($row['HoraEntrega2']->format("H:i")!='00:00'){
		$Hora2 = " - ".$row['HoraEntrega2']->format("H:i");
	}

	$data[] = array("Folio"=>$row['IdTicket'],
		"Solicita"=>utf8_encode($row['NombreUsuario']),
		"Empresa"=>utf8_encode($row['NombreEmpresa']),
		"Titulo"=>trim(utf8_encode($row['Titulo'])),
		"Descripcion"=>trim(utf8_encode($row['Detalles'])),
		"Departamento"=>utf8_encode($row['DepartamentoUsuario']),
		"Registro"=>$row['FechaRegistro']->format("d-m-Y"),
		"Prioridad"=>$SelectPrioridad,
		"Estatus"=>$SelectEstatus,
		"Entrega"=>$row['FechaEntrega']->format("d-m-Y"),
		"Hora"=>$Hora1.$Hora2,
		"Finalizado"=>$Vencimiento,
		"Correo"=>utf8_encode($row['CorreoUsuario'])); 

}

$response->data=$data;

echo json_encode($response);

?>