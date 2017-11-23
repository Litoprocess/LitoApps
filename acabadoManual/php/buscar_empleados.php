<?php

session_start();

$serverName = "192.168.2.211"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$usuario=$_SESSION["Departamento"]; 

$response = new stdClass();
$rows = array();


if($usuario=="INT"){
 $where="WHERE dbo.vEmpAcabadoManual.idprov='Lito' OR dbo.vEmpAcabadoManual.idprov='INT'";
}else{
 $where="WHERE dbo.vEmpAcabadoManual.idprov='$usuario'";
}

$sql = "SELECT
dbo.vEmpAcabadoManual.NumEmpleado as ClaveID,
dbo.vEmpAcabadoManual.Nombre,
dbo.vEmpAcabadoManual.edad as Edad,
dbo.vEmpAcabadoManual.genero AS Genero,
dbo.vEmpAcabadoManual.imss as No_Imss,
dbo.vEmpAcabadoManual.idprov as ID_proveedor

from vEmpAcabadoManual $where Order by dbo.vEmpAcabadoManual.NumEmpleado DESC";
var_dump($sql);
$stmt = sqlsrv_query( $conn,$sql);


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  $nombre=utf8_encode($row['Nombre']);
  $edad=$row['Edad'];
  $genero=utf8_encode($row['Genero']);
  $imss=$row['No_Imss'];
  $proveedor=$row['ID_proveedor'];
  $clave=$row['ClaveID'];
  
  $rows[] = array( 
   $nombre,
   $edad,
   $genero,
   $imss,
   $proveedor, 
   $clave
   
   );
  $response->rows = $rows;

  
}









echo json_encode ($response);

?>