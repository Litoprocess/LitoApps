<?php
session_start();

include 'conn.php';

//Asignacion de variables

$IdTicket = $_POST['IdTicket'];

$sql = "SELECT * FROM SeguimientoTickets WHERE Id_Ticket = $IdTicket ORDER BY FechaEvento DESC";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$history = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$history[] = array("Id_Ticket"=>$row['Id_Ticket'],
		"Usuario"=>$row['NombreUsuario'],
		"Fecha"=>$row['FechaEvento']->format("d-m-Y, H:i"),
		"Notas"=>mb_strtoupper($row['Notas'])); 

}

$response->history=$history;
echo json_encode($response);

?>