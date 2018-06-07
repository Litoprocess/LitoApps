<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];
$SelectAgente = "";
$SelectEstatus = "";
$SelectPrioridad = "";

$sql = "SELECT * FROM [dbo].[Tickets] WHERE Estado <> 'PENDIENTE DE ASIGNAR' AND Estado <> 'PENDIENTE DE ATENDER' AND Estado <> 'ATENDIENDOSE'  AND FechaRegistro >= '01/01/2018'";
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
	$EstatusBD = $row['Estado'];
	$PrioridadBD = $row['Prioridad'];
	

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
		"Solicita"=>$row['Solicitante'],
		"Titulo"=>trim($row['Titulo']),
		"Descripcion"=>trim($row['Tarea']),
		"Departamento"=>$row['Departamento'],
		"Registro"=>$row['FechaRegistro']->format("d-m-Y"),
		"Estatus"=>$SelectEstatus,
		"Compromiso"=>"<input type='date' class='Fcompro' value='".$Compromiso."'>",
		"Agente"=>$SelectAgente,
		"Finalizado"=>$Vencimiento,
		"Prioridad"=>$SelectPrioridad,
		"Correo"=>$row['CorreoSolicitante']); 

}

$response->data=$data;

echo json_encode($response);

?>