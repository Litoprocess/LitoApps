<?php session_start();

//include 'conexion.php';
include 'conexionLito.php';

$clave_cliente = $_POST['clave_cliente'];

$sql = "SELECT Nombre FROM Cte WHERE Cliente='$clave_cliente'";
$stmt = sqlsrv_query($conn,$sql);
$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false)
{
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

if ( ($row_count) > 0)
{

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$data[]=array(
			"nombreCliente"=>$row['Nombre']
		);				
	}

	$response->data=$data;
	echo json_encode($response);

} 

	




?>

