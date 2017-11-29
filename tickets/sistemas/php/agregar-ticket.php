<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = utf8_decode(mb_strtoupper($_POST["NombreUsuario"]));
$Titulo =  utf8_decode(mb_strtoupper($_POST['txtTitulo']));
$Tarea =  utf8_decode(mb_strtoupper($_POST['txtProblema']));
$Departamento = utf8_decode(mb_strtoupper($_POST["Departamento"]));
$Id_Categoria = utf8_decode(mb_strtoupper($_POST['selCategoria']));
$Correo = $_POST["CorreoUsuario"];

$F = new DateTime();
$Fecha = $F ->format("d-m-Y H:i");

$response = new stdClass();

$sqlid = "SELECT MAX(Id_Ticket) AS ID FROM Tickets";
$stmt1 = sqlsrv_query( $conn, $sqlid );

if( $stmt1 === false) {
	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC) ) {
	$IdTicket = $row ['ID']+1;
}

$sql = "INSERT INTO Tickets (Id_Ticket, Solicitante, Tarea, Titulo, FechaRegistro, Asignado, Estado, Prioridad, Departamento, Categoria, CorreoSolicitante)
VALUES ($IdTicket, '$NombreUsuario','$Tarea', '$Titulo', GetDate(), 'SIN ASIGNAR', 'PENDIENTE DE ASIGNAR','NORMAL', '$Departamento', '$Id_Categoria', '$Correo' )";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response->idAgregado = $IdTicket;

$response->validacion="true";

echo json_encode($response);

?>