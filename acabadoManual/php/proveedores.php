<?php

session_start();
$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$usuario=$_SESSION["Departamento"]; 
$response = new stdClass();
$rows = array();
$sql = "SELECT  * from ProveedoresMaquila WHERE Clave='$usuario'";
$stmt = sqlsrv_query( $conn,$sql);
while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$Clave=$row['Clave'];
	$nombre=$row['Nombre'];
	$rows[]=array("Clave"=>$Clave,"Nombre"=>$nombre);

	$response->rows=@$rows;


	
	
}
echo json_encode ($response);




?>