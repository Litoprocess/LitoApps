<?php session_start();

include 'conexion.php';

$usuario=$_SESSION['Permisos']["Departamento"]; 

$response = new stdClass();
$rows = array();


if($usuario=="INT"){
 $where="WHERE dbo.vEmpAcabadoManual.idprov='Lito' OR dbo.vEmpAcabadoManual.idprov='INT'";
}else{
 $where="WHERE dbo.vEmpAcabadoManual.idprov='$usuario'";
}

$sql = "SELECT * from vEmpAcabadoManual $where Order by NumEmpleado DESC";
$stmt = sqlsrv_query( $conn,$sql);


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

  $rows[] = array( 
   "ClaveID"=>$row['NumEmpleado'],
   "Nombre"=>$row['Nombre'],
   "Edad"=>$row['edad'],
   "Genero"=>$row['genero'],
   "No_Imss"=>$row['imss'],   
   "ID_proveedor"=>$row['idprov']
   );
  $response->data = $rows;
}

echo json_encode ($response);

?>