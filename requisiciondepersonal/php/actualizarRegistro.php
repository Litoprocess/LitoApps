<?php session_start();

include_once '../DAO/RequisicionDAO.php';

$altaFecha = new DateTime($_POST['altaFecha']);
$altaFecha = $altaFecha->format('Y-m-d');

$dto = new stdClass();	
$dto->id = $_POST['Id1'];
$dto->estatus = $_POST['estatus'];
$dto->altaFecha = $altaFecha;
$dto->nombreEmpleado = $_POST['nombreEmpleado'];
$dto->idEmpleado = $_POST['idEmpleado'];

$dao = new RequisicionDAO();
$datos = $dao->finalizar($dto);

$response = new stdClass();
$response->validacion = ($datos > 0) ? true : false;

header('Content-Type: application/json');
echo json_encode($response);
?>

