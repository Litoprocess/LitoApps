<?php
session_start();

include 'conn.php';

//Asignacion de variables
$NombreUsuario = $_POST["NombreUsuario"];
$IdTicket = $_POST['IdTicket'];
$data = $_POST['data'];

$sql = "UPDATE Tickets SET Prioridad = '$data' WHERE Id_Ticket = $IdTicket";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$texto = utf8_decode("LA PRIORIDAD CAMBIÓ A: ".$data);

$seg = "INSERT INTO SeguimientoTickets (Id_Ticket, NombreUsuario, FechaEvento, Notas)
VALUES ('$IdTicket', '$NombreUsuario', GetDate(), '$texto' )";
$seguimiento = sqlsrv_query( $conn, $seg );

//Verifica instruccion SQL
if( $seguimiento === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

$response->validacion="true";

echo json_encode($response);

?>