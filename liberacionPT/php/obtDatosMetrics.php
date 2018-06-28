<?php session_start();

include 'conexion.php';

$orden = trim($_POST['orden']);

$sql = "SELECT * FROM v_LibProdTerm WHERE NumOrden = '$orden'";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ) )
{
	$data[] = array("trabajo"	=>	$row['NombreTrabajo'],
					 "fecha"	=>	$row['FechaEmision'],
					 "cantidad"	=>	$row['CantEntregar'],
					 "acumulado"=>	$row['Acumulado']
					);				  	
}

$response->data=$data;
echo json_encode($response);

?>