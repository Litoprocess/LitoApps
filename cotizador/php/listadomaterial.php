<?php session_start();
include 'conexion.php';

$sql = "SELECT * FROM materiales_cotizador WHERE NOMBRE_MATERIAL <> 'Ninguno' AND NOMBRE_MATERIAL <> 'PRUEBA' ORDER BY ID_MATERIAL DESC";
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	if( $_SESSION["Permisos"]["UserListadoCotizador"] != 1)
	{
		$importe = '<input type="text" class="importe" id="'.$row['ID_MATERIAL'].'" value="'.round($row['IMPORTE'],2).'" size="3" style="font-size:90%; text-align: center;" readonly>';
	} else {
		$importe = '<input type="text" class="importe" id="'.$row['ID_MATERIAL'].'" value="'.round($row['IMPORTE'],2).'" size="3" style="font-size:90%; text-align: center;">';
	}


	$arreglo[]=array(
		"ID_MATERIAL" => $row['ID_MATERIAL'],
		"NOMBRE_MATERIAL" => $row['NOMBRE_MATERIAL'],
		"ANCHO1" => $row['ANCHO1'],
		"ALTO1" => $row['ALTO1'],
		"ANCHO2" => $row['ANCHO2'],
		"ALTO2" => $row['ALTO2'],
		"ANCHO3" => $row['ANCHO3'],
		"ALTO3" => $row['ALTO3'],
		"ANCHO4" => $row['ANCHO4'],
		"ALTO4" => $row['ALTO4'],
		"ANCHO5" => $row['ANCHO5'],
		"ALTO5" => $row['ALTO5'],
		"TIPO" => $row['TIPO'],
		"IMPORTE" => $importe,
		"MONEDA" => $row['MONEDA'],
		"PROVEEDOR" => $row['PROVEEDOR'],
		"ACTIVO" => $row['ACTIVO'],
		"TRASLUCIDO" => $row['TRASLUCIDO'],
		"CORTE"		 => $row['CORTE']
		);	

}

$response->data=$arreglo;
echo json_encode($response);
?>