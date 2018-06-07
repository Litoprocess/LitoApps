<?php session_start();

include 'conexion.php';

$secuencia = $_POST['secuencia'];
$fechainicio = $_POST['fechainicio'];

$response = new stdClass();
$sql = "DELETE FROM mantenimientos WHERE secuencia = '$secuencia' AND fecha_inicio > CONVERT(VARCHAR(10), GETDATE(), 102)";
$stmt = sqlsrv_query($conn,$sql);

if($stmt == false)
{
	$response->validacion = false;
}
$response->validacion = true;

echo json_encode($response);

?>