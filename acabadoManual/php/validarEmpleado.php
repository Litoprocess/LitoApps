<?php

$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"AcabadoManual", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$idempleado=$_REQUEST['idempleado'];

$response = new stdClass();
$rows = array();
$sql = "SELECT  * from vEmpAcabadoManual WHERE NumEmpleado='$idempleado'";
$stmt = sqlsrv_query( $conn,$sql);
while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    $id=$row['NumEmpleado'];
    $nom=$row['Nombre'];
    $idProv=$row['idprov'];
    if(isset($id)){
        	//extraer Nombre de proveedor
       $sql2 = "SELECT  * from ProveedoresMaquila WHERE Clave='$idProv'";
       $stmt2 = sqlsrv_query( $conn,$sql2);

       
       while( @$row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {
           $proveedor=$row2['Nombre'];
           $response->NombreP=@$proveedor;
       }




        	//fin
       $response->validacion=@$nom;
       $response->prov=@$idProv;
   }
   
   
}
echo json_encode ($response);


?>