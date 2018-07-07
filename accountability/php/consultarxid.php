<?php session_start();

include_once '../DAO/CuestionarioDAO.php';

$dto = new stdClass();
$dto->id_cuestionario = $_POST['id_cuestionario'];

	$dao = new CuestionarioDAO();
	$datos = $dao->consultarxid($dto);

$response = new stdClass();
$arreglo = array();
	foreach ($datos as $row) {

		$arreglo[]=array(
			'txt1'=>$row['P1'],
			'txt2'=>$row['P2_1'],
			'txt3'=>$row['P2_2'],
			'txt4'=>$row['P2_3'],
			'txt5'=>$row['P3'],
			'txt6'=>$row['P4'],
			'txa1'=>$row['P5'],
			'txa2'=>$row['P6'],
			'txa3'=>$row['P7'],
			'txa4'=>$row['P8'],
			'txa5'=>$row['P9'],
			'txa6'=>$row['P10'],
			'fecha'=>date("d-m-Y", strtotime($row['Fecha'])),
			'nombre'=>$row['Nombre'],
			'equipo'=>$row['Equipo'],
			'txa7'=>$row['Brecha']			
		);				
	}

	$response->data = $arreglo;	

	header('Content-Type: application/json');
	echo json_encode($response);	
?>