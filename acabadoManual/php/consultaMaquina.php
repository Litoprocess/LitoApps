<?php session_start();

include 'conexion.php';

$response = new stdClass();
$rows = array();

$sql = "SELECT  * from Maquinas";
$stmt = sqlsrv_query( $conn,$sql);

while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
	$Clave=$row['Id_Maquina'];
	$nombre=$row['Maquina'];
	$rows[]=array("id"=>$Clave,"maquina"=>$nombre);

	$response->rows=@$rows;
}
echo json_encode ($response);

?>