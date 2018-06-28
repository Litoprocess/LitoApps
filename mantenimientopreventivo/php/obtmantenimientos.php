<?php session_start();
include 'conexion.php';

if($_SESSION['Permisos']['UserMantenimiento'] == 1 )
{
	$sql = "SELECT * FROM v_cumplimiento";
	$stmt = sqlsrv_query($conn,$sql);
}
else
{
	$sql = "SELECT * FROM v_cumplimiento WHERE fecha_inicio = CONVERT(VARCHAR(10), GETDATE(), 102)";
	$stmt = sqlsrv_query($conn,$sql);	
}

$response = new stdClass();
$data = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$datetime1 = new DateTime($row['fecha_inicio']->format('d-m-Y'));
	$datetime2 = new DateTime($row['fecha_fin']->format('d-m-Y'));
	$interval = $datetime1->diff($datetime2);		

	if( $row['estatus'] == 'NO CUMPLIDO' )
	{
		$cumplido ="<input type='checkbox' class='cb_cumplido' id='cumplido".$row['id']."' size='3' disabled><label for='cumplido".$row['id']."'></label>";		
	}
	else if( $row['estatus'] == 'CUMPLIDO' )
	{
		$cumplido ="<input type='checkbox' class='cb_cumplido' id='cumplido".$row['id']."' size='3' checked><label for='cumplido".$row['id']."'></label>";		
	}
	else
	{
		$cumplido ="<input type='checkbox' class='cb_cumplido' id='cumplido".$row['id']."' size='3'><label for='cumplido".$row['id']."'></label>";		
	}

	if($row['manual']  != NULL)
	{	
		$manual = "<a href=manuales/" . $row['manual'] . " target='_blank'><i class='material-icons'>picture_as_pdf</i></a>";
	}
	else
	{
		$manual = "";
	}

	$data[]= array("id" => $row['id'],
		"detalle" => strtoupper($row['detalle']),
		"maquina" => strtoupper($row['maquina']),
		"fecha_inicio" => $row['fecha_inicio']->format('d-m-Y'),
		"duracion" => $interval->format('%a'),
		"tipo" => strtoupper($row['tipo']),
		"estatus" => $row['estatus'],
		"cumplido" => $cumplido,
		"manual" => $manual
		); 
}

$response->data=$data;
echo json_encode($response);

?>