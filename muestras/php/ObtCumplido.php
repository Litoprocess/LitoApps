<?php
include 'conexion.php';

$sql = "SELECT NumOrden,NombreTrabajo,CantEntregar,CantEntregada,CantMuestras,Estatus FROM V_ControlMuestras WHERE Estatus='CUMPLIDO'";
$stmt = sqlsrv_query( $conn, $sql );

$response = new stdClass();
$arreglo = array();

while( $data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
{

		$arreglo[]= array("numorden"=>$data['NumOrden'],		
			"trabajo"=>$data['NombreTrabajo'],
			"cantentregar"=>number_format($data['CantEntregar']),
			"cantentregada"=>number_format($data['CantEntregada']),
			"cantmuestras"=>number_format($data['CantMuestras']),	
			"estatus"=>$data['Estatus']					
			);	
}

$response->data=$arreglo;
echo json_encode($response);
?>