<?php session_start();

include_once '../DAO/CuestionarioDAO.php';

$fecha = new DateTime($_POST['fecha']);
$fecha = $fecha->format('Y-m-d');

$dto = new stdClass();
$dto->txt1 = $_POST['txt1'];
$dto->txt2 = $_POST['txt2'];
$dto->txt3 = $_POST['txt3'];
$dto->txt4 = $_POST['txt4'];
$dto->txt5 = $_POST['txt5'];
$dto->txt6 = $_POST['txt6'];
$dto->txa1 = $_POST['txa1'];
$dto->txa2 = $_POST['txa2'];
$dto->txa3 = $_POST['txa3'];
$dto->txa4 = $_POST['txa4'];
$dto->txa5 = $_POST['txa5'];
$dto->txa6 = $_POST['txa6'];
$dto->fecha = $fecha;
$dto->nombre = $_POST['nombre'];
$dto->equipo = $_POST['equipo'];
$dto->txa7 = $_POST['txa7'];
$dto->radiobutton = $_POST['group1'];

$dao = new CuestionarioDAO();
$datos = $dao->nuevocuestionario($dto);

$response = new stdClass();
$response->validacion = ($datos > 0) ? true : false;

$response->id = $datos;

header('Content-Type: application/json');
echo json_encode($response);

?>