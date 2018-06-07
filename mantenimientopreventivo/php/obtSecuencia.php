<?php session_start();

include 'conexion.php';

$sql = "SELECT max(secuencia) AS secuencia FROM mantenimientos";
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
	$data[]=array("secuencia"=>$row['secuencia']);	
}

$response->data=$data;
echo json_encode($response);

?>