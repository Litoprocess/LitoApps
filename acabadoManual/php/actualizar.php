<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$noEmpleado=$_REQUEST['noEmpleado'];
if(isset($_REQUEST['op'])){
	$op=$_REQUEST['op'];
}else{
	$op="";
}

$elijeAct=$_REQUEST['elijeAct'];
$inicio=$_REQUEST['inicio'];
$fin=$_REQUEST['fin'];

if(isset($_REQUEST['repo'])){
	$repo=$_REQUEST['repo'];
}else{
	$repo=0;
}

$tiempo=$_REQUEST['tiempo'];
$fechaS=$_REQUEST['fech'];
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
$id=$_REQUEST['id'];
$date = new DateTime($fechaS);
$fecha= $date->format('d-m-Y');
$hora= intval(substr($tiempo,0, 2));
$minuto=(intval(substr($tiempo,3, 4))/60);

$tiempoT=$hora+$minuto;
$tiempoTotal=number_format((float)$tiempoT, 2, '.', '');

$sql = "UPDATE Registro_de_Actividad SET ID_empleado='$noEmpleado',Actividad=$elijeAct, FechaInicio='$fecha $inicio',FechaFin='$fecha $fin',Cantidad=$repo,OP='$op',Tiempo='$tiempoTotal',Otra_Actividad='$otro',Tipo_Actividad='$tipoActividad',Tipo_Maquina='$costos' WHERE id=$id";
$empleado = sqlsrv_query( $conn,$sql);

//var_dump($sql);

$response="true";
echo json_encode($response);



?>