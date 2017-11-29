<?php
session_start();

include 'conn.php';

//Asignacion de variables

$IdTicket = $_POST['IdTicket'];
$data = $_POST['data'];
$NombreUsuario = $_SESSION['Permisos']["NombreUsuario"];
$cAgente = $_POST['cagente'];
$Problema = $_POST['Problema'];

if($cAgente == 'SIN ASIGNAR'){

	$sql = "UPDATE Tickets SET Asignado = '$data', FechaAsignacion = GetDate(), Estado = 'PENDIENTE DE ASIGNAR' WHERE Id_Ticket = $IdTicket";
$stmt = sqlsrv_query( $conn, $sql );

}else{

	$sql = "UPDATE Tickets SET Asignado = '$data', FechaAsignacion = GetDate(), Estado = 'PENDIENTE DE ATENDER' WHERE Id_Ticket = $IdTicket";
$stmt = sqlsrv_query( $conn, $sql );

}



//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}


$seg = "INSERT INTO SeguimientoTickets (Id_Ticket, NombreUsuario, FechaEvento, Notas)
VALUES ('$IdTicket','$NombreUsuario', GetDate(), 'TICKET ASIGNADO' )";
$seguimiento = sqlsrv_query( $conn, $seg );

//Verifica instruccion SQL
if( $seguimiento === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();

$response->validacion="true";

echo json_encode($response);

?>