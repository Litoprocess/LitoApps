<?php
session_start();

include '../php/conn.php';

//Asignacion de variables

$IdTicket = $_POST["IdTicket"];
$validacion = "false";

$sql = "SELECT Asignado FROM Tickets WHERE Id_Ticket = $IdTicket";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

		$Agente = trim($row['Asignado']);
}

$response->Agente=$Agente;

echo json_encode($response);

?>