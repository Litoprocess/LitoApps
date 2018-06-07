<?php session_start();

include 'conexionMetrics.php';

$sql = "SELECT * FROM bitacoraConsultas";

$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();	
//Verifica instruccion SQL
$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$data[]= array("fecha" => $row['FechaConsulta']->format('d-m-y H:i'),
		"usuario" => $row['Usuario'],
		"tipo" => $row['TipoReporte'],
		"numoperador" => $row['NumOperador'],
		"maquina" => $row['Maquina'],
		"desde" => $row['FechaInicio']->format('d-m-y'),
		"hasta" => $row['FechaFin']->format('d-m-y')
		);    	
}

$response->data=$data;
echo json_encode($response);


?>