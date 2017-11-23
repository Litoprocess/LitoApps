<?php
session_start();

include 'conn.php';

$sql = "SELECT * FROM cat_Categorias WHERE Estado = 1";
$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$optCategoria = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$optCategoria[]= array("value"=>trim($row['NombreCategoria']),
		"label"=>trim($row['NombreCategoria']));    
}

$response->opcion=$optCategoria;
echo json_encode($response);

?>