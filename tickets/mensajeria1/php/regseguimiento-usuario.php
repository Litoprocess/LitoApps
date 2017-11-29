<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];
$IdTicket = $_POST['Ticket'];
$Notas = utf8_decode(mb_strtoupper($_POST['Notas']));

$sql = "INSERT INTO SeguimientoTickets (Id_Ticket, NombreUsuario, FechaEvento, Notas)
VALUES ('$IdTicket','$NombreUsuario', GetDate(), '$Notas' )";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

$response->validacion="true";

echo json_encode($response);

?>