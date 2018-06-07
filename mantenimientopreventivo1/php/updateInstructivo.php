<?php session_start();

include 'conexion.php';

$manual = $_POST['manual'];
$secuencia = $_POST['secuencia'];

$response = new stdClass();
$sql = "UPDATE mantenimientos SET manual = '$manual' WHERE secuencia = '$secuencia'";


$stmt = sqlsrv_query($conn,$sql);

$response->validacion = true;
echo json_encode($response);

?>