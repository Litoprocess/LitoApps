<?php session_start();
include 'conexion.php';



//$dpto= "TODOS";
$dpto= $_POST['dpto'];
//echo $dpto;

if($_SESSION['Permisos']['UserMantenimiento'] == 1 && $dpto == "TODOS" )
{
	$sql = "SELECT * FROM v_cumplimiento ";
	$stmt = sqlsrv_query($conn,$sql);
}
else
{
	$sql = "SELECT * FROM v_cumplimiento WHERE fecha_inicio = CONVERT(VARCHAR(10), GETDATE(), 102) OR departamento like '$dpto' ";
	$stmt = sqlsrv_query($conn,$sql);	
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$datetime1 = new DateTime($row['fecha_inicio']->format('d-m-Y'));
	$datetime2 = new DateTime($row['fecha_fin']->format('d-m-Y'));
	$interval = $datetime1->diff($datetime2);		

	

	
	$data[]= array("id" => $row['id'],
		"detalle" => strtoupper($row['detalle']),
		"maquina" => strtoupper($row['maquina']),
"departamento" => strtoupper($row['departamento']),
		"fecha_inicio" => $row['fecha_inicio']->format('d-m-Y'),
		"duracion" => $interval->format('%a'),
		"tipo" => strtoupper($row['tipo']),
		"estatus" => $row['estatus'],
		
		); 
}

$response->data=$data;
echo json_encode($response);
?>