<?php session_start();

include 'conexion.php';

$sql = "SELECT * FROM Nueva_Propuesta ";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$data[]=array(
		"id_propuesta"=>$row['id_propuesta'],
		"clave_cliente"=>$row['clave_Cliente'],
		"fRegistro"=>$row['fecha_Registro']->format('d/m/Y'),
		"fAplicacion"=>$row['fecha_Aplicacion']->format('d/m/Y'),
		"titulo"=>utf8_encode($row['titulo']),
		"propuesta"=>utf8_encode($row['propuesta']),
		"cliente" =>utf8_encode($row['nom_cliente'])
		
		);	
}

$response->data=$data;

echo json_encode($response);

?>