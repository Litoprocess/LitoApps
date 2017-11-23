<?php session_start();

include 'conexion.php';

$sql = "SELECT TOP 1 Folio FROM Registro ORDER BY Folio DESC";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
	$data[]=array("folio"=>$row['Folio']);	
}

$response->data=$data;
echo json_encode($response);

?>