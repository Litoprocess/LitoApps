<?php session_start();
include 'conexion.php';

$sql = "SELECT * FROM Actividades_copy";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$arreglo[]=array(
		"id_actividad"=>$row['Id_Actividad'],
		"actividad"=>$row['Actividad']
		);				
}

$response->data=$arreglo;
echo json_encode($response);
?>