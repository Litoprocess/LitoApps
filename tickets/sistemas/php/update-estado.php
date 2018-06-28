<?php
session_start();

include 'conn.php';

//Asignacion de variables

$IdTicket = $_POST['IdTicket'];
$data = $_POST['data'];
$NombreUsuario = $_POST["NombreUsuario"];
$CorreoSolicita = $_POST['mailSolicita'];
$NombreSolicita = $_POST['nameSolicita'];

if($data == 'CERRADO RESUELTO' || $data == 'CERRADO SIN RESOLVER' || $data == 'CANCELADO'){

	$sql = "UPDATE Tickets SET ESTADO = '$data', FechaFinalizado = GetDate()  WHERE Id_Ticket = $IdTicket";
	$stmt = sqlsrv_query( $conn, $sql );

}else{

	$sql = "UPDATE Tickets SET ESTADO = '$data', FechaFinalizado = null  WHERE Id_Ticket = $IdTicket";

	$stmt = sqlsrv_query( $conn, $sql );
}

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$texto = "EL ESTATUS DEL TICKET CAMBIÓ A: : ".$data;

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