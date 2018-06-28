<?php session_start();
include 'conexion.php';

$orden = trim($_POST['orden']);
$suma = $_POST['suma'];
$observaciones = $_POST['observaciones'];
$status = $_POST['status'];
$muestraOk = $_POST['muestraOk'];
$muestraRechazada = $_POST['muestraRechazada'];
$tabla = $_POST['tabla'];
$tamlote = str_replace(",","",$_POST['tamlote']);
$agente = $_SESSION['Permisos']['NombreUsuario'];

$sql = "INSERT INTO Registro(NumOrden,NivelInspeccion,TamLote,Aceptado,Rechazado,Estatus,FechaRegistro,AgenteCalidad,Observaciones) 
			VALUES('$orden','$tabla','$tamlote','$muestraOk','$muestraRechazada','$status',getdate (),'$agente','$observaciones')";			
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

$response->validation="true";
echo json_encode($response);

?>