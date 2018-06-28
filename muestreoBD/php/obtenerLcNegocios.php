<?php session_start();

include 'connBDD.php';

//$nombre = $_POST['nombre'];
//$puesto =  $_POST['puesto'];
$telefono = $_POST["code"];
//$telefono = trim($_POST["code"]);

$sql = "SELECT * FROM Telmex_Original_1194 WHERE TELEFONO = '$telefono'";
$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();	
//Verifica instruccion SQL
if( $stmt === false) {

	die( print_r( sqlsrv_errors(), true) );
}

$response = new stdClass();
$obtCampos = array();


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	//$importe_permor = $row['IMPORTE_PERMOR'] / 100;
	//$importe_perfis = $row['IMPORTE_PERFIS'] /100;	

	$obtCampos[]= array("nombre"=>$row['NOMBRE'],
		"dir1"=>$row['DIR1'],
		"dir2"=>$row['DIR2'],
		"colonia"=>$row['COLONIA'],
		"ciudad"=>$row['CIUDAD'],
		"cp"=>$row['CP'],
		"estado"=>$row['ESTADO'],
		"credito"=>"$" . $row['PRESTAMO'],
		"importe_permor"=> "$" . $row['PER_MOR'],
		"importe_perfis"=> "$" . $row['PER_FIS']
		//"municipio"=>$row['MUNICIPIO'],
		//"importe_permor"=> "$" . number_format($importe_permor),
		//"importe_perfis"=> "$" . number_format($importe_perfis)
		);  	
}


$response->opcion=$obtCampos;
echo json_encode($response);


?>