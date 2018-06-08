<?php session_start();

include 'conexion.php';
	
$Id = $_POST['Id'];
$response = new stdClass();

$estatus = $_POST['estatus'];

$sql = "UPDATE Requisiciones SET estatus = '$estatus' WHERE Id = '$Id'";
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
