<?php session_start();

include 'conexion.php';

$sql = "SELECT * FROM Reprocesos WHERE NumOrden <> '' AND FechaOrden >= dateAdd(d, -180, getdate()) ORDER BY FechaOrden DESC";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{
	$data[]=array("orden"=>"<a href='php/getReprocesoDetalle.php?folio=".$row['NumOrden']."'>".$row['NumOrden']."</a>",
		"departamento"=>$row['Departamento'],
		"trabajo"=>utf8_encode($row['NombreTrabajo']),
		"cliente"=>utf8_encode($row['NombreCliente']),
		"fechaOrden"=>$row['FechaOrden']->format('d/m/Y'),
		"cantidad"=> number_format($row['Cantidad']),
		"importe"=>number_format($row['ImporteCotizado'],2,".",",")
		);	
}

$response->data=$data;

echo json_encode($response);

?>