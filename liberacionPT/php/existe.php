<?php session_start();

include 'conexion.php';

$folio = $_POST['folio'];

$sql = "SELECT COUNT(*) as existe FROM Registro WHERE Folio = '$folio'";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$data = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
		$data[]=array("existe"=>$row['existe']);	
}

$response->data=$data;
echo json_encode($response);

?>