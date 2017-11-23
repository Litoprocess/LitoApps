<?php session_start();
include 'conexion.php';

$departamento = $_POST['departamento'];
$otroDepto = utf8_decode($_POST['otroDepto']);
$curso = utf8_decode($_POST['curso']);
$mes = $_POST['mes'];
$participantes = $_POST['participantes'];
$duracion = $_POST['duracion'];
$horasHombre = $_POST['horasHombre'];
$costoPP = $_POST['costoPP'];
$costoTotal = ereg_replace('($-,)', '', $_POST['costoTotal']);

if( $departamento == "Otro" )
{
	$sql = "INSERT INTO Cursos (Departamento, Curso, Mes, Participantes, Duracion, HorasHombre, CostoPP, CostoTotal, Estatus) 
		VALUES('$otroDepto', '$curso', '$mes', '$participantes', '$duracion', '$horasHombre', '$costoPP', 
			'$costoTotal', 'Abierto')";	

} else {

	$sql = "INSERT INTO Cursos (Departamento, Curso, Mes, Participantes, Duracion, HorasHombre, CostoPP, CostoTotal, Estatus) 
			VALUES('$departamento', '$curso', '$mes', '$participantes', '$duracion', '$horasHombre', '$costoPP', 
				'$costoTotal', 'Abierto')";	
}
			
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

$response->validation="true";
echo json_encode($response);

?>