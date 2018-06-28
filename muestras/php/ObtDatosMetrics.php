<?php
include 'conexion.php';

$sql = "SELECT NumOrden,NombreTrabajo,CantEntregar,CantEntregada FROM V_ControlMuestras WHERE Estatus IN('PENDIENTE','X ENTREGAR')";
$stmt = sqlsrv_query( $conn, $sql );
//var_dump($sql);
//exit();
$response = new stdClass();
$arreglo = array();

while( $data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
{

		$arreglo[]= array("numorden"=>$data['NumOrden'],		
			"trabajo"=>$data['NombreTrabajo'],
			"cantentregar"=>number_format($data['CantEntregar']),
			"cantentregada"=>number_format($data['CantEntregada']),
			"cantidad"=>"<input type='text' class='in_cantidad browser-default' id='cantidad".$data['NumOrden']."' size='3'>",
			"aplica"=>"<input type='checkbox' class='cb_aplica' id='aplica".$data['NumOrden']."' size='3'><label for='aplica".$data['NumOrden']."'></label>"
			);	
}

//echo count($arreglo);
//exit();
$response->data=$arreglo;
echo json_encode($response);
?>