<?php session_start();

include 'conexion.php';

$id_mtto = $_POST['id_mtto'];
$estatus = $_POST['estatus'];
$usuario = $_SESSION['Permisos']['NombreUsuario'];

$response = new stdClass();
$sql = "UPDATE mantenimientos SET estatus = '$estatus', usuario_reporta = '$usuario', fecha_reporta = getdate() WHERE id = '$id_mtto'";


$stmt = sqlsrv_query($conn,$sql);

$response->validacion = true;
echo json_encode($response);

?>