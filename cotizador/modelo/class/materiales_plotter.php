<?php
require "class_conexion.php";

$response = new stdClass();
$rows =array();

$sql= "SELECT * FROM materiales_cotizador WHERE ACTIVO = 1 Order by NOMBRE_MATERIAL ASC";
$stmt = sqlsrv_query($conn,$sql);

if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$option = "";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$idmaterial = $row["ID_MATERIAL"];
	$material = trim($row["NOMBRE_MATERIAL"]);
	$option .= "<option value='$idmaterial'>$material</option>";
}
echo "$option";

sqlsrv_free_stmt( $stmt );

?>