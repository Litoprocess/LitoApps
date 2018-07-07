<?php session_start();

include_once '../DAO/ListadoDAO.php';

$response = new stdClass();
$arreglo = array();

$dto = new stdClass();

	$dao = new ListadoDAO();
	$datos = $dao->listar();


	//$response->validacion = (count($datos) > 0) ? true : false;	

	foreach ($datos as $row) {

		$arreglo[]=array(
			"id"=>$row['Id'],
			"fecha" => date("d-m-Y", strtotime($row['Fecha'])),
			"nombre" => $row['Nombre'],
			"equipo" => $row['Equipo'],
			"brecha" => $row['Brecha']
			);				
	}

	$response->data = $arreglo;	

	header('Content-Type: application/json');
	echo json_encode($response);	
?>