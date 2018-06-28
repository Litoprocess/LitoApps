<?php
session_start();

include 'conn.php';

//Asignacion de variables

$IdTicket = $_POST['IdTicket'];
$NombreUsuario = $_POST["NombreUsuario"];
$data = $_POST['data'];
$CorreoSolicita = $_POST['mailSolicita'];
$NombreSolicita = $_POST['nameSolicita'];

if($data == 'CERRADO RESUELTO' || $data == 'CERRADO SIN RESOLVER' || $data == 'CANCELADO'){

	$sql = "UPDATE Tickets SET ESTATUS = '$data', FechaFinalizado = GetDate()  WHERE IdTicket = $IdTicket";
	$stmt = sqlsrv_query( $conn, $sql );

}else{

	$sql = "UPDATE Tickets SET ESTATUS = '$data', FechaFinalizado = null  WHERE IdTicket = $IdTicket";

	$stmt = sqlsrv_query( $conn, $sql );
}

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$texto = "EL ESTATUS DEL TICKET CAMBIÓ: ".$data;

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