<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$departamento = $_POST['departamento'];
$puesto = $_POST['puesto'];
$tipoequippo = $_POST['tipoequippo'];
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
$sistope = $_POST['sistope'];
$sistopelicencia = $_POST['sistopelicencia'];
$sistopeobs = $_POST['sistopeobs'];
$sistopeinternet = $_POST['sistopeinternet'];
$versionoffice = $_POST['versionoffice'];
$ofilicencia = $_POST['ofilicencia'];
$ofiobserva = $_POST['ofiobserva'];
$insword = $_POST['insword'];
$insexcel = $_POST['insexcel'];
$inspower = $_POST['inspower'];
$insoutlook = $_POST['insoutlook'];
$insvisio = $_POST['insvisio'];
$insproyect = $_POST['insproyect'];
$clicorreo = $_POST['clicorreo'];
$reqfirma = $_POST['reqfirma'];
$insintelisis = $_POST['insintelisis'];
$insapontar = $_POST['insapontar'];
$insjobtrack = $_POST['insjobtrack'];
$insjtmonitor = $_POST['insjtmonitor'];
$insplanner = $_POST['insplanner'];
$insprintware = $_POST['insprintware'];
$inscrece = $_POST['inscrece'];
$inschrome = $_POST['inschrome'];
$insexplorer = $_POST['insexplorer'];
$insfirefox = $_POST['insfirefox'];
$inssafari = $_POST['inssafari'];
$insdbemetrics = $_POST['insdbemetrics'];
$insdbeintelisis = $_POST['insdbeintelisis'];
$insreader = $_POST['insreader'];
$insacrpro = $_POST['insacrpro'];
$insphotoshop = $_POST['insphotoshop'];
$insilustrator = $_POST['insilustrator'];
$insindesign = $_POST['insindesign'];
$insdream = $_POST['insdream'];
$insstarbucks = $_POST['insstarbucks'];
$inskrispy = $_POST['inskrispy'];
$insdbxtra = $_POST['insdbxtra'];
$inssaam = $_POST['inssaam'];
$insdots = $_POST['insdots'];
$insmesacontrol = $_POST['insmesacontrol'];
$insidashboards = $_POST['insidashboards'];
$inscotizador = $_POST['inscotizador'];
$otroapp1 = $_POST['otroapp1'];
$insotroapp1 = $_POST['insotroapp1'];
$otroapp2 = $_POST['otroapp2'];
$insotroapp2 = $_POST['insotroapp2'];
$inspdfeditor = $_POST['inspdfeditor'];
$insitunes = $_POST['insitunes'];
$inskies = $_POST['inskies'];
$inslabmatrixs = $_POST['inslabmatrixs'];
$antivirus = $_POST['antivirus'];
$insantivirus = $_POST['insantivirus'];
$escaner = $_POST['escaner'];
$insescaner = $_POST['insescaner'];
$herrotro1 = $_POST['herrotro1'];
$insotroherr1 = $_POST['insotroherr1'];
$herrotro2 = $_POST['herrotro2'];
$insotroherr2 = $_POST['insotroherr2'];
$herrotro3 = $_POST['herrotro3'];
$insotroherr3 = $_POST['insotroherr3'];
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


$sql = "INSERT INTO Inventario VALUES ('$usuario', '$correo', '$departamento', '$puesto', '$tipoequippo', getdate(), '$especpu', '$seriecpu',
'$espemonitor', '$seriemonitor', '$espeteclado', '$serieteclado', '$esperaton', '$serieraton', '$espebocinas', '$seriebocinas', '$espelector',
'$serielector', '$descimpresion', '$ipimpresion', '$descimpresion2', '$ipimpresion2', '$macethernet', '$ipethernet', '$macwifi', '$ipwifi',
'$sistope','$sistopelicencia', '$sistopeobs', '$sistopeinternet', '$versionoffice', '$ofilicencia', '$ofiobserva', '$insword', '$insexcel', 
'$inspower', '$insoutlook', '$insvisio', '$insproyect', '$clicorreo',
'$reqfirma', '$insintelisis', '$insapontar', '$insjobtrack', '$insjtmonitor', '$insplanner', '$insprintware', '$inscrece', '$inschrome','$insexplorer', 
'$insfirefox', '$inssafari', '$insdbemetrics', '$insdbeintelisis', '$insreader', '$insacrpro', '$insphotoshop', '$insilustrator',
'$insindesign', '$insdream', '$insstarbucks', '$inskrispy', '$insdbxtra', '$inssaam', '$insdots', '$insmesacontrol', '$insidashboards',
'$inscotizador', '$otroapp1', '$insotroapp1', '$otroapp2', '$insotroapp2', '$inspdfeditor', '$insitunes', '$inskies', '$inslabmatrixs', '$antivirus',
'$insantivirus', '$escaner', '$insescaner', '$herrotro1', '$insotroherr1', '$herrotro2', '$insotroherr2', '$herrotro3', '$insotroherr3', '$unidad1',
'$ruta1', '$unidad2', '$ruta2', '$unidad3', '$ruta3', '$unidad4', '$ruta4', '$unidad5', '$ruta5', '$unidad6', '$ruta6', '$nstelefono', 
'$extension')";

		
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();

$response->validation="true";
echo json_encode($response);

?>