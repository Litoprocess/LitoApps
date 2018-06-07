<?php session_start();

include 'conexion.php';

$id=$_REQUEST['id'];

$response = new stdClass();
$rows = array();
$sql = "SELECT DISTINCT * from Registro_de_Actividad WHERE id=$id";
$stmt = sqlsrv_query( $conn,$sql);
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  $rows[] = array( 
   "ID_Empleado"=>$row['ID_empleado'],
   "Actividad"=>$row['Actividad'],
   "FechaInicio"=>$row['FechaInicio']->format('Y-m-d\TH:i:s'),
   "FechaFin"=>$row['FechaFin']->format('Y-m-d\TH:i:s'),
   "Cantidad"=>$row['Cantidad'], 
   "OP"=>$row['OP'],
   "Tiempo"=>$row['Tiempo'],
   "Otra_Actividad"=>$row['Otra_Actividad'],
   "Tipo_Actividad"=>$row['Tipo_Actividad'],
   "Tipo_Maquina"=>$row['Tipo_Maquina'],
   "id"=>$row['id']
   );
  $response->data = $rows;
  
}
echo json_encode ($response);

?>