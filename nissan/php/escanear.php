<?php session_start();

include 'conexion.php';

$guia = $_POST['guia'];
$sku = $_POST['sku'];

$sql = "SELECT * FROM Codigos WHERE Guia = '$guia' AND Sku = '$sku'";

$stmt = sqlsrv_query($conn,$sql);
$response = new stdClass(); 
$response->validacion= "false";
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {         

    $response->validacion= "true";
}

echo json_encode($response);


?>