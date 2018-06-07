<?php session_start();
include 'conexion.php';

$noEmpleado=$_REQUEST['noEmpleado'];
if(isset($_REQUEST['op'])){
	$op=$_REQUEST['op'];
}else{
	$op="";
}

$elijeAct=$_REQUEST['elijeAct'];
//$inicio=$_REQUEST['inicio'];
//$fin=$_REQUEST['fin'];

if(isset($_REQUEST['repo'])){
	$repo=$_REQUEST['repo'];
}else{
	$repo=0;
}

$FechaInicio = new DateTime($_REQUEST['fechInicio'],new DateTimeZone('America/Mexico_City')); 
$FechaFin   = new DateTime($_REQUEST['fechFin'],new DateTimeZone('America/Mexico_City'));     

$dteDiff  = $FechaInicio->diff($FechaFin); 
$horas = $dteDiff->format("%H");
$minutos = $dteDiff->format("%I");
$totalminutos = $minutos / 60;
$tiempoTotal = $horas + round($totalminutos,1); 

//$tiempo=$_REQUEST['tiempo'];
//$hora= intval(substr($tiempo,0, 2));
//$minuto=(intval(substr($tiempo,3, 4))/60);

//$tiempoT=$hora+$minuto;
//$tiempoTotal=number_format((float)$tiempoT, 2, '.', '');

$fechaS=$_REQUEST['fechaSistema'];
if(isset($_REQUEST['costos']) && $_REQUEST['costos'] !=0){
	$costos=$_REQUEST['costos'];
	$tipoActividad="Maquina";
}else{
	$costos="";
	$tipoActividad="";
}




if(isset($_REQUEST['otro']) && $_REQUEST['otro']!=""){

	$otro=$_REQUEST['otro'];

}else{
	$otro="";
}
//registrar empleado
if(isset($_REQUEST['noTrabajo']) && $_REQUEST['noTrabajo'] !=""){
	$trabajo=$_REQUEST['noTrabajo'];
}else{
	$trabajo="";
}
//$FechaInicio=$_REQUEST['fechInicio'];
//$FechaFin=$_REQUEST['fechFin'];
if(isset($_REQUEST['accion']) && $_REQUEST['accion']==0){



	//$date = new DateTime($FechaInicio);
	$fechaIni= $FechaInicio->format('d-m-Y H:i:s');

	//$date = new DateTime($FechaFin);
	$fechaFi= $FechaFin->format('d-m-Y H:i:s');

	$date = new DateTime($fechaS);
	$fechaTurno= date('d-m-Y h:i:s');

if(isset($_REQUEST['op'])){//comprobamos que la op exista, si es así validar nombre de trabajo
	$sqlTrabajo = "SELECT  * from vOrdenes WHERE NumOrden='$op'";
	$stmtT = sqlsrv_query( $conn,$sqlTrabajo);
	while( @$rowTrabajo = sqlsrv_fetch_array( $stmtT, SQLSRV_FETCH_ASSOC) ) {
		
		@$validaTrabajo=$rowTrabajo['Trabajo'];
		$sql = "INSERT INTO Registro_de_Actividad VALUES ('$noEmpleado',$elijeAct,'$fechaIni','$fechaFi','$repo','$op','$otro','$tipoActividad','$costos','$validaTrabajo','$tiempoTotal','$fechaTurno')";
		$empleado = sqlsrv_query( $conn,$sql);

//var_dump($sql);
//var_dump($empleado);
	}
}else{ //sino existe op 
	$sql = "INSERT INTO Registro_de_Actividad VALUES ('$noEmpleado',$elijeAct,'$fechaIni','$fechaFi','$repo','$op','$otro','$tipoActividad','$costos','$trabajo','$tiempoTotal','$fechaTurno')";
	$empleado = sqlsrv_query( $conn,$sql);
//var_dump($sql);
}



}else{
	$id=$_REQUEST['id'];
	$date = new DateTime($fechaS);
	$fecha= $date->format('d-m-Y H:i:s');
	//$date = new DateTime($FechaInicio);
	$fechaIni= $FechaInicio->format('d-m-Y H:i:s');

	//$date = new DateTime($FechaFin);
	$fechaFi= $FechaFin->format('d-m-Y H:i:s');
//actualizamos actividad
	$sql = "UPDATE Registro_de_Actividad SET ID_empleado='$noEmpleado',Actividad=$elijeAct, FechaInicio='$fechaIni',FechaFin='$fechaFi',Cantidad='$repo',OP='$op',Tiempo='$tiempoTotal',Otra_Actividad='$otro',Tipo_Actividad='$tipoActividad',Tipo_Maquina='$costos',Nombre_Trabajo='$trabajo' WHERE id=$id";
	$empleado = sqlsrv_query( $conn,$sql);
}

$response = new stdClass();
$response->validacion = "true";
echo json_encode($response);

//echo "hola";


?>