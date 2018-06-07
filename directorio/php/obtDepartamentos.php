<?php session_start();
include 'conexion.php';

	$sql = "SELECT DISTINCT Departamento FROM [dbo].[cat_Usuarios] WHERE estatus = 'ACTIVO' AND Departamento <> '' AND Puesto <> 'MAQUILADOR' AND Puesto <> 'ROOT' AND Extension <> 0 ORDER BY Departamento DESC";
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$botones = "";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$botones.= "<a id='" . $row['Departamento'] . "' class='waves-effect waves-light btn'>" . $row['Departamento'] . "</a>";			
}

$response->data=$botones;
echo json_encode($response);

?>