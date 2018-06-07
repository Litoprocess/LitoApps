<?php session_start();
include 'conexionMetrics.php';

$idoperador = $_POST['idoperador'];
	
	$sql = "SELECT * FROM V_Operadores WHERE NoOperador = '$idoperador'";
	$stmt = sqlsrv_query($conn,$sql);

	$nombre = "";

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$nombre = $row['Nombre'];
	}

header('Content-Type: application/json');
echo json_encode($nombre);

?>