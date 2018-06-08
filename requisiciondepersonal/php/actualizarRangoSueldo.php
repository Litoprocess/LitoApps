<?php session_start();

include 'conexion.php';
	
$Id = $_POST['Id'];
$response = new stdClass();

if(isset($_POST['sueldoDe']))
{
	$sueldoDe = $_POST['sueldoDe'];

	$sql = "UPDATE Requisiciones SET RangoSueldoDe = '$sueldoDe' WHERE Id = '$Id'";
	$stmt = sqlsrv_query($conn,$sql);
}
else if(isset($_POST['sueldoHasta']))
{
	$sueldoHasta = $_POST['sueldoHasta'];

	$sql = "UPDATE Requisiciones SET RangoSueldoHasta = '$sueldoHasta' WHERE Id = '$Id'";
	$stmt = sqlsrv_query($conn,$sql);	
}

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
