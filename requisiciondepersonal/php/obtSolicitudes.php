<?php session_start();

include 'conexion.php';

	$sql = "SELECT * from Requisiciones";
	//var_dump($sql);
	//exit();
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{

		if($row['RangoSueldoDe'] > 0)
		{
			$SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".$row['RangoSueldoDe']."' size='3' disabled>";		
		} 
		else 
		{
			$SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' size='3'><label for='rangoSueldoDe_".$row['Id']."'></label>";
		}

		if($row['RangoSueldoHasta'] > 0)
		{
			$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' value='".$row['RangoSueldoHasta']."' size='3' disabled>";		
		} 
		else 
		{
			$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' size='3'><label for='rangoSueldoHasta_".$row['Id']."'></label>";
		}	

		if($row['Estatus'] == 'PENDIENTE')
		{
			$finalizar = "<input type='checkbox' class='cb_estatus' id='estatus".$row['Id']."' size='3'><label for='estatus".$row['Id']."'></label>";
		}
		else
		{
			$finalizar = "<input type='checkbox' class='cb_estatus' id='estatus".$row['Id']."' size='3' checked disabled><label for='estatus".$row['Id']."'></label>";			
			$SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".$row['RangoSueldoDe']."' size='3' disabled>";
			$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' value='".$row['RangoSueldoHasta']."' size='3' disabled>";			
		}


		if($row['FechaAlta'] === null)
		{
			$fecha = 'SIN ALTA';
		}
		else
		{
			$fecha = $row['FechaAlta']->format('d-m-Y H:i');
		}

		$data[]=array(
			"Id"=>$row['Id'],
			"Solicitante" => $row['NombreSolicitante'],
			"Departamento" => $row['DepartamentoSolicitante'],
			"Puesto" => $row['PuestoSolicitado'],
			"SueldoDe" => $SueldoDe,
			"SueldoHasta" => $SueldoHasta,
			"Estatus" => $row['Estatus'],
			"Finalizar" => $finalizar,
			"FechaAlta" => $fecha
			);	

	}	
			//var_dump($data);
			//exit();		
	$response->data=$data;
	echo json_encode($response);	