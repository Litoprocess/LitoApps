<?php
include "conexionMetrics.php";

$response = new stdClass();
$rows =array();

$sql= "SELECT Maquina FROM MaquinasMetrics";
$stmt = sqlsrv_query($conn,$sql);

if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

$option = "";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$maquina = $row["Maquina"];
	$option .= "<option value='$maquina'>$maquina</option>";
}
echo "$option";

?>