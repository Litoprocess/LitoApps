<?php session_start();
include 'conexion.php';

$id = $_POST['id'];
$participantes_real = $_POST['participantes_real'];
$duracion_real = $_POST['duracion_real'];
$horas_hreal = $_POST['horas_hreal'];
$mes_real = $_POST['mes_real'];
$estatus = $_POST['estatus'];

$sql = "UPDATE Cursos SET Participantes_real = '$participantes_real', Duracion_real = '$duracion_real', 
horasHombre_real = '$horas_hreal', Mes_Real = '$mes_real', Estatus = '$estatus' WHERE Id = '$id'";

$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

$response->validation="true";
echo json_encode($response);

?>