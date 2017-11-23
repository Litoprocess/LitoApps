<?php session_start();

include 'conexion.php';

$guia = $_POST['guia'];
$sku = $_POST['sku'];
$estatus = $_POST['estatus'];
$usuario = $_SESSION['NombreUsuario'];

$sql = "INSERT INTO Bitacora (Usuario,Guia,Sku,Fecha,Estatus) 
VALUES('$usuario','$guia','$sku',getdate(),'$estatus')";	
$stmt = sqlsrv_query($conn,$sql);
$response = new stdClass(); 

$response->validacion= "true";

echo json_encode($response);


?>