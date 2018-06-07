<?php session_start();
include 'conexion.php';

$departamento = $_POST['departamento'];
$otroDepto = $_POST['otroDepto'];
$curso = $_POST['curso'];
$mes = $_POST['mes'];
$participantes = $_POST['participantes'];
$duracion = $_POST['duracion'];
$horasHombre = $_POST['horasHombre'];
$costoPP = $_POST['costoPP'];
$costoTotal = $_POST['costoTotal'];
$ano = date('Y');

if( $departamento == "Otro" )
{
	$sql = "INSERT INTO Cursos (Departamento, Curso, Mes, Participantes, Duracion, HorasHombre, CostoPP, CostoTotal, Estatus, Ano) 
		VALUES('$otroDepto', '$curso', '$mes', '$participantes', '$duracion', '$horasHombre', '$costoPP' , 
			'$costoTotal', 'Abierto', '$ano')";	

} else {

	$sql = "INSERT INTO Cursos (Departamento, Curso, Mes, Participantes, Duracion, HorasHombre, CostoPP, CostoTotal, Estatus, Ano) 
			VALUES('$departamento', '$curso', '$mes', '$participantes', '$duracion', '$horasHombre', '$costoPP', 
				'$costoTotal', 'Abierto', '$ano')";	
}
			
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

$response->validation="true";
echo json_encode($response);

?>