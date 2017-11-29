<?php 
$serverName = "192.168.2.211"; 
$connectionInfo = array( "Database"=>"Cotizador", "UID"=>"sa", "PWD"=>"TcpkfcW8l1t0");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//Verifica la conexion
if( $conn === true ) {
	die( print_r( sqlsrv_errors(), true));
}

$insertar = "INSERT INTO prueba (usuario,contrasena,email,nombre,apellidos,activo)  
VALUES('sgarcia', '67973','sgarcia@litoprocess.com','SERGIO','GARCIA','1')";
$stmt = sqlsrv_query($conn,$insertar);

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$id="SELECT @@IDENTITY AS id";
$stmt2=sqlsrv_query($conn,$id,$params,$options);
$num = sqlsrv_num_rows( $stmt2 );

    while ($row =sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)) 
    {
    $idproduction = trim($row["id"]);
    } 

if($num>0){
    $response->validacion="true";
    $response->orprod=$idproduction;    
} else {
    $response->validacion="false";
}

print_r($response);
exit();


?>