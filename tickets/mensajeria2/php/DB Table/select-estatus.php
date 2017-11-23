<?php
	$sqlEstatus = $sql = "SELECT * FROM EstadosTicket";
	$stmtEst = sqlsrv_query( $conn, $sqlEstatus );

	$SelectEstatus = "";

	while( $rowEstatus = sqlsrv_fetch_array( $stmtEst, SQLSRV_FETCH_ASSOC) ) {

		$Estatus = trim($rowEstatus['Descripcion']);

		if($Estatus == $EstatusBD){

			$SelectEstatus .= "<option value='$Estatus' selected>$Estatus</option>";

		}else{

			$SelectEstatus .= "<option value='$Estatus'>$Estatus</option>";
		}

	}
?>