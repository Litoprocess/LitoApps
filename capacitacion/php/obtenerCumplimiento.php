<?php session_start();
include 'conexion.php';

$xmes = $_POST['xmes'];

$sql = "SELECT ISNULL(SUM(HorasHombre),0) AS TotalHoras, ISNULL(SUM(HorasHombre_real),0) AS TotalHorasReales FROM Cursos WHERE Mes IN($xmes)";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$arreglo[]=array("totalHoras"=>$row['TotalHoras'],
		"totalHorasReales" => $row['TotalHorasReales']
		);				
}


$response->data=$arreglo;
echo json_encode($response);
?>