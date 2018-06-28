<?php
require "conexion.php";

$response = new stdClass();
$rows =array();

$sql= "SELECT * FROM ACABADOS WHERE ACTIVO = 1 ORDER BY DESCRIPCION ASC";
$stmt = sqlsrv_query($conn,$sql);

$option = "";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$idmedida = $row["ID_ACABADO"];
	$medida = trim($row["DESCRIPCION"]);
	$option .= "<option value='$idmedida'>$medida</option>";
}
echo "$option";

sqlsrv_free_stmt( $stmt );

?>