<?php session_start();
include 'conexion.php';

$orden = $_POST['orden'];
$tipoRegistro = $_POST['tipoRegistro'];
$cantidadSol = str_replace(",","",$_POST['cantidadSol']);
$departamento = $_POST['departamento'];
$importe = str_replace(",","",$_POST['importe']);
$nota = $_POST['nota'];
$trabajo = $_POST['trabajo'];
$nomCliente = $_POST['nomCliente'];
$fechOrden = $_POST['fechOrden'];

$sql = "SELECT * FROM Reprocesos WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);
$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

if ( ($row_count) > 0)
{
	$sql = "UPDATE Reprocesos_copy set TipoRegistro = '$tipoRegistro', Cantidad ='$cantidadSol', Departamento ='$departamento', ImporteCotizado ='$importe', 
	Nota ='$nota' WHERE NumOrden ='$orden'"; 
	$stmt = sqlsrv_query($conn,$sql);

	$response->validation="true";
	echo json_encode($response);

} else {

	$sql = "INSERT INTO Reprocesos_copy (NumOrden, ImporteCotizado, Departamento, Nota, NombreTrabajo, NombreCliente, FechaOrden, Cantidad, TipoRegistro) 
	VALUES ('$orden', '$importe', '$departamento', '$nota', '$trabajo', '$nomCliente', '$fechOrden', '$cantidadSol', '$tipoRegistro')";
	$stmt = sqlsrv_query($conn,$sql);

	$response->validation="true";
	echo json_encode($response);

}

?>