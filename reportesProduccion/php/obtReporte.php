<?php session_start();

include 'conexionMetrics.php';

$fechainicio = date("Y-m-d",strtotime($_REQUEST['fechainicio']));
$fechafin = date("Y-m-d",strtotime($_REQUEST['fechafin']));

if (isset($_REQUEST['operador']))
{
	$operador=$_REQUEST['operador'];		
	$sql = "execute dbo.ReporteOperador '$fechainicio','$fechafin','$operador'";
//var_dump($sql);
//exit();
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$data[]=array(
			"NumOrden"=>$row['NumOrden'],
			"NombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
			"clvActividad"=>$row['IdAct'],
			"Observacion"=>utf8_encode($row['Descripcion']),
			//"KeyProceso"=>$row['KeyProceso'],
			"Proceso"=>utf8_encode($row['Proceso']),
			"Cantidad"=>$row['Cantidad'],
			"Tiempo"=>number_format($row['Tiempo'],2),
			"HoraInicio" => $row['HoraInicio']->format('d-m-Y H:i'),
			"HoraFin" => $row['HoraFin']->format('d-m-Y H:i'),
			"FechaProduccion" => $row['Fechaproduccion']->format('d-m-Y'),
			"Maquina" => $row['Maquina']
			);	

	}	
			//var_dump($data);
			//exit();		
	$response->data=$data;
	echo json_encode($response);		
}
else
{
	$operador = "";
}

if (isset($_REQUEST['maquina']))
{
	$maquina = $_REQUEST['maquina'];
	$sql = "execute dbo.ReporteProceso '$fechainicio','$fechafin','$maquina'";
	//var_dump($sql);
	//exit();
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$data[]=array(
			"NumOrden"=>$row['NumOrden'],
			"NombreTrabajo"=>utf8_encode($row['NombreTrabajo']),
			"clvActividad"=>$row['IdAct'],
			"Observacion"=>utf8_encode($row['Descripcion']),
			//"KeyProceso"=>$row['KeyProceso'],
			"Proceso"=>utf8_encode($row['Proceso']),
			"Cantidad"=>$row['Cantidad'],
			"Tiempo"=>number_format($row['Tiempo'],2),
			"HoraInicio" => $row['HoraInicio']->format('d-m-Y H:i'),
			"HoraFin" => $row['HoraFin']->format('d-m-Y H:i'),
			"FechaProduccion" => $row['FechaProduccion']->format('d-m-Y'),				
			"NumEmpleado" => $row['Operador']
			);	

	}	
	$response->data=$data;
	echo json_encode($response);
} else
{
	$maquina = "";
}

?>