<?php
require "class_conexion.php";

$response = new stdClass();
$rows =array();

$sql= "SELECT * FROM LAMINADO_PLOTTER WHERE ACTIVO = 1 ORDER BY DESCRIPCION ASC";
$stmt = sqlsrv_query($conn,$sql);

if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$option = "";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$idlaminado = $row["ID_LAMINADO"];
	$laminado = trim($row["DESCRIPCION"]);
	$option .= "<option value='$idlaminado'>$laminado</option>";
}
echo "$option";

sqlsrv_free_stmt( $stmt );

?>