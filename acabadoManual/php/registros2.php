<?php

session_start();
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

$serverName = "192.168.2.211"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);



$response = new stdClass();
$rows = array();

//$_search=$_REQUEST['_search'];
$usuario=$_SESSION["id_proveedor"];
//echo $usuario;

$month = date('m');
$year = date('Y');
$primer = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
$actual = date('Y-m-d');


/*if($_search=="true"){

  if(isset($_REQUEST['ID_Empleado'])){

   $idEmpleado=$_REQUEST['ID_Empleado'];
   $sql = "SELECT * FROM V_registros WHERE ID_empleado = '$idEmpleado' ORDER BY id DESC";
   $stmt = sqlsrv_query( $conn,$sql);
   
 }

  if(isset($_REQUEST['Tipo_Actividad'])){

   $Tipo_Actividad=$_REQUEST['Tipo_Actividad'];
   $sql = "SELECT DISTINCT * from V_registros WHERE Tipo_Actividad = '$Tipo_Actividad'  order by id DESC";
   $stmt = sqlsrv_query( $conn,$sql);


 }
 if(isset($_REQUEST['Tipo_Maquina'])){

   $Tipo_Maquina=$_REQUEST['Tipo_Maquina'];
   $sql = "SELECT DISTINCT * from V_registros WHERE Tipo_Maquina = '$Tipo_Maquina' order by id DESC";
   $stmt = sqlsrv_query( $conn,$sql);


 }
 if(isset($_REQUEST['FechaInicio'])){

   $FechaInicio=$_REQUEST['FechaInicio'];
   $sql = "SELECT DISTINCT * from V_registros WHERE Convert(Varchar(10),FechaInicio,103) LIKE '$FechaInicio%' order by id DESC";
   //var_dump($sql);
   $stmt = sqlsrv_query( $conn,$sql);

 }

 if(isset($_REQUEST['FechaFin'])){

   $FechaFin=$_REQUEST['FechaFin'];
   $sql = "SELECT DISTINCT * from V_registros WHERE Convert(Varchar(10),FechaFin,103) LIKE '$FechaFin%' order by id DESC";
   $stmt = sqlsrv_query( $conn,$sql);

 }

}*/

//else{

switch ($usuario) {
  case 'INT':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado NOT LIKE 'M%' AND FechaInicio >= '2017-01-01' ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;

  case 'M1':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M1%' AND FechaFin BETWEEN '05/01/2017 00:00:00.000' AND '05/25/2017' ORDER BY id DESC '00:00:00.000'";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  
  break;

  case 'M2':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M2%'ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;

  case 'M3':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M3%' ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;

  case 'M4':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M4%' ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;

  case 'M5':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M5%' ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;

  case 'M6':
  $Registros_tabla = "SELECT * FROM V_registros WHERE ID_empleado LIKE 'M6%' ORDER BY id DESC";
  $stmt = sqlsrv_query ($conn, $Registros_tabla);
  break;
  
  default:
    # code...
  break;
}

//}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

  $id=$row['id'];
  $ID_empleado=$row['ID_empleado'];
  $Actividad=$row['Actividad'];
  $FechaInicio=$row['FechaInicio']->format('Y-m-d H:i:s');
  $FechaFin=$row['FechaFin']->format('Y-m-d H:i:s');
  $Cantidad=$row['Cantidad'];
  $OP=$row['OP'];
  $Tiempo=$row['Tiempo'];
  $Otra_Actividad=$row['Otra_Actividad'];
  $Tipo_Actividad=$row['Tipo_Actividad'];
  $Tipo_Maquina=$row['Tipo_Maquina'];
  $rows[] = array( 
   $ID_empleado,
   $Actividad,
   $FechaInicio,
   $FechaFin,
   $Cantidad, 
   $OP,
   $Tiempo,
   $Otra_Actividad,
   $Tipo_Actividad,
   $Tipo_Maquina,
   $id
   );
  $response->data = $rows;

}









echo json_encode ($response);

?>