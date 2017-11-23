<?php
session_start();

include 'conn.php';

$sql = "SELECT * FROM v_Departamentos";

$stmt = sqlsrv_query( $conn, $sql );

//Verifica instruccion SQL
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$optDepartamento = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$optDepartamento[]= array("value"=>$row['Id_Departamento'],
		"label"=>$row['NombreDepartamento']);    
}

$response->opcion=$optDepartamento;
echo json_encode($response);

?>