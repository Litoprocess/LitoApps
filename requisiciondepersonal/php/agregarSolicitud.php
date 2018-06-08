<?php session_start();

include 'conexion.php';

$nombre = $_SESSION['Permisos']['NombreUsuario'];
$departamento = $_SESSION['Permisos']['Departamento'];
$puesto = $_SESSION['Permisos']['Puesto'];
$gerencia = $_SESSION['Permisos']['Departamento'];

$txtPuestoSolicitado = $_POST['txtPuestoSolicitado'];
$txtNombreJefeInmediato = $_POST['txtNombreJefeInmediato'];
$txtPuestoJefeInmediato = $_POST['txtPuestoJefeInmediato'];
$group1 = $_POST['group1'];
$group2 = $_POST['group2'];
$txtMeses = $_POST['txtMeses'];
$txtObjetivo = $_POST['txtObjetivo'];
$txtEdad = $_POST['txtEdad'];
$txtSexo = $_POST['txtSexo'];
$txtEscolaridad = $_POST['txtEscolaridad'];
$txtConocimientosT = $_POST['txtConocimientosT'];
$txtidioma1 = $_POST['txtidioma1'];
$txtPorIdi1 = $_POST['txtPorIdi1'];
$txtidioma2 = $_POST['txtidioma2'];
$txtPorIdi2 = $_POST['txtPorIdi2'];
$txtExperiencia = $_POST['txtExperiencia'];
$txtConocimientosP = $_POST['txtConocimientosP'];
$group3 = $_POST['group3'];
$txtViajarTiempo = $_POST['txtViajarTiempo'];
$group4 = $_POST['group4'];
$group5 = $_POST['group5'];
$group6 = $_POST['group6'];
$group7 = $_POST['group7'];
$group8 = $_POST['group8'];
$group9 = $_POST['group9'];
$group10 = $_POST['group10'];
$group111 = $_POST['group111'];
$group12 = $_POST['group12'];
$group13 = $_POST['group13'];
$txtContratacionDeseada = $_POST['txtContratacionDeseada'];
$txtCandidatoInterno = $_POST['txtCandidatoInterno'];



$response = new stdClass();
$sql = "INSERT INTO Requisiciones (
	FechaElaboracion,
	NombreSolicitante,
	DepartamentoSolicitante,
	PuestoSolicitante,
	GerenciaSolicitante,
	PuestoSolicitado,
	JefeInmediato,
	PuestoJefeInmediato,
	OrigenVacante,
	TipoContrato,
	ContratoMeses,
	ObjetivoPuesto,
	Edad,
	Sexo,
	Escolaridad,
	ConocimientosTeoricos,
	Idioma1,
	PorcentajeIdioma1,
	Idioma2,
	PorcentajeIdioma2,
	Experiencia,
	ConocimientosPracticos,
	DisponibilidadViajar,
	PorcentajeTiempoViajar,
	DisponibilidadCambioResidencia,
	CapacidadIntelectual,
	IniciativayEmpuje,
	ManejodePersonal,
	TomadeDesiciones,
	RelacionesInterpersonales,
	EstabilidadEmocional,
	ToleranciaPresion,
	Organizacion,
	ApegoaNormas,
	FechaDeseadaContratacion,
	NombreCandidatoInterno,
	Estatus
) 
VALUES (
	getdate(),
	'$nombre',
	'$departamento',
	'$puesto',
	'$gerencia',
	'$txtPuestoSolicitado',
	'$txtNombreJefeInmediato',
	'$txtPuestoJefeInmediato',
	'$group1',
	'$group2',
	'$txtMeses',
	'$txtObjetivo',
	'$txtEdad',
	'$txtSexo',
	'$txtEscolaridad',
	'$txtConocimientosT',
	'$txtidioma1',
	'$txtPorIdi1',
	'$txtidioma2',
	'$txtPorIdi2',
	'$txtExperiencia',
	'$txtConocimientosP',
	'$group3',
	'$txtViajarTiempo',
	'$group4',
	'$group5',
	'$group6',
	'$group7',
	'$group8',
	'$group9',
	'$group10',
	'$group111',
	'$group12',
	'$group13',
	'$txtContratacionDeseada',
	'$txtCandidatoInterno',
	'PENDIENTE'
)";

$stmt = sqlsrv_query($conn,$sql);

if ($stmt) 
{
    $response->validacion = true;
}
else
{
	$response->validacion = false;
}


echo json_encode($response);

