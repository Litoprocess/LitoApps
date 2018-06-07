<?php session_start();
include 'conexion.php';

$IdEvento = $_POST['IdEvento'];

$sql = "SELECT * FROM mantenimientos WHERE id = '$IdEvento'";
//echo getdate();
//exit();
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$datetime1 = new DateTime($row['fecha_inicio']->format('d-m-Y'));
	$datetime2 = new DateTime($row['fecha_fin']->format('d-m-Y'));
	$interval = $datetime1->diff($datetime2);
	//echo $interval->format('%a');

	$data[]= array("id" => $row['id'],
		"tipoOp" => $row['tipoOp'],		
		"titulo" => $row['titulo'],
		"componente" => $row['componente'],
		"material" => $row['material'],
		"detalle" => $row['detalle'],
		"tipo" => $row['tipo'],
		"tipo" => $row['tipo'],
		"fecha_inicio" => $row['fecha_inicio']->format('Y-m-d'),
		"duracion" => $interval->format('%a'),
		"secuencia" => $row['secuencia'],
		"manual" => $row['manual']
		); 
}

$response->data=$data;
echo json_encode($response);

?>