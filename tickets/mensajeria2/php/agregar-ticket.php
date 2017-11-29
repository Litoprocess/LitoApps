<?php
session_start();

include 'conn.php';

//Asignacion de variables
$NombreUsuario = utf8_decode(mb_strtoupper($_POST['NombreUsuario']));
$CorreoUsuario = utf8_decode(mb_strtoupper($_POST['CorreoUsuario']));
$Departamento = utf8_decode(mb_strtoupper($_POST['Departamento']));
$Correo2 =  utf8_decode(mb_strtoupper($_POST['CorreoCopia']));
$Categoria = $_POST['selCategoria'];
$Titulo =  utf8_decode(mb_strtoupper($_POST['txtTitulo']));
$NombreEmpresa =  utf8_decode(mb_strtoupper($_POST['txtNombreEmp']));
$Domicilio =  utf8_decode(mb_strtoupper($_POST['txtDomicilio']));
$NombreContacto =  utf8_decode(mb_strtoupper($_POST['txtNcontacto']));
$TelefonoContacto =  $_POST['txtTelefono'];
$Prioridad =  utf8_decode(mb_strtoupper($_POST['selPrioridad']));
$FechaEntrega =  utf8_decode(mb_strtoupper($_POST['txtFecha']));
$HoraEntrega1 =  utf8_decode(mb_strtoupper($_POST['txtHora1']));
$HoraEntrega2 =  utf8_decode(mb_strtoupper($_POST['txtHora2']));
$Detalles =  utf8_decode(mb_strtoupper($_POST['txtNotas']));

$response = new stdClass();

$sqlid = "SELECT MAX(IdTicket) AS ID FROM Tickets";
$stmt1 = sqlsrv_query( $conn, $sqlid );

if( $stmt1 === false) {
	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC) ) {
	$IdTicket = $row ['ID']+1;
}

$sql = "INSERT INTO Tickets (IdTicket, NombreUsuario, CorreoUsuario, DepartamentoUsuario, Categoria, Titulo, NombreEmpresa, Domicilio, NombreContacto, TelefonoContacto, Prioridad, FechaEntrega, HoraEntrega1, HoraEntrega2, Detalles, Estatus, Correo2, FechaRegistro)

VALUES ($IdTicket, '$NombreUsuario', '$CorreoUsuario', '$Departamento', '$Categoria', '$Titulo', '$NombreEmpresa', '$Domicilio', '$NombreContacto', '$TelefonoContacto', '$Prioridad', '$FechaEntrega', '$HoraEntrega1', '$HoraEntrega2', '$Detalles',
	'PENDIENTE DE ATENDER', '$Correo2', GetDate())";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response->idAgregado=$IdTicket;
$response->validacion="true";

echo json_encode($response);

?>