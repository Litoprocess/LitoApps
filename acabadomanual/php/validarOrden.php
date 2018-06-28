<?php session_start();

include 'conexion.php';

$orden= $_REQUEST['orden'];

$response = new stdClass();
$rows = array();

$sql = "SELECT * from vOrdenes WHERE NumOrden='$orden'";
$stmt = sqlsrv_query( $conn,$sql);

while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$NumOrden=$row['NumOrden'];
	$trabajo=utf8_encode($row['Trabajo']);

	if(isset($NumOrden)){
		$response->validacion = 'true';
		$response->NumOrden=@$NumOrden;
		$response->trabajo=$trabajo;		
	}
	else
	{
		$response->validacion = 'false';
	}
	
	
}
echo json_encode ($response);


?>