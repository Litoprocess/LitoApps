<?php session_start();

include_once '../DAO/RequisicionDAO.php';

$dto = new stdClass();	
$dto->id = $_POST['Id'];

$dao = new RequisicionDAO();

if(isset($_POST['sueldoDe']))
{
	$dto->sueldo = $_POST['sueldoDe'];
	$dto->campo = "RangoSueldoDe";
	$datos = $dao->agregarsueldo($dto);
}
else if(isset($_POST['sueldoHasta']))
{
	$dto->sueldo = $_POST['sueldoHasta'];
	$dto->campo = "RangoSueldoHasta";
	$datos = $dao->agregarsueldo($dto);	
}

$response = new stdClass();
$response->validacion = ($datos > 0) ? true : false;

header('Content-Type: application/json');
echo json_encode($response);
?>
