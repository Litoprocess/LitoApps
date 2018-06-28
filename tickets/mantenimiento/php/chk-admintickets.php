<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];

$sql = "SELECT * FROM Tickets WHERE";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	

	if($row['FechaCompromiso'] != null){

		$Compromiso = $row['FechaCompromiso']->format("Y-m-d");
	}else{

		$Compromiso = "";
	}

	

	if($row['FechaFinalizado'] != null){

		$Vencimiento = $row['FechaFinalizado']->format("d-m-Y");
	}else{

		$Vencimiento = "SIN FINALIZAR";
	}


	$data[] = array("Folio"=>$row['Id_Ticket'],
		"Solicitante"=>$row['Solicitante'],
		"Departamento"=>$row['Departamento'],
		"Tarea"=>trim($row['Tarea']),
		"FechaRegistro"=>$row['FechaRegistro']->format("d-m-Y"),
		"Agente"=>$row['Asignado'],
		"FechaCompromiso"=>$Compromiso,
		"FechaVencimiento"=>$Vencimiento,
		"Prioridad"=>$row['Prioridad'],
		"Estado"=>$row['Estado'],
		"Correo"=>$row['CorreoSolicitante']); 

}

$response->data=$data;

echo json_encode($response);

?>