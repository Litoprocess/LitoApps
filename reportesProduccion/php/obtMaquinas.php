<?php session_start();

include 'conexionMetrics.php';

	$sql = "SELECT *  FROM MaquinasMetrics WHERE maquina NOT LIKE '%SUAJE-01%' AND maquina NOT LIKE '%CORTE_TRI-01%'
AND Maquina NOT LIKE '%SUAJE-01%' AND Maquina NOT LIKE '%KOMORI 428%' ORDER BY Maquina ASC";

	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$option .= "<option value='".$row['Maquina']."'>".$row['Maquina']."</option>";
}
echo "$option";

sqlsrv_free_stmt( $stmt );

?>