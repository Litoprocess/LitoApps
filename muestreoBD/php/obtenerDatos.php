<?php session_start();

include 'conexion.php';

//$nombre = $_POST['nombre'];
//$puesto =  $_POST['puesto'];
$telefono = trim($_POST["code"]);
$telefono = ereg_replace("[^A-Za-z0-9]", "", $_POST["code"]);

$sql = "SELECT * FROM Telmex_Original_0000 WHERE TELEFONO = $telefono";
$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();	
//Verifica instruccion SQL
$response = new stdClass();
$obtCampos = array();

if( $stmt === false) {

	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$pago_mensual = $row['FACT_MENSUAL'] / 100;
	$fact_mensual = $row['PAGO_MENSUAL'] /100;



	$obtCampos[]= array("nombre"=>$row['NOMBRE'],
						"dir1"=>$row['DIR1'],
						"dir2"=>$row['DIR2'],
						"dir3"=>$row['DIR3'],
						"ciudad"=>$row['CIUDAD'],
						"cp"=>$row['CP'],
						"estado"=>$row['ESTADO'],
						"municipio"=>$row['MUNICIPIO'],
						"fact_mensual"=> $pago_mensual,
						"pago_mensual"=> $fact_mensual
						);    	
}


$response->opcion=$obtCampos;
echo json_encode($response);


?>