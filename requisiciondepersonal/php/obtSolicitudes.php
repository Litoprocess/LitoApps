<?php session_start();

include_once '../DAO/RequisicionDAO.php';

$response = new stdClass();
$arreglo = array();

	$dao = new RequisicionDAO();
	$datos = $dao->listar(null);


	//$response->validacion = (count($datos) > 0) ? true : false;	

	foreach ($datos as $row) {

		$SueldoDe = ($row['RangoSueldoDe'] > 0) ? $SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".$row['RangoSueldoDe']."' size='3' disabled>" : $SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' size='3'><label for='rangoSueldoDe_".$row['Id']."'></label>";

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
			$fecha = date("d-m-Y", strtotime($row['FechaAlta']));
		}

		$arreglo[]=array(
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

	$response->data = $arreglo;	

	header('Content-Type: application/json');
	echo json_encode($response);	
?>