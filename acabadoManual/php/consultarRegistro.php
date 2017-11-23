<?php



$serverName = "192.168.2.211"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$id=$_REQUEST['id'];

$response = new stdClass();
$rows = array();
$sql = "SELECT DISTINCT * from Registro_de_Actividad WHERE id=$id";
$stmt = sqlsrv_query( $conn,$sql);
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  $id=$row['id'];
  $ID_empleado=$row['ID_empleado'];
  $Actividad=$row['Actividad'];
  $FechaInicio=$row['FechaInicio'];
  $FechaFin=$row['FechaFin'];
  $Cantidad=$row['Cantidad'];
  $OP=$row['OP'];
  $Tiempo=$row['Tiempo'];
  $Otra_Actividad=$row['Otra_Actividad'];
  $Tipo_Actividad=$row['Tipo_Actividad'];
  $Tipo_Maquina=$row['Tipo_Maquina'];
  $rows[] = array( 
   "ID_Empleado"=>$ID_empleado,
   "Actividad"=>$Actividad,
   "FechaInicio"=>$FechaInicio,
   "FechaFin"=>$FechaFin,
   "Cantidad"=>$Cantidad, 
   "OP"=>$OP,
   "Tiempo"=>$Tiempo,
   "Otra_Actividad"=>$Otra_Actividad,
   "Tipo_Actividad"=>$Tipo_Actividad,
   "Tipo_Maquina"=>$Tipo_Maquina,
   "id"=>$id
   );
  $response->rows = $rows;
  
}
echo json_encode ($response);

?>