<?php
include 'conexion.php';

$sql = "SELECT Nombre, Login, Password, Correo FROM cat_Usuarios where estatus = 'ACTIVO' AND Correo IS NOT NULL";
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
	$data[] = array(
			'Nombre' => $row['Nombre'],
			'Login' => $row['Login'],
			'Contrasena' => $row['Password'],
			'Correo' => $row['Correo']
		);
}

$response->data = $data;
echo json_encode($response);
header('Content-type: application/json; charset=utf-8');

?>