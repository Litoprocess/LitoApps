<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$id=$_REQUEST['id'];

$sql = "DELETE FROM Registro_de_Actividad WHERE id=$id";
$empleado = sqlsrv_query( $conn,$sql);

//var_dump($sql);

$response="true";
echo json_encode($response);



?>