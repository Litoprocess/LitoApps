<?php
include 'conexion.php';

$idequipo = $_POST['idequipo'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
//$fecha = $_POST['fecha'];
$especpu = $_POST['especpu'];
$seriecpu = $_POST['seriecpu'];
$espemonitor = $_POST['espemonitor'];
$seriemonitor = $_POST['seriemonitor'];
$espeteclado = $_POST['espeteclado'];
$serieteclado = $_POST['serieteclado'];
$esperaton = $_POST['esperaton'];
$serieraton = $_POST['serieraton'];
$espebocinas = $_POST['espebocinas'];
$seriebocinas = $_POST['seriebocinas'];
$espelector = $_POST['espelector'];
$serielector = $_POST['serielector'];
$descimpresion = $_POST['descimpresion'];
$ipimpresion = $_POST['ipimpresion'];
$descimpresion2 = $_POST['descimpresion2'];
$ipimpresion2 = $_POST['ipimpresion2'];
$macethernet = $_POST['macethernet'];
$ipethernet = $_POST['ipethernet'];
$macwifi = $_POST['macwifi'];
$ipwifi = $_POST['ipwifi'];
$sistopelicencia = $_POST['sistopelicencia'];
$sistopeobs = $_POST['sistopeobs'];
$ofilicencia = $_POST['ofilicencia'];
$ofiobserva = $_POST['ofiobserva'];
$otroapp1 = $_POST['otroapp1'];
$otroapp2 = $_POST['otroapp2'];
$antivirus = $_POST['antivirus'];
$escaner = $_POST['escaner'];
$herrotro1 = $_POST['herrotro1'];
$herrotro2 = $_POST['herrotro2'];
$herrotro3 = $_POST['herrotro3'];
$unidad1 = $_POST['unidad1'];
$ruta1 = $_POST['ruta1'];
$unidad2 = $_POST['unidad2'];
$ruta2 = $_POST['ruta2'];
$unidad3 = $_POST['unidad3'];
$ruta3 = $_POST['ruta3'];
$unidad4 = $_POST['unidad4'];
$ruta4 = $_POST['ruta4'];
$unidad5 = $_POST['unidad5'];
$ruta5 = $_POST['ruta5'];
$unidad6 = $_POST['unidad6'];
$ruta6 = $_POST['ruta6'];
$nstelefono = $_POST['nstelefono'];
$extension = $_POST['extension'];

	if($_POST['puesto'] == 'Ninguno')
	{
		$puesto = "";
	} else {
		$puesto = $_POST['puesto'];
	}	

		if($_POST['departamento'] == 'Ninguno')
	{
		$departamento = "";
	} else {
		$departamento = $_POST['departamento'];
	}

	if($_POST['tipoequippo'] == 'Ninguno')
	{
		$tipoequippo = "";
	} else {
		$tipoequippo = $_POST['tipoequippo'];
	}
	if($_POST['sistope'] == 'Ninguno')
	{
		$sistope = "No";
	} else {
		$sistope = $_POST['sistope'];
	}
	if($_POST['sistopeinternet'] == 'Ninguno')
	{
		$sistopeinternet = "No";
	} else {
		$sistopeinternet = $_POST['sistopeinternet'];
	}
	if($_POST['versionoffice'] == 'Ninguno')
	{
		$versionoffice = "No";
	} else {
		$versionoffice = $_POST['versionoffice'];
	}	
	if($_POST['insword'] == 'Ninguno')
	{
		$insword = "No";
	} else {
		$insword = $_POST['insword'];
	}
	if($_POST['insexcel'] == 'Ninguno')
	{
		$insexcel = "No";
	} else {
		$insexcel = $_POST['insexcel'];
	}
	if($_POST['inspower'] == 'Ninguno')
	{
		$inspower = "No";
	} else {
		$inspower = $_POST['inspower'];
	}
	if($_POST['insoutlook'] == 'Ninguno')
	{
		$insoutlook = "No";
	} else {
		$insoutlook = $_POST['insoutlook'];
	}
	if($_POST['insvisio'] == 'Ninguno')
	{
		$insvisio = "No";
	} else {
		$insvisio = $_POST['insvisio'];
	}
	if($_POST['insproyect'] == 'Ninguno')
	{
		$insproyect = "No";
	} else {
		$insproyect = $_POST['insproyect'];
	}
	if($_POST['clicorreo'] == 'Ninguno')
	{
		$clicorreo = "No";
	} else {
		$clicorreo = $_POST['clicorreo'];
	}
	if($_POST['reqfirma'] == 'Ninguno')
	{
		$reqfirma = "No";
	} else {
		$reqfirma = $_POST['reqfirma'];
	}
	if($_POST['insintelisis'] == 'Ninguno')
	{
		$insintelisis = "No";
	} else {
		$insintelisis = $_POST['insintelisis'];
	}	
	if($_POST['insapontar'] == 'Ninguno')
	{
		$insapontar = "No";
	} else {
		$insapontar = $_POST['insapontar'];
	}
	if($_POST['insjobtrack'] == 'Ninguno')
	{
		$insjobtrack = "No";
	} else {
		$insjobtrack = $_POST['insjobtrack'];
	}	
	if($_POST['insjtmonitor'] == 'Ninguno')
	{
		$insjtmonitor = "No";
	} else {
		$insjtmonitor = $_POST['insjtmonitor'];
	}
	if($_POST['insplanner'] == 'Ninguno')
	{
		$insplanner = "No";
	} else {
		$insplanner = $_POST['insplanner'];
	}
	if($_POST['insprintware'] == 'Ninguno')
	{
		$insprintware = "No";
	} else {
		$insprintware = $_POST['insprintware'];
	}	
		if($_POST['inscrece'] == 'Ninguno')
	{
		$inscrece = "No";
	} else {
		$inscrece = $_POST['inscrece'];
	}
	if($_POST['inschrome'] == 'Ninguno')
	{
		$inschrome = "No";
	} else {
		$inschrome = $_POST['inschrome'];
	}
	if($_POST['insexplorer'] == 'Ninguno')
	{
		$insexplorer = "No";
	} else {
		$insexplorer = $_POST['insexplorer'];
	}					
	if($_POST['insfirefox'] == 'Ninguno')
	{
		$insfirefox = "No";
	} else {
		$insfirefox = $_POST['insfirefox'];
	}	
	if($_POST['inssafari'] == 'Ninguno')
	{
		$inssafari = "No";
	} else {
		$inssafari = $_POST['inssafari'];
	}		
	if($_POST['insdbemetrics'] == 'Ninguno')
	{
		$insdbemetrics = "No";
	} else {
		$insdbemetrics = $_POST['insdbemetrics'];
	}
	if($_POST['insdbeintelisis'] == 'Ninguno')
	{
		$insdbeintelisis = "No";
	} else {
		$insdbeintelisis = $_POST['insdbeintelisis'];
	}
	if($_POST['insreader'] == 'Ninguno')
	{
		$insreader = "No";
	} else {
		$insreader = $_POST['insreader'];
	}			
	if($_POST['insacrpro'] == 'Ninguno')
	{
		$insacrpro = "No";
	} else {
		$insacrpro = $_POST['insacrpro'];
	}
	if($_POST['insphotoshop'] == 'Ninguno')
	{
		$insphotoshop = "No";
	} else {
		$insphotoshop = $_POST['insphotoshop'];
	}	
	if($_POST['insilustrator'] == 'Ninguno')
	{
		$insilustrator = "No";
	} else {
		$insilustrator = $_POST['insilustrator'];
	}
	if($_POST['insindesign'] == 'Ninguno')
	{
		$insindesign = "No";
	} else {
		$insindesign = $_POST['insindesign'];
	}
	if($_POST['insdream'] == 'Ninguno')
	{
		$insdream = "No";
	} else {
		$insdream = $_POST['insdream'];
	}
	if($_POST['insstarbucks'] == 'Ninguno')
	{
		$insstarbucks = "No";
	} else {
		$insstarbucks = $_POST['insstarbucks'];
	}
	if($_POST['inskrispy'] == 'Ninguno')
	{
		$inskrispy = "No";
	} else {
		$inskrispy = $_POST['inskrispy'];
	}		
	if($_POST['insdbxtra'] == 'Ninguno')
	{
		$insdbxtra = "No";
	} else {
		$insdbxtra = $_POST['insdbxtra'];
	}
	if($_POST['inssaam'] == 'Ninguno')
	{
		$inssaam = "No";
	} else {
		$inssaam = $_POST['inssaam'];
	}
	if($_POST['insdots'] == 'Ninguno')
	{
		$insdots = "No";
	} else {
		$insdots = $_POST['insdots'];
	}
	if($_POST['insmesacontrol'] == 'Ninguno')
	{
		$insmesacontrol = "No";
	} else {
		$insmesacontrol = $_POST['insmesacontrol'];
	}	
	if($_POST['insidashboards'] == 'Ninguno')
	{
		$insidashboards = "No";
	} else {
		$insidashboards = $_POST['insidashboards'];
	}
	if($_POST['inscotizador'] == 'Ninguno')
	{
		$inscotizador = "No";
	} else {
		$inscotizador = $_POST['inscotizador'];
	}
	if($_POST['insotroapp1'] == 'Ninguno')
	{
		$insotroapp1 = "No";
	} else {
		$insotroapp1 = $_POST['insotroapp1'];
	}
	if($_POST['insotroapp2'] == 'Ninguno')
	{
		$insotroapp2 = "No";
	} else {
		$insotroapp2 = $_POST['insotroapp2'];
	}
	if($_POST['inspdfeditor'] == 'Ninguno')
	{
		$inspdfeditor = "No";
	} else {
		$inspdfeditor = $_POST['inspdfeditor'];
	}
	if($_POST['insitunes'] == 'Ninguno')
	{
		$insitunes = "No";
	} else {
		$insitunes = $_POST['insitunes'];
	}
	if($_POST['inskies'] == 'Ninguno')
	{
		$inskies = "No";
	} else {
		$inskies = $_POST['inskies'];
	}
	if($_POST['inslabmatrixs'] == 'Ninguno')
	{
		$inslabmatrixs = "No";
	} else {
		$inslabmatrixs = $_POST['inslabmatrixs'];
	}
	if($_POST['insantivirus'] == 'Ninguno')
	{
		$insantivirus = "No";
	} else {
		$insantivirus = $_POST['insantivirus'];
	}
	if($_POST['insescaner'] == 'Ninguno')
	{
		$insescaner = "No";
	} else {
		$insescaner = $_POST['insescaner'];
	}
	if($_POST['insotroherr1'] == 'Ninguno')
	{
		$insotroherr1 = "No";
	} else {
		$insotroherr1 = $_POST['insotroherr1'];
	}
	if($_POST['insotroherr2'] == 'Ninguno')
	{
		$insotroherr2 = "No";
	} else {
		$insotroherr2 = $_POST['insotroherr2'];
	}
	if($_POST['insotroherr3'] == 'Ninguno')
	{
		$insotroherr3 = "No";
	} else {
		$insotroherr3 = $_POST['insotroherr3'];
	}

$sql = "UPDATE Inventario SET
Usuario = '$usuario',
Correo = '$correo',
Departamento = '$departamento',
Puesto = '$puesto',
TipoEquipo = '$tipoequippo',
DescCPU = '$especpu', 
SerieCPU = '$seriecpu',
DescMonitor = '$espemonitor',
SerieMonitor = '$seriemonitor',
DescTeclado = '$espeteclado',
SerieTeclado = '$serieteclado',
DescRaton = '$esperaton',
SerieRaton = '$serieraton',
DescBocinas = '$espebocinas',
SerieBocinas = '$seriebocinas',
DescLector = '$espelector',
SerieLector = '$serielector',
DescImpresion1 = '$descimpresion', 
IPImpresion1 ='$ipimpresion',
DescImpresion2 = '$descimpresion2',
IPImpresion2 = '$ipimpresion2', 
MACEthernet = '$macethernet',
IPEthernet = '$ipethernet', 
MACWifi = '$macwifi', 
IPWifi = '$ipwifi',
SistemaOperativo = '$sistope',
SOLicencia = '$sistopelicencia',
SO_Observaciones = '$sistopeobs',
Internet = '$sistopeinternet',
VersionOffice = '$versionoffice',
SerieOffice = '$ofilicencia',
ObservacionesOffice = '$ofiobserva', 
Word = '$insword',
Excel = '$insexcel',
PowerPoint = '$inspower',
Outlook = '$insoutlook',
Visio = '$insvisio',
Proyect = '$insproyect',
ClienteCorreo = '$clicorreo',
FirmaCorreo = '$reqfirma',
Intelisis = '$insintelisis',
Apontar = '$insapontar',
JobTrack = '$insjobtrack',
JTMonitor = '$insjtmonitor',
Planner = '$insplanner',
PrintWare = '$insprintware',
Crece = '$inscrece',
Chrome = '$inschrome',
Explorer = '$insexplorer', 
Firefox = '$insfirefox',
Safari = '$inssafari',
DBEMetrics = '$insdbemetrics',
DBEIntelisis = '$insdbeintelisis',
AcrReader = '$insreader',
AcrPRO = '$insacrpro', 
Photoshop = '$insphotoshop',
Ilustrator = '$insilustrator',
InDisign = '$insindesign',
Dreamwever = '$insdream',
Starbucks = '$insstarbucks',
KrispyKreme = '$inskrispy',
DBxtra = '$insdbxtra',
SAAM = '$inssaam',
DOTS = '$insdots',
MesaControl = '$insmesacontrol',
iDashBoards = '$insidashboards',
Cotizador = '$inscotizador',
OtroApp1Desc = '$otroapp1',
OtroApp1 = '$insotroapp1',
OtroApp2Desc = '$otroapp2',
OtroApp2 = '$insotroapp2',
PdfEditor = '$inspdfeditor',
iTunes = '$insitunes',
Kies = '$inskies',
LabelMatrics = '$inslabmatrixs',
TipoAntivirus = '$antivirus',
Antivirus = '$insantivirus',
TipoEscaner = '$escaner',
Escaner = '$insescaner',
OtroHerramienta1Desc = '$herrotro1',
OtroHerramienta1 = '$insotroherr1',
OtroHerramienta2Desc = '$herrotro2',
OtroHerramienta2 = '$insotroherr2',
OtroHerramienta3Desc = '$herrotro3',
OtroHerramienta3 = '$insotroherr3',
UnidadRed1 = '$unidad1',
RutaRed1 = '$ruta1',
UnidadRed2 = '$unidad2',
RutaRed2 = '$ruta2',
UnidadRed3 = '$unidad3',
RutaRed3 = '$ruta3',
UnidadRed4 = '$unidad4',
RutaRed4 = '$ruta4',
UnidadRed5 = '$unidad5',
RutaRed5 = '$ruta5',
UnidadRuta6 = '$unidad6',
RutaRed6 = '$ruta6',
NumSerieTelefono = '$nstelefono', 
Extension = '$extension' WHERE Id_Equipo = '$idequipo'";	
$stmt = sqlsrv_query($conn,$sql);

$response = new stdClass();
$response->validation="false";

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response->validation="true";
echo json_encode($response);

?>