<?php 
$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"Cotizador", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//Verifica la conexion
if( $conn === true ) {
    die( print_r( sqlsrv_errors(), true));
}

?>
