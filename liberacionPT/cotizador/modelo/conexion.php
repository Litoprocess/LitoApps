<?php
   /* $con=mysql_connect("localhost","root","");

    if($con)
    {
        mysql_select_db("cotizador3",$con);
    }
    else
    {
        die("No se pudo conectar a la base de datos.");
    }*/

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"Cotizador", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//Verifica la conexion
if( $conn === true ) {
	die( print_r( sqlsrv_errors(), true));
}

?>