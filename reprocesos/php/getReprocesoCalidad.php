<?php session_start();

include 'conexion.php';

$orden = $_POST['orden'];

$sql = "SELECT * FROM Reprocesos WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);
//$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$data[]=array("importe"=>$row['ImporteCotizado'],
		"departamento"=>$row['Departamento'],
		"nota"=>utf8_encode($row['Nota']),
		"preprensa"=>$row['Preprensa'],
		"offset"=>$row['Offset'],
		"acabLito"=>$row['AcabLito'],
		"acabEsp"=>$row['AcabEsp'],
		"ventas"=>$row['Ventas'],
		"acabManual"=>$row['AcabMan'],
		"maqExt"=>$row['MaqExt'],
		"maqInt"=>$row['MaqInt'],
		"operaciones" => $row['Operaciones'],
		"almacen"=>$row['Almacen'],
		"sistemas"=>$row['Sistemas'],
		"calidad"=>$row['Calidad'],
		"litVw"=>$row['LitVW'],
		"entregas"=>$row['Entregas'],
		"cliente"=>$row['Cliente'],
		"nombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
		"nombreCliente"=>$row['NombreCliente'],
		"fechaOrden"=>$row['FechaOrden']->format('d/m/Y'),
		"cantidad" => $row['Cantidad'],
		"tipoRegistro" => $row['TipoRegistro'],
		"indigo" => $row['Indigo'],	
		"nuberas" => $row['Nuberas'],
		"buskro" => $row['Buskro']
		);	
}

$response->data=$data;
echo json_encode($response);

?>