<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$response = new stdClass();
$rows = array();
$sql = "SELECT  * from Maquinas";
$stmt = sqlsrv_query( $conn,$sql);
while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$Clave=$row['Id_Maquina'];
	$nombre=$row['Maquina'];
	$rows[]=array("id"=>$Clave,"maquina"=>$nombre);

	$response->rows=@$rows;


	
	
}
echo json_encode ($response);




?>