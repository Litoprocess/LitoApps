<?php session_start();

include_once '../DAO/RequisicionDAO.php';

$response = new stdClass();
$arreglo = array();

$dto = new stdClass();
$dto->NombreUsuario = $_SESSION['Permisos']['NombreUsuario'];

	$dao = new RequisicionDAO();
	$datos = $dao->listar($dto);


	//$response->validacion = (count($datos) > 0) ? true : false;	

	foreach ($datos as $row) {

		if($_SESSION['Permisos']['NombreUsuario'] != "INTEGRACION")
		{
			$SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".number_format($row['RangoSueldoDe'])."' size='3' disabled>";
			$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' value='".number_format($row['RangoSueldoHasta'])."' size='3' disabled>";
			$finalizar = "<input type='checkbox' class='cb_estatus' id='estatus".$row['Id']."' size='3' checked disabled><label for='estatus".$row['Id']."'></label>";
			$Candidato = "<input type='text' class='in_candidato' id='candidato_".$row['Id']."' value='".$row['NombreCandidatoInterno']."' size='3' disabled>";			
			$fecha = ( $row['FechaAlta'] === null ) ? $fecha = 'SIN ALTA' : $fecha = date("d-m-Y", strtotime($row['FechaAlta']));		
		}
		else
		{
			$SueldoDe = (number_format($row['RangoSueldoDe']) > 0) ? $SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".number_format($row['RangoSueldoDe'])."' size='3' disabled>" : $SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' size='3'><label for='rangoSueldoDe_".$row['Id']."'></label>";

			if(number_format($row['RangoSueldoHasta']) > 0)
			{
				$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' value='".number_format($row['RangoSueldoHasta'])."' size='3' disabled>";		
			} 
			else 
			{
				$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' size='3'><label for='rangoSueldoHasta_".$row['Id']."'></label>";
			}	

			if($row['Estatus'] == 'PENDIENTE')
			{
				$finalizar = "<input type='checkbox' class='cb_estatus' id='estatus".$row['Id']."' size='3'><label for='estatus".$row['Id']."'></label>";
				$Candidato = "<input type='text' class='in_candidato' id='candidato_".$row['Id']."' value='".$row['NombreCandidatoInterno']."' size='3'>";
			}
			else
			{
				$finalizar = "<input type='checkbox' class='cb_estatus' id='estatus".$row['Id']."' size='3' checked disabled><label for='estatus".$row['Id']."'></label>";			
				$SueldoDe = "<input type='text' class='in_rangoSueldoDe' id='rangoSueldoDe_".$row['Id']."' value='".number_format($row['RangoSueldoDe'])."' size='3' disabled>";
				$SueldoHasta = "<input type='text' class='in_rangoSueldoHasta' id='rangoSueldoHasta_".$row['Id']."' value='".number_format($row['RangoSueldoHasta'])."' size='3' disabled>";
				$Candidato = "<input type='text' class='in_candidato' id='candidato_".$row['Id']."' value='".$row['NombreCandidatoInterno']."' size='3' disabled>";
			}


			if($row['FechaAlta'] === null)
			{
				$fecha = 'SIN ALTA';
			}
			else
			{
				$fecha = date("d-m-Y", strtotime($row['FechaAlta']));
			}
		}

		$arreglo[]=array(
			"Id"=>$row['Id'],
			"Solicitante" => $row['NombreSolicitante'],
			"Departamento" => $row['DepartamentoSolicitante'],
			"Puesto" => $row['PuestoSolicitado'],
			"SueldoDe" => $SueldoDe,
			"SueldoHasta" => $SueldoHasta,
			"Candidato" => $Candidato,
			"Estatus" => $row['Estatus'],
			"Finalizar" => $finalizar,
			"FechaAlta" => $fecha
			);				
	}

	$response->data = $arreglo;	

	header('Content-Type: application/json');
	echo json_encode($response);	
?>