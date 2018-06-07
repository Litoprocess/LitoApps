<?php session_start();
include 'conexion.php';

$orden = $_POST['orden'];
$tipoRegistro = $_POST['tipoRegistro'];
$departamento = $_POST['departamento'];
$importe = str_replace(",","",$_POST['importe']);
$nota = $_POST['nota'];
$reproceso = $_POST['reproceso'];
$fechOrden = $_POST['fechOrden'];
$idusuario= $_SESSION["Permisos"]['IdUsuario'];
//$trabajo = $_POST['trabajo'];
//$nomCliente = $_POST['nomCliente'];

$sql = "SELECT * FROM Quejas_Clientes WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);
$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

if ( ($row_count) > 0)
{
	$sql = "UPDATE Quejas_Clientes  set Tipo = '$tipoRegistro', Departamento ='$departamento', Costo_Asociado ='$importe', Detalle ='$nota', Reproceso='$reproceso' WHERE NumOrden ='$orden'"; 
	$stmt = sqlsrv_query($conn,$sql);

	$response->validation="true";
	echo json_encode($response);
	echo json_encode($stmt);

} else {

	$sql = "INSERT INTO Quejas_Clientes (NumOrden, Costo_Asociado, Departamento, Detalle, Fecha_Queja, Tipo, Reproceso, Id_Usuario) 
	VALUES ('$orden', '$importe', '$departamento', '$nota', '$fechOrden', '$tipoRegistro','$reproceso','$idusuario')";
	$stmt = sqlsrv_query($conn,$sql);

	$response->validation="true";
	echo json_encode($response);
	echo json_encode($stmt);

}

?>