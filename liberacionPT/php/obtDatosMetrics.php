<?php session_start();

include 'conexion.php';

$orden = $_POST['orden'];

$sql = "SELECT NumOrden,NombreTrabajo,FechaEmision,CantEntregar,Acumulado 
FROM v_LibProdTerm WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$data[]=array("orden"=>$row['NumOrden'],
		"trabajo"=>$row['NombreTrabajo'],
		"fecha"=>$row['FechaEmision'],
		"cantidad"=>number_format($row['CantEntregar']),
		"acumulado"=>$row['Acumulado']
		);				
}

$response->data=$data;
echo json_encode($response);

?>