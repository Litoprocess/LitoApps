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
			"AjusteLito"=>$row['AjusteLito'],
			"Tiros" => $row['Tiros'],
			"TiempoMuertoAjeno" => $row['TiempoMuertoAjeno'],
			"TiempoAjuste" => $row['TiempoAjuste'],
			"TiempoImproductivo" => $row['TiempoMuertoPropio'],
			"TiempoReportado" => $row['TiempoReportado'],
			"TiempoSinRegistro" => $row['TiempoSinRegistro'],
			"TiempoSinTurno" => $row['TiempoSinTurno'],
			"TiempoTiro" => $row['TiempoTiro'],
			"Maquina" => $row['Maquina'],
			"AjusteStd" => $row['AjusteStd'],
			"VelocidadStd" =>$row['VelocidadStd'],
			"AjusteVW" => $row['AjusteVW'],
			"AjusteVWStd" => $row['AjusteVWStd'],								
			"TiempoPrevisto" => $row['TiempoPrevisto']
			);	

	}	
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

	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$data[]=array(
			"AjusteLito"=>$row['AjusteLito'],
			"Tiros" => $row['Tiros'],
			"TiempoMuertoAjeno" => $row['TiempoMuertoAjeno'],
			"TiempoAjuste" => $row['TiempoAjuste'],
			"TiempoImproductivo" => $row['TiempoMuertoPropio'],
			"TiempoReportado" => $row['TiempoReportado'],
			"TiempoSinRegistro" => $row['TiempoSinRegistro'],
			"TiempoSinTurno" => $row['TiempoSinTurno'],
			"TiempoTiro" => $row['TiempoTiro'],
			"Maquina" => $row['Maquina'],
			"AjusteStd" => $row['AjusteStd'],
			"VelocidadStd" =>$row['VelocidadStd'],
			"AjusteVW" => $row['AjusteVW'],
			"AjusteVWStd" => $row['AjusteVWStd'],								
			"TiempoPrevisto" => $row['TiempoPrevisto']

			);
	}	
	$response->data=$data;
	echo json_encode($response);
} else
{
	$maquina = "";
}

?>