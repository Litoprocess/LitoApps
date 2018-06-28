<?php session_start();

include 'conexion.php';

$sql = "SELECT * FROM Bitacora";

$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();	
//Verifica instruccion SQL
$response = new stdClass();
$arreglo = array();

if( $stmt === false) {

	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$arreglo[]= array("id" => $row['id'],
					"usuario" => $row['Usuario'],
					"guia" => $row['Guia'],
					"sku" => $row['Sku'],
					"fecha" => $row['Fecha']->format("d-m-Y"),
					"estatus" => $row['Estatus']
						);    	
}

$response->data=$arreglo;
echo json_encode($response);


?>