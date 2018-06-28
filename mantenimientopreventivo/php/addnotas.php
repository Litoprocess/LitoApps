<?php session_start();

include 'conexion.php';

$id_nota = $_POST['id_nota'];
$notas = $_POST['notas'];

$response = new stdClass();
$sql = "UPDATE mantenimientos SET notas = '$notas' WHERE id = '$id_nota'";

$stmt = sqlsrv_query($conn,$sql);

$response->validacion = true;
echo json_encode($response);

?>