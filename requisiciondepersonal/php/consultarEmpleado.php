<?php session_start();

include 'conexionLito.php';

	$idempleado = $_POST['idempleado'];

	$sql = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno, FechaAlta FROM Personal WHERE Personal = '$idempleado'";
	$stmt = sqlsrv_query($conn,$sql);

	$response = new stdClass();
	$data = array();

	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
	{
		$data[]=array(
			"nombre"=>$row['Nombre'],
			"apellidoPaterno" => $row['ApellidoPaterno'],
			"apellidoMaterno" => $row['ApellidoMaterno'],
			"fechaAlta" => $row['FechaAlta']->format('d-m-Y')
			);	
	}	

	if ($stmt) 
	{
		$response->data=$data;
	    $response->validacion = true;
	}
	else
	{
		$response->validacion = false;
	}		
	
header('Content-Type: application/json');
echo json_encode($response);	

?>