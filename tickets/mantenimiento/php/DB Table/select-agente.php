<?php

$sql2 = "SELECT * FROM v_catUsuarios WHERE Departamento = 'MANTENIMIENTO'
UNION
SELECT * FROM v_catUsuarios WHERE  Id_Usuario = 1";
$stmt2 = sqlsrv_query( $conn, $sql2 );

$SelectAgente = "";

while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {

	$Agente = trim(utf8_encode($row2['Nombre']));

	switch ($AgenteBD) {

		case $Agente: $SelectAgente .= "<option value='$Agente' selected>$Agente</option>";
		break;
		
		default: $SelectAgente .= "<option value='$Agente'>$Agente</option>";
		break;
	}
}

?>