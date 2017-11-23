<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$orden=$_REQUEST['orden'];

$response = new stdClass();
$rows = array();
$sql = "SELECT  * from vOrdenes WHERE NumOrden='$orden'";
$stmt = sqlsrv_query( $conn,$sql);
while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$NumOrden=$row['NumOrden'];
	$trabajo=utf8_encode($row['Trabajo']);
	if(isset($NumOrden)){
		
		$response->NumOrden=@$NumOrden;
		$response->trabajo=$trabajo;
		
	}
	
	
}
echo json_encode ($response);


?>