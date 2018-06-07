<?php 
$serverName = "192.168.2.217"; 
$connectionInfo = array( "Database"=>"Telmex", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//Verifica la conexion
if( $conn === false ) {
	die( print_r( sqlsrv_errors(), true));
}

?>