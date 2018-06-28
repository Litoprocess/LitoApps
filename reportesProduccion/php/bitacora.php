<?php session_start();

include 'conexionMetrics.php';

//Asignacion de variables
$nombreAgente = $_SESSION['Permisos']['NombreUsuario'];
$tipoReporte = $_POST['tipoReporte'];
$fechainicio = date("Y-m-d",strtotime($_POST['fechainicio']));
$fechafin = date("Y-m-d",strtotime($_POST['fechafin']));

if (isset($_POST['operador']))
{
$operador = $_POST['operador'];
$sql = "INSERT INTO bitacoraConsultas (Usuario, FechaConsulta, TipoReporte, NumOperador, FechaInicio, FechaFin) VALUES 
('$nombreAgente', getdate(), '$tipoReporte', '$operador','$fechainicio', '$fechafin')";
//var_dump($sql);
//exit();
$stmt = sqlsrv_query( $conn, $sql );

$response = new stdClass();
$response->validacion="true";
echo json_encode($response);		
}
else
{
	$operador = "";
}

if (isset($_POST['maquina']))
{
$maquina = $_POST['maquina'];
$sql = "INSERT INTO bitacoraConsultas (Usuario, FechaConsulta, TipoReporte, Maquina, FechaInicio, FechaFin) VALUES 
('$nombreAgente', getdate(), '$tipoReporte', '$maquina','$fechainicio', '$fechafin')";
$stmt = sqlsrv_query( $conn, $sql );

$response = new stdClass();
$response->validacion="true";
echo json_encode($response);		
}
else
{
	$operador = "";
}

?>