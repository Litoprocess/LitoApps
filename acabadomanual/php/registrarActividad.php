<?php session_start();
include 'conexion.php';

$noEmpleado=$_POST['noEmpleado'];
$op = (isset($_POST['op']) && $_POST['op'] != "") ? $_POST['op'] : "";
$elijeAct=$_POST['elijeAct'];
$repo = (isset($_POST['repo'])) ? $_POST['repo'] : 0; 
$otro = ( isset($_POST['otro']) && isset($_POST['otro']) ) ? $_POST['otro'] : ""; 
$valorOrden = ( isset($_POST['valorOrden']) && isset($_POST['valorOrden']) ) ? $_POST['valorOrden'] : "";
$fechaS = $_POST['fechaSistema'];

$FechaInicio = new DateTime($_REQUEST['fechInicio']); //,new DateTimeZone('America/Mexico_City')
$FechaFin   = new DateTime($_REQUEST['fechFin']); //,new DateTimeZone('America/Mexico_City')     

$dteDiff  = $FechaInicio->diff($FechaFin); 
$horas = $dteDiff->format("%H");
$minutos = $dteDiff->format("%I");
$totalminutos = $minutos / 60;
$tiempoTotal = $horas + round($totalminutos,1); 

if(isset($_REQUEST['costos']) && $_REQUEST['costos'] != 0){
	$costos = $_REQUEST['costos'];
	$tipoActividad = "Maquina";
}
else
{
	$costos="";
	$tipoActividad="";
} 

if(isset($_REQUEST['accion']) && $_REQUEST['accion'] == 0)
{
	$fechaIni= $FechaInicio->format('d-m-Y H:i:s');
	$fechaFi= $FechaFin->format('d-m-Y H:i:s');
	$date = new DateTime($fechaS);
	$fechaTurno= date('d-m-Y h:i:s');

	$sql = "INSERT INTO Registro_de_Actividad VALUES ('$noEmpleado',$elijeAct,'$fechaIni','$fechaFi','$repo','$op','$otro','$tipoActividad','$costos','$valorOrden','$tiempoTotal','$fechaTurno')";
	$empleado = sqlsrv_query( $conn,$sql);

}
else
{
	$id=$_REQUEST['id'];
	$date = new DateTime($fechaS);
	$fecha= $date->format('d-m-Y H:i:s');
	$fechaIni= $FechaInicio->format('d-m-Y H:i:s');
	$fechaFi= $FechaFin->format('d-m-Y H:i:s');

	$sql = "UPDATE Registro_de_Actividad SET ID_empleado='$noEmpleado',Actividad=$elijeAct, FechaInicio='$fechaIni',FechaFin='$fechaFi',Cantidad='$repo',OP='$op',Tiempo='$tiempoTotal',Otra_Actividad='$otro',Tipo_Actividad='$tipoActividad',Tipo_Maquina='$costos',Nombre_Trabajo='$valorOrden' WHERE id=$id";
	$empleado = sqlsrv_query( $conn,$sql);
}

$response = new stdClass();
$response->validacion = "true";
echo json_encode($response);

?>