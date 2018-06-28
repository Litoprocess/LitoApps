<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = $_POST["NombreUsuario"];
$IdTicket = $_POST['Ticket'];
$Notas = mb_strtoupper($_POST['Notas']);
$Correo = $_POST['txtCorreo2'];

$sql = "INSERT INTO SeguimientoTickets (Id_Ticket, NombreUsuario, FechaEvento, Notas, Mail)
VALUES ('$IdTicket','$NombreUsuario', GetDate(), '$Notas', '$Correo' )";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

$response->validacion="true";

echo json_encode($response);

?>