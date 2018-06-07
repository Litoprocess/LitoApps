<?php session_start();

include 'conexion.php';

$usuario=$_SESSION['Permisos']['Departamento']; 

$response = new stdClass();
$rows = array();
$sql = "SELECT  * from ProveedoresMaquila WHERE Clave='$usuario'";
$stmt = sqlsrv_query( $conn,$sql);
while( @$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

	$Clave=$row['Clave'];
	$nombre=$row['Nombre'];
	$rows[]=array("Clave"=>$Clave,"Nombre"=>$nombre);

	$response->data=@$rows;           
}
echo json_encode ($response);
?>