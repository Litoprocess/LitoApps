<?php

$sqlPrioridad = "SELECT * FROM cat_Prioridades";
$stmtPrioridad = sqlsrv_query( $conn, $sqlPrioridad );

$SelectPrioridad = "";

while( $rowPrioridad = sqlsrv_fetch_array( $stmtPrioridad, SQLSRV_FETCH_ASSOC) ) {

	$Prioridad = trim($rowPrioridad['Nombre']);

	if($Prioridad == $PrioridadBD){

		$SelectPrioridad .= "<option value='$Prioridad' selected>$Prioridad</option>";

	}else{

		$SelectPrioridad .= "<option value='$Prioridad'>$Prioridad</option>";
	}

}


?>