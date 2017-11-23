<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION["NombreUsuario"];
$SelectAgente = "";
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
	

	if($row['FechaFinalizado'] != null){

		$Vencimiento = $row['FechaFinalizado']->format("Y-m-d");
	}else{

		$Vencimiento = "SIN FINALIZAR";
	}

	$AgenteBD = $row['Asignado'];
	$EstatusBD = utf8_encode($row['Estado']);
	$PrioridadBD = utf8_encode($row['Prioridad']);
	

	if($row['FechaCompromiso'] != null){

		$Compromiso = $row['FechaCompromiso']->format("Y-m-d");
	}else{

		$Compromiso = "";
	}

//Select Agente
	require 'DB Table/select-agente.php';

//Select Estatus
	require 'DB Table/select-estatus.php';

//Select Prioridad
	require 'DB Table/select-prioridad.php';

	$data[] = array("Folio"=>$row['Id_Ticket'],
		"Solicita"=>utf8_encode($row['Solicitante']),
		"Titulo"=>trim(utf8_encode($row['Titulo'])),
		"Descripcion"=>trim(utf8_encode($row['Tarea'])),
		"Departamento"=>utf8_encode($row['Departamento']),
		"Registro"=>$row['FechaRegistro']->format("d-m-Y"),
		"Estatus"=>$SelectEstatus,
		"Compromiso"=>"<input type='date' class='Fcompro' value='".$Compromiso."'>",
		"Agente"=>$SelectAgente,
		"Finalizado"=>$Vencimiento,
		"Prioridad"=>$SelectPrioridad,
		"Correo"=>utf8_encode($row['CorreoSolicitante'])); 

}

$response->data=$data;

echo json_encode($response);

?>