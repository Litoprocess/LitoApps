<?php session_start();

include_once '../DAO/EmpleadoDAO.php';

$idempleado = $_POST['idempleado'];
$response = new stdClass();
$arreglo = array();

	$dao = new EmpleadoDAO();
	$datos = $dao->consultarxid($idempleado);

	$response->validacion = (count($datos) > 0) ? true : false;	

	foreach ($datos as $row) {
		$arreglo[]=array(
			"nombre"=>$row['Nombre'],
			"apellidoPaterno" => $row['ApellidoPaterno'],
			"apellidoMaterno" => $row['ApellidoMaterno'],
			"fechaAlta" => date("d-m-Y", strtotime($row['FechaAlta']))
			);			
	}

	$response->data = $arreglo;	

	header('Content-Type: application/json');
	echo json_encode($response);	
?>