<?php session_start();

include_once '../DAO/RequisicionDAO.php';

$txtContratacionDeseada = $_POST['txtContratacionDeseada'];
$txtContratacionDeseada = new DateTime($txtContratacionDeseada);
$txtContratacionDeseada = $txtContratacionDeseada->format('Y-m-d');

$txtFechaInicioElaboracion = new DateTime();
$txtFechaInicioElaboracion = $txtFechaInicioElaboracion->format('Y-m-d H:i:s');

$dto = new stdClass();
$dto->FechaRegistro = $txtFechaInicioElaboracion;
$dto->NombreSolicitante = $_SESSION['Permisos']['NombreUsuario'];
$dto->DepartamentoSolicitante = $_SESSION['Permisos']['Departamento'];
$dto->PuestoSolicitante = $_SESSION['Permisos']['Puesto'];
$dto->GerenciaSolicitante = $_SESSION['Permisos']['Departamento'];

$dto->Nivel = $_POST['txtNivel'];
$dto->PuestoSolicitado = $_POST['txtPuestoSolicitado'];
$dto->JefeInmediato = $_POST['txtNombreJefeInmediato'];
$dto->PuestoJefeInmediato = $_POST['txtPuestoJefeInmediato'];
$dto->OrigenVacante = $_POST['group1'];
$dto->TipoContrato = $_POST['group2'];
$dto->ContratoMeses = (isset($_POST['txtMeses'])) ? $_POST['txtMeses'] : "";
$dto->ObjetivoPuesto = $_POST['txtObjetivo'];
$dto->Escolaridad = $_POST['txtEscolaridad'];
$dto->ConocimientosTeoricos = $_POST['txtConocimientosT'];
$dto->Idioma1 = $_POST['txtidioma1'];
$dto->PorcentajeIdioma1 = $_POST['txtPorIdi1'];
$dto->Idioma2 = $_POST['txtidioma2'];
$dto->PorcentajeIdioma2 = $_POST['txtPorIdi2'];
$dto->Experiencia = $_POST['txtExperiencia'];
$dto->DisponibilidadViajar = $_POST['group3'];
$dto->PorcentajeTiempoViajar = (isset($_POST['txtViajarTiempo'])) ? $_POST['txtViajarTiempo'] : "";
$dto->DisponibilidadCambioResidencia = $_POST['group4'];
$dto->CapacidadIntelectual = $_POST['group5'];
$dto->IniciativayEmpuje = $_POST['group6'];
$dto->ManejodePersonal = $_POST['group7'];
$dto->TomadeDesiciones = $_POST['group8'];
$dto->RelacionesInterpersonales = $_POST['group9'];
$dto->EstabilidadEmocional = $_POST['group10'];
$dto->ToleranciaPresion = $_POST['group11'];
$dto->Organizacion = $_POST['group12'];
$dto->ApegoaNormas = $_POST['group13'];
$dto->Otra = (isset($_POST['otra'])) ? $_POST['otra'] : "";
$dto->FechaDeseadaContratacion = $txtContratacionDeseada;
$dto->ComentariosAdicionales = $_POST['txtComentariosAdicionales'];
$dto->Estatus = "PENDIENTE";

$dao = new RequisicionDAO();
$datos = $dao->generar($dto);

$response = new stdClass();
$response->validacion = ($datos > 0) ? true : false;

header('Content-Type: application/json');
echo json_encode($response);

?>