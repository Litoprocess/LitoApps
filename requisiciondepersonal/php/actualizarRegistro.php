<?php session_start();

include 'conexion.php';
	
$Id1 = $_POST['Id1'];
$estatus = $_POST['estatus'];
$altaFecha = new DateTime($_POST['altaFecha']);
$altaFecha = $altaFecha->format('Y-m-d');

$response = new stdClass();

$sql = "UPDATE Requisiciones SET Estatus = '$estatus', FechaAlta = '$altaFecha', FechaFinElaboracion = getdate() WHERE Id = '$Id1'";
$stmt = sqlsrv_query($conn,$sql);

if ($stmt) 
{
    $response->validacion = true;
}
else
{
	$response->validacion = false;
}
header('Content-Type: application/json');
echo json_encode($response);
?>
