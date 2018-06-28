<?php session_start();
include 'conexion.php';

$tamlote = $_POST['tamlote'];
$tabla = $_POST['tabla'];

$sql = "SELECT Nivel_Inspeccion,Tam_Muestra,Aceptado,Rechazado FROM Inspeccion WHERE '$tamlote'>=Tam_Minimo and '$tamlote'<=Tam_Maximo AND Tabla='$tabla'";
$stmt = sqlsrv_query($conn, $sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
	$data[]=array("nivel"=>$row['Nivel_Inspeccion'],
		"tamano"=>$row['Tam_Muestra'],
		"aceptado"=>$row['Aceptado'],
		"rechazado"=>$row['Rechazado']);
}

$response->data=$data;
echo json_encode($response);

?>