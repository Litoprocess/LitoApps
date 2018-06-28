<?php session_start();
include 'conexion.php';

$sql = "SELECT * FROM Inventario";
$stmt = sqlsrv_query($conn,$sql);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	switch ($row['Puesto']) {
		case 'ADD': 
		$puesto = 'Administrador de Datos';
		break;
		case 'AL': 
		$puesto = 'Almacenista';
		break;
		case 'ADM': 
		$puesto = 'Analista de Metodos';
		break;
		case 'AR': 
		$puesto = 'Arreglista';
		break;
		case 'AIP': 
		$puesto = 'Asesor In Plant';
		break;
		case 'ACH': 
		$puesto = 'Asistente de Capital Humano';
		break;
		case 'ACD': 
		$puesto = 'Auditor de Calidad';
		break;
		case 'AA': 
		$puesto = 'Auxiliar Administrativo';
		break;
		case 'AC': 
		$puesto = 'Auxiliar Contable';
		break;
		case 'ACS': 
		$puesto = 'Auxiliar de Compras';
		break;
		case 'ALA': 
		$puesto = 'Auxiliar de Logistica';
		break;
		case 'AE': 
		$puesto = 'Ayudante';
		break;
		case 'CR': 
		$puesto = 'Comprador';
		break;
		case 'CO': 
		$puesto = 'Consejero';
		break;
		case 'CMS': 
		$puesto = 'Coordinador de Materiales';
		break;
		case 'CPP': 
		$puesto = 'Coordinador de Preprensa';
		break;
		case 'COR': 
		$puesto = 'Coortador';
		break;
		case 'COT': 
		$puesto = 'Cotizador';
		break;
		case 'CXC': 
		$puesto = 'Cuentas por Cobrar';
		break;
		case 'CXP': 
		$puesto = 'Cunetas por Pagar';
		break;
		case 'DNN': 
		$puesto = 'D.Nuevos Negocios';
		break;
		case 'DS': 
		$puesto = 'Desarrollador de Software';
		break;
		case 'DR': 
		$puesto = 'Dise±ador';
		break;
		case 'EV': 
		$puesto = 'Ejecutivo de Ventas';
		break;
		case 'EO': 
		$puesto = 'Electromecanico';
		break;
		case 'ES': 
		$puesto = 'Envios';
		break;
		case 'FN': 
		$puesto = 'Facturacion';
		break;
		case 'FR': 
		$puesto = 'Feeder';
		break;
		case 'GA': 
		$puesto = 'Gerente Administrativa';
		break;
		case 'GC': 
		$puesto = 'Gerente de Calidad';
		break;
		case 'GCH': 
		$puesto = 'Gerente de Capital Humano';
		break;
		case 'GO': 
		$puesto = 'Gerente de Operaciones';
		break;
		case 'GS': 
		$puesto = 'Gerente de Sistemas';
		break;
		case 'GSC': 
		$puesto = 'Gerente de Sistemas de Calidad';
		break;
		case 'IP': 
		$puesto = 'Ingeniero Procesos';
		break;
		case 'ID': 
		$puesto = 'Integracion y Desarrollo';
		break;
		case 'JE': 
		$puesto = 'Jefe de Embarques';
		break;
		case 'JLVW': 
		$puesto = 'Jefe de Literatura VW';
		break;
		case 'JM': 
		$puesto = 'Jefe de Mantenimiento';
		break;
		case 'JO': 
		$puesto = 'Jefe de Operaciones';
		break;
		case 'JP': 
		$puesto = 'Jefe de Preprensa';
		break;
		case 'JPR': 
		$puesto = 'Jefe de Produccion';
		break;
		case 'KAM': 
		$puesto = 'Key Account Manager';
		break;
		case 'ME': 
		$puesto = 'Mecanico';
		break;
		case 'MC': 
		$puesto = 'Mesa de Control';
		break;
		case 'MO': 
		$puesto = 'Montacarguista';
		break;
		case 'UN': 
		$puesto = 'Nuberas';
		break;
		case 'OOP': 
		$puesto = 'Obligaciones Obrero-Patronales';
		break;
		case 'OP': 
		$puesto = 'Operador';
		break;
		case 'OS': 
		$puesto = 'Operador SAM';
		break;
		case 'PP': 
		$puesto = 'Planeador de Produccion';
		break;
		case 'RE': 
		$puesto = 'Recepcionista';
		break;
		case 'SE': 
		$puesto = 'Secretaria';
		break;
		case 'SEH': 
		$puesto = 'Seguridad e Higiene';
		break;
		case 'SSI': 
		$puesto = 'Soporte de Sistemas Intelisis';
		break;
		case 'ST': 
		$puesto = 'SoporteTecnico';
		break;
		case 'SB': 
		$puesto = 'Subcontador';
		break;
		case 'SU': 
		$puesto = 'Supervisor';
		break;
		case '': 
		$puesto = '';
		break;		
		default:
		$puesto = '';
		break;
	}

	if($row['Departamento'] == '')
	{
		$departamento = "";
	} else {
		$departamento = $row['Departamento'];
	}

	if($row['TipoEquipo'] == '')
	{
		$tipoequipo = "";
	} else {
		$tipoequipo = $row['TipoEquipo'];
	}	

	$arreglo[]=array(

		'idequipo'=>$row['Id_Equipo'],
		'#'=>"<a href='php/editarInventario.php?id_equipo=". $row['Id_Equipo'] ."'><i class='material-icons'>edit</i></a>",	
		'usuario'=>$row['Usuario'],
		'correo'=>$row['Correo'],
		'departamento' => $departamento,
		'puesto'=> $puesto,
		'tipoequippo'=>$tipoequipo,
		'especpu'=>$row['DescCPU'],
		'seriecpu'=>$row['SerieCPU'],
		'espemonitor'=>$row['DescMonitor'],
		'seriemonitor'=>$row['SerieMonitor'],
		'espeteclado'=>$row['DescTeclado'],
		'serieteclado'=>$row['SerieTeclado'],
		'esperaton'=>$row['DescRaton'],
		'serieraton'=>$row['SerieRaton'],
		'espebocinas'=>$row['DescBocinas'],
		'seriebocinas'=>$row['SerieBocinas'],
		'espelector'=>$row['DescLector'],
		'serielector'=>$row['SerieLector'],
		'descimpresion'=>$row['DescImpresion1'],
		'ipimpresion'=>$row['IPImpresion1'],
		'descimpresion2'=>$row['DescImpresion2'],
		'ipimpresion2'=>$row['IPImpresion2'],
		'macethernet'=>$row['MACEthernet'],
		'ipethernet'=>$row['IPEthernet'],
		'macwifi'=>$row['MACWifi'],
		'ipwifi'=>$row['IPWifi'],
		'sistope'=>$row['SistemaOperativo'],
		'sistopelicencia'=>$row['SOLicencia'],
		'sistopeobs'=>$row['SO_Observaciones'],
		'sistopeinternet'=>$row['Internet'],
		'versionoffice'=>$row['VersionOffice'],
		'ofilicencia'=>$row['SerieOffice'],
		'ofiobserva'=>$row['ObservacionesOffice'],
		'insword'=>$row['Word'],
		'insexcel'=>$row['Excel'],
		'inspower'=>$row['PowerPoint'],
		'insoutlook'=>$row['Outlook'],
		'insvisio'=>$row['Visio'],
		'insproyect'=>$row['Proyect'],
		'clicorreo'=>$row['ClienteCorreo'],
		'reqfirma'=>$row['FirmaCorreo'],
		'insintelisis'=>$row['Intelisis'],
		'insapontar'=>$row['Apontar'],
		'insjobtrack'=>$row['JobTrack'],
		'insjtmonitor'=>$row['JTMonitor'],
		'insplanner'=>$row['Planner'],
		'printware'=>$row['PrintWare'],
		'inscrece'=>$row['Crece'],
		'inschrome'=>$row['Chrome'],
		'insexplorer'=>$row['Explorer'],
		'insfirefox'=>$row['Firefox'],
		'inssafari'=>$row['Safari'],
		'insdbemetrics'=>$row['DBEMetrics'],
		'insdbeintelisis'=>$row['DBEIntelisis'],
		'insreader'=>$row['AcrReader'],
		'insacrpro'=>$row['AcrPRO'],
		'insphotoshop'=>$row['Photoshop'],
		'insilustrator'=>$row['Ilustrator'],
		'insindesign'=>$row['InDisign'],
		'insdream'=>$row['Dreamwever'],
		'insstarbucks'=>$row['Starbucks'],
		'inskrispy'=>$row['KrispyKreme'],
		'insdbxtra'=>$row['DBxtra'],
		'inssaam'=>$row['SAAM'],
		'insdots'=>$row['DOTS'],
		'insmesacontrol'=>$row['MesaControl'],
		'insidashboards'=>$row['iDashBoards'],
		'inscotizador'=>$row['Cotizador'],
		'otroapp1'=>$row['OtroApp1Desc'],
		'insotroapp1'=>$row['OtroApp1'],
		'otroapp2'=>$row['OtroApp2Desc'],
		'insotroapp2'=>$row['OtroApp2'],
		'inspdfeditor'=>$row['PdfEditor'],
		'insitunes'=>$row['iTunes'],
		'inskies'=>$row['Kies'],
		'inslabmatrixs'=>$row['LabelMatrics'],
		'antivirus'=>$row['TipoAntivirus'],
		'insantivirus'=>$row['Antivirus'],
		'escaner'=>$row['TipoEscaner'],
		'insescaner'=>$row['Escaner'],
		'herrotro1'=>$row['OtroHerramienta1Desc'],
		'insotroherr1'=>$row['OtroHerramienta1'],
		'herrotro2'=>$row['OtroHerramienta2Desc'],
		'insotroherr2'=>$row['OtroHerramienta2'],
		'herrotro3'=>$row['OtroHerramienta3Desc'],
		'insotroherr3'=>$row['OtroHerramienta3'],
		'unidad1'=>$row['UnidadRed1'],
		'ruta1'=>$row['RutaRed1'],
		'unidad2'=>$row['UnidadRed2'],
		'ruta2'=>$row['RutaRed2'],
		'unidad3'=>$row['UnidadRed3'],
		'ruta3'=>$row['RutaRed3'],
		'unidad4'=>$row['UnidadRed4'],
		'ruta4'=>$row['RutaRed4'],
		'unidad5'=>$row['UnidadRed5'],
		'ruta5'=>$row['RutaRed5'],
		'unidad6'=>$row['UnidadRuta6'],
		'ruta6'=>$row['RutaRed6'],
		'nstelefono'=>$row['NumSerieTelefono'],
		'extension'=>$row['Extension']
		);				
}


$response->data=$arreglo;
echo json_encode($response);
?>