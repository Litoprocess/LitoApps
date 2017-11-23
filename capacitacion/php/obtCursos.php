<?php session_start();
include 'conexion.php';

$sql = "SELECT Id, Departamento, Curso, Mes, Participantes, Duracion, HorasHombre, CostoPP, CostoTotal, Participantes_real,	Duracion_real, HorasHombre_real, Mes_Real, Estatus FROM Cursos";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$arreglo[]=array("id"=>$row['Id'],
		"departamento"=>utf8_encode($row['Departamento']),
		"curso"=>utf8_encode($row['Curso']),
		"mes"=>$row['Mes'],
		"participantes"=>$row['Participantes'],
		"duracion"=>$row['Duracion'],
		"horasHombre"=>$row['HorasHombre'],
		"costoPP"=>"$" . number_format($row['CostoPP'], 2, '.',','),
		"costoTotal"=>"$" . number_format($row['CostoTotal'], 2, '.',','),
		"participantesReal" => $row['Participantes_real'],
		"duracionReal" => $row['Duracion_real'],
		"horasHombreReal" => $row['HorasHombre_real'],
		"mesReal" => $row['Mes_Real'],
		"estatus" => $row['Estatus']
		);				
}


$response->data=$arreglo;
echo json_encode($response);
?>