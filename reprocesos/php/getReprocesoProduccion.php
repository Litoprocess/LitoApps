<?php session_start();

include 'conexion.php';

$orden = $_POST['orden'];

$sql = "SELECT * FROM Reprocesos WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);
$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

if ( ($row_count) > 0){

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

		$data[]=array("importe"=>number_format($row['ImporteCotizado'], 2, '.', ''),
			"departamento"=>$row['Departamento'],
			"nota"=>utf8_encode($row['Nota']),
			"nombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
			"nombreCliente"=>$row['NombreCliente'],
			"fechaOrden"=>$row['FechaOrden']->format('d/m/Y'),
			"cantidad" => number_format($row['Cantidad']),
			"tipoRegistro" => $row['TipoRegistro']

			);				
	}

	$response->data=$data;
	echo json_encode($response);

} else {
	$sql = "SELECT * FROM OrdensProducao WHERE NumOrdem ='$orden'";
	$stmt = sqlsrv_query($conn,$sql);


	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
		$data[]=array("fechaOrden" => $row["DtEmissao"]->format('d/m/Y'),
			"nombreTrabajo"=>$row['Descricao'],
			"nombreCliente" => $row['NomeCliente']
			);					 			
	}

	$response->data=$data;
	echo json_encode($response);
}



?>

