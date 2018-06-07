<?php
include 'conexion.php';

$sql = "SELECT NumOrden,NombreTrabajo,CantEntregar,CantEntregada,CantMuestras,Estatus FROM V_ControlMuestras WHERE Estatus IN ('NO CUMPLIDO')";
$stmt = sqlsrv_query( $conn, $sql );

$response = new stdClass();
$arreglo = array();

while( $data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
{

	if($data['CantMuestras'] > 0)
	{
		$cantMuestras = "<input type='text' class='in_cantidad browser-default' id='cantidad".$data['NumOrden']."' value='".$data['CantMuestras']."' size='3' disabled><span style='color:transparent;'>" . $data['CantMuestras'] ."</span>";
		$aplica = "<input type='checkbox' class='cb_aplica browser-default' id='aplica".$data['NumOrden']."' size='3' disabled><label for='aplica".$data['NumOrden']."'></label>";
	} else {
		$cantMuestras = "<input type='text' class='in_cantidad browser-default' id='cantidad".$data['NumOrden']."' value='".$data['CantMuestras']."' size='3'><span style='color:transparent;'>" . $data['CantMuestras'] ."</span>";
		$aplica = "<input type='checkbox' class='cb_aplica browser-default' id='aplica".$data['NumOrden']."' size='3'><label for='aplica".$data['NumOrden']."'></label>";
	}

	$arreglo[]= array("numorden"=>$data['NumOrden'],		
		"trabajo"=>$data['NombreTrabajo'],
		"cantentregar"=>number_format($data['CantEntregar']),
		"cantentregada"=>number_format($data['CantEntregada']),
		"CantMuestras"=> $cantMuestras,	
		"estatus"=>$data['Estatus'],
		"aplica"=> $aplica			
		);	
}

$response->data=$arreglo;
echo json_encode($response);
?> 