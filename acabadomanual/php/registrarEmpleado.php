<?php session_start();

include 'conexion.php';

$nombre=strtoupper($_REQUEST['nombre']);
$edad=strtoupper($_REQUEST['edad']);
$genero=strtoupper($_REQUEST['genero']);
$imss=strtoupper($_REQUEST['imss']);
$proveedor=strtoupper($_REQUEST['proveedor']);

//consultamos registros en relación al proveedor

$sqlconsulta="SELECT * from Registro_de_empleados_de_Maquila WHERE ClaveID LIKE '%$proveedor%'";
$stmt= sqlsrv_query( $conn,$sqlconsulta);
$row_count = sqlsrv_num_rows( $stmt );
$contador=count($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC));

$response = new stdClass();
if($contador==0){
  $Clave=$proveedor."001";
  $sql = "INSERT INTO Registro_de_empleados_de_Maquila  VALUES ('$nombre',$edad,'$genero',$imss,'$proveedor','$Clave')";
  $empleado = sqlsrv_query( $conn,$sql);
  $response->clave=$Clave;
  //var_dump($sql);
  echo json_encode($response);
}else{
  $sqlconsulta="SELECT  TOP 1* from Registro_de_empleados_de_Maquila WHERE ID_proveedor LIKE '%$proveedor%'  ORDER BY ID DESC";
  $stmt= sqlsrv_query( $conn,$sqlconsulta);
  while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    $ids=$row['ClaveID'];

    if($proveedor=="INT"){
     $cla=intval(substr($ids,3));
   }
   else{
     $cla=intval(substr($ids,2));
   }
   
   $ID=$cla+1;

   if(strlen($ID)==1){
    $ID="00".$ID;

  }
  if(strlen($ID)==2){
   $ID= "0".$ID;

 }
        $ClaveDos=$proveedor.$ID;    
        
        $sql ="INSERT INTO Registro_de_empleados_de_Maquila  VALUES ('$nombre',$edad,'$genero',$imss,'$proveedor','$ClaveDos')";
        $empleado = sqlsrv_query( $conn,$sql);
        
//consultar Clave de registro
        $response->clave=$ClaveDos;

        echo json_encode($response);
      }
    }

    ?>