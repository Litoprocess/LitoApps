<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$response = new stdClass();
$rows = array();
$sql = "SELECT  * from Actividades";
$stmt = sqlsrv_query( $conn,$sql);
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	$id=$row['Id_Actividad'];
	$actividad=$row['Actividad'];
	
	$rows[] = array( "id"=>$id,"actividad"=>$actividad);
	$response->rows = $rows;
	
}
echo json_encode ($response);


?>