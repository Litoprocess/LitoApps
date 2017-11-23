<?php
session_start();

include 'conn.php';

//Asignacion de variables

$NombreUsuario = utf8_decode($_SESSION["NombreUsuario"]);
$Titulo =  utf8_decode(mb_strtoupper($_POST['txtTitulo']));
$Tarea =  utf8_decode(mb_strtoupper($_POST['txtProblema']));
$Departamento = $_SESSION["Departamento"];
$Id_Categoria = $_POST['selCategoria'];
$Correo = $_SESSION["CorreoUsuario"];

$F = new DateTime();
$Fecha = $F ->format("d-m-Y H:i");

$response = new stdClass();

$sql = "INSERT INTO Tickets (Solicitante, Tarea, Titulo, FechaRegistro, Asignado, Estado, Prioridad, Departamento, Categoria, CorreoSolicitante)
VALUES ('$NombreUsuario','$Tarea', '$Titulo', GetDate(), 'SIN ASIGNAR', 'PENDIENTE DE ASIGNAR','NORMAL', '$Departamento', '$Id_Categoria', '$Correo' )";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$obtener_id = "SELECT @@identity as ID";
$ejecutar = sqlsrv_query($conn,$obtener_id);

while( $row = sqlsrv_fetch_array($ejecutar, SQLSRV_FETCH_ASSOC) ) {
	$IdTicket = $row ['ID'];
}

$response->idAgregado=$IdTicket;
$response->validacion="true";

echo json_encode($response);

?>