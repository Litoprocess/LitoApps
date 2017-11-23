<?php session_start();

include 'conexion.php';

$sql = "SELECT * FROM Muestras_TO_0000 ORDER BY id_muestras DESC";

$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();	
//Verifica instruccion SQL
$response = new stdClass();
$data = array();

if( $stmt === false) {

	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$data[]= array($row['id_muestras'],
						$row['agente_calidad'],
						$row['telefono'],
						$row['fecha']->format("Y-m-d H:i:s"),
						$row['estado'],
						$row['comentario']
						);    	
}

$response->data=$data;
echo json_encode($response);


?>