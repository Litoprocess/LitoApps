<?php session_start();
include 'conexion.php';

	$sql = "SELECT DISTINCT Extension,Nombre,Departamento,Puesto,Correo FROM cat_Usuarios WHERE estatus = 'ACTIVO' AND Departamento <> '' AND Puesto <> 'MAQUILADOR' AND Puesto <> 'ROOT' AND Extension <> 0 ORDER BY Departamento DESC";
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$arreglo[] = array(
		"extension" => utf8_encode($row['Extension']),
		"nombre" => utf8_encode($row['Nombre']),
		"departamento" => utf8_encode($row['Departamento']),	
		"puesto" => utf8_encode($row['Puesto']),	
		"correo" => utf8_encode($row['Correo'])						
		);				
}

	$response->data = $arreglo;
	echo json_encode($response);

?>