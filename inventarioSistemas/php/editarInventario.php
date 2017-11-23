<?php session_start();
include 'conexion.php';

$id = $_GET['id_equipo'];

$sql = "SELECT * FROM Inventario WHERE Id_Equipo = ?";
$params = array(&$id);
$stmt = sqlsrv_query($conn,$sql,$params);

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

$response = new stdClass();
$arreglo = array();

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	if($row['Puesto'] == '')
	{
		$puesto = "Ninguno";
	} else {
		$puesto = $row['Puesto'];
	}	

		if($row['Departamento'] == '')
	{
		$departamento = "Ninguno";
	} else {
		$departamento = $row['Departamento'];
	}

	if($row['TipoEquipo'] == '')
	{
		$tipoequipo = "Ninguno";
	} else {
		$tipoequipo = $row['TipoEquipo'];
	}
	if($row['SistemaOperativo'] == '')
	{
		$sistope = "Ninguno";
	} else {
		$sistope = $row['SistemaOperativo'];
	}
	if($row['Internet'] == '')
	{
		$internet = "Ninguno";
	} else {
		$internet = $row['Internet'];
	}
	if($row['VersionOffice'] == '')
	{
		$versionoffice = "Ninguno";
	} else {
		$versionoffice = $row['VersionOffice'];
	}	
	if($row['Word'] == '')
	{
		$word = "Ninguno";
	} else {
		$word = $row['Word'];
	}
	if($row['Excel'] == '')
	{
		$excel = "Ninguno";
	} else {
		$excel = $row['Excel'];
	}
	if($row['PowerPoint'] == '')
	{
		$power = "Ninguno";
	} else {
		$power = $row['PowerPoint'];
	}
	if($row['Outlook'] == '')
	{
		$outlook = "Ninguno";
	} else {
		$outlook = $row['Outlook'];
	}
	if($row['Visio'] == '')
	{
		$visio = "Ninguno";
	} else {
		$visio = $row['Visio'];
	}
	if($row['Proyect'] == '')
	{
		$project = "Ninguno";
	} else {
		$project = $row['Proyect'];
	}
	if($row['ClienteCorreo'] == '')
	{
		$clicorreo = "Ninguno";
	} else {
		$clicorreo = $row['ClienteCorreo'];
	}
	if($row['FirmaCorreo'] == '')
	{
		$firma = "Ninguno";
	} else {
		$firma = $row['FirmaCorreo'];
	}
	if($row['Intelisis'] == '')
	{
		$intelisis = "Ninguno";
	} else {
		$intelisis = $row['Intelisis'];
	}	
	if($row['Apontar'] == '')
	{
		$apontar = "Ninguno";
	} else {
		$apontar = $row['Apontar'];
	}
	if($row['JobTrack'] == '')
	{
		$jobtrack = "Ninguno";
	} else {
		$jobtrack = $row['JobTrack'];
	}	
	if($row['JTMonitor'] == '')
	{
		$jtmonitor = "Ninguno";
	} else {
		$jtmonitor = $row['JTMonitor'];
	}
	if($row['Planner'] == '')
	{
		$planner = "Ninguno";
	} else {
		$planner = $row['Planner'];
	}
	if($row['PrintWare'] == '')
	{
		$printware = "Ninguno";
	} else {
		$printware = $row['PrintWare'];
	}	
		if($row['Crece'] == '')
	{
		$crece = "Ninguno";
	} else {
		$crece = $row['Crece'];
	}
	if($row['Chrome'] == '')
	{
		$chrome = "Ninguno";
	} else {
		$chrome = $row['Chrome'];
	}
	if($row['Explorer'] == '')
	{
		$explorer = "Ninguno";
	} else {
		$explorer = $row['Explorer'];
	}					
	if($row['Firefox'] == '')
	{
		$firefox = "Ninguno";
	} else {
		$firefox = $row['Firefox'];
	}	
	if($row['Safari'] == '')
	{
		$safari = "Ninguno";
	} else {
		$safari = $row['Safari'];
	}		
	if($row['DBEMetrics'] == '')
	{
		$dbemetrics = "Ninguno";
	} else {
		$dbemetrics = $row['DBEMetrics'];
	}
	if($row['DBEIntelisis'] == '')
	{
		$dbeintelisis = "Ninguno";
	} else {
		$dbeintelisis = $row['DBEIntelisis'];
	}
	if($row['AcrReader'] == '')
	{
		$acrreader = "Ninguno";
	} else {
		$acrreader = $row['AcrReader'];
	}			
	if($row['AcrPRO'] == '')
	{
		$acrpro = "Ninguno";
	} else {
		$acrpro = $row['AcrPRO'];
	}
	if($row['Photoshop'] == '')
	{
		$photoshop = "Ninguno";
	} else {
		$photoshop = $row['Photoshop'];
	}	
	if($row['Ilustrator'] == '')
	{
		$ilustrator = "Ninguno";
	} else {
		$ilustrator = $row['Ilustrator'];
	}
	if($row['InDisign'] == '')
	{
		$indisign = "Ninguno";
	} else {
		$indisign = $row['InDisign'];
	}
	if($row['Dreamwever'] == '')
	{
		$dreamwever = "Ninguno";
	} else {
		$dreamwever = $row['Dreamwever'];
	}
	if($row['Starbucks'] == '')
	{
		$starbucks = "Ninguno";
	} else {
		$starbucks = $row['Starbucks'];
	}
	if($row['KrispyKreme'] == '')
	{
		$krispykreme = "Ninguno";
	} else {
		$krispykreme = $row['KrispyKreme'];
	}		
	if($row['DBxtra'] == '')
	{
		$dbxtra = "Ninguno";
	} else {
		$dbxtra = $row['DBxtra'];
	}
	if($row['SAAM'] == '')
	{
		$saam = "Ninguno";
	} else {
		$saam = $row['SAAM'];
	}
	if($row['DOTS'] == '')
	{
		$dots = "Ninguno";
	} else {
		$dots = $row['DOTS'];
	}
	if($row['MesaControl'] == '')
	{
		$mesacontrol = "Ninguno";
	} else {
		$mesacontrol = $row['MesaControl'];
	}	
	if($row['iDashBoards'] == '')
	{
		$idashboards = "Ninguno";
	} else {
		$idashboards = $row['iDashBoards'];
	}
	if($row['Cotizador'] == '')
	{
		$cotizador = "Ninguno";
	} else {
		$cotizador = $row['Cotizador'];
	}
	if($row['OtroApp1'] == '')
	{
		$otroapp1 = "Ninguno";
	} else {
		$otroapp1 = $row['OtroApp1'];
	}
	if($row['OtroApp2'] == '')
	{
		$otroapp2 = "Ninguno";
	} else {
		$otroapp2 = $row['OtroApp2'];
	}
	if($row['Cotizador'] == '')
	{
		$cotizador = "Ninguno";
	} else {
		$cotizador = $row['Cotizador'];
	}
	if($row['PdfEditor'] == '')
	{
		$pdfeditor = "Ninguno";
	} else {
		$pdfeditor = $row['PdfEditor'];
	}
	if($row['iTunes'] == '')
	{
		$itunes = "Ninguno";
	} else {
		$itunes = $row['iTunes'];
	}
	if($row['Kies'] == '')
	{
		$kies = "Ninguno";
	} else {
		$kies = $row['Kies'];
	}
	if($row['LabelMatrics'] == '')
	{
		$labelmetrics = "Ninguno";
	} else {
		$labelmetrics = $row['LabelMatrics'];
	}
	if($row['Antivirus'] == '')
	{
		$antivirus = "Ninguno";
	} else {
		$antivirus = $row['Antivirus'];
	}
	if($row['Escaner'] == '')
	{
		$escaner = "Ninguno";
	} else {
		$escaner = $row['Escaner'];
	}
	if($row['OtroHerramienta1'] == '')
	{
		$otroherramienta1 = "Ninguno";
	} else {
		$otroherramienta1 = $row['OtroHerramienta1'];
	}
	if($row['OtroHerramienta2'] == '')
	{
		$otroherramienta2 = "Ninguno";
	} else {
		$otroherramienta2 = $row['OtroHerramienta2'];
	}
	if($row['OtroHerramienta3'] == '')
	{
		$otroherramienta3 = "Ninguno";
	} else {
		$otroherramienta3 = $row['OtroHerramienta3'];
	}


		$_POST['id']=$row['Id_Equipo'];
		$_POST['usuario']=$row['Usuario'];
		$_POST['correo']=$row['Correo'];
		$_POST['departamento']= $departamento;
		$_POST['puesto']= $puesto;
		$_POST['tipoequippo']= $tipoequipo;
		$_POST['fecha']= $row['FechaRegistro'];
		$_POST['especpu']= $row['DescCPU'];
		$_POST['seriecpu']= $row['SerieCPU'];
		$_POST['espemonitor']= $row['DescMonitor'];
		$_POST['seriemonitor']= $row['SerieMonitor'];
		$_POST['espeteclado']= $row['DescTeclado'];
		$_POST['serieteclado']= $row['SerieTeclado'];
		$_POST['esperaton']= $row['DescRaton'];
		$_POST['serieraton']= $row['SerieRaton'];
		$_POST['espebocinas']= $row['DescBocinas'];
		$_POST['seriebocinas']= $row['SerieBocinas'];
		$_POST['espelector']= $row['DescLector'];
		$_POST['serielector']= $row['SerieLector'];
		$_POST['descimpresion']= $row['DescImpresion1'];
		$_POST['ipimpresion']= $row['IPImpresion1'];
		$_POST['descimpresion2']= $row['DescImpresion2'];
		$_POST['ipimpresion2']= $row['IPImpresion2'];
		$_POST['macethernet']= $row['MACEthernet'];
		$_POST['ipethernet']= $row['IPEthernet'];
		$_POST['macwifi']= $row['MACWifi'];
		$_POST['ipwifi']= $row['IPWifi'];
		$_POST['sistope']= $sistope;
		$_POST['sistopelicencia']= $row['SOLicencia'];
		$_POST['sistopeobs']= $row['SO_Observaciones'];
		$_POST['sistopeinternet']= $internet;
		$_POST['versionoffice']= $versionoffice;
		$_POST['ofilicencia']= $row['SerieOffice'];
		$_POST['ofiobserva']= $row['ObservacionesOffice'];
		$_POST['insword']= $word;
		$_POST['insexcel']= $excel;
		$_POST['inspower']= $power;
		$_POST['insoutlook']= $outlook;
		$_POST['insvisio']= $visio;
		$_POST['insproyect']= $project;
		$_POST['clicorreo']= $clicorreo;
		$_POST['reqfirma']= $firma;
		$_POST['insintelisis']= $intelisis;
		$_POST['insapontar']= $apontar;
		$_POST['insjobtrack']= $jobtrack;
		$_POST['insjtmonitor']= $jtmonitor;
		$_POST['insplanner']= $planner;
		$_POST['printware']= $printware;
		$_POST['inscrece']= $crece;
		$_POST['inschrome']= $chrome;
		$_POST['insexplorer']= $explorer;
		$_POST['insfirefox']= $firefox;
		$_POST['inssafari']= $safari;
		$_POST['insdbemetrics']= $dbemetrics;
		$_POST['insdbeintelisis']= $dbeintelisis;
		$_POST['insreader']= $acrreader;
		$_POST['insacrpro']= $acrpro;
		$_POST['insphotoshop']= $photoshop;
		$_POST['insilustrator']= $ilustrator;
		$_POST['insindesign']= $indisign;
		$_POST['insdream']= $dreamwever;
		$_POST['insstarbucks']= $starbucks;
		$_POST['inskrispy']= $krispykreme;
		$_POST['insdbxtra']= $dbxtra;
		$_POST['inssaam']= $saam;
		$_POST['insdots']= $dots;
		$_POST['insmesacontrol']= $mesacontrol;
		$_POST['insidashboards']= $idashboards;
		$_POST['inscotizador']= $cotizador;
		$_POST['otroapp1']= $row['OtroApp1Desc'];
		$_POST['insotroapp1']= $otroapp1;
		$_POST['otroapp2']= $row['OtroApp2Desc'];
		$_POST['insotroapp2']= $otroapp2;
		$_POST['inspdfeditor']= $pdfeditor;
		$_POST['insitunes']= $itunes;
		$_POST['inskies']= $kies;
		$_POST['inslabmatrixs']= $labelmetrics;
		$_POST['antivirus']= $row['TipoAntivirus'];
		$_POST['insantivirus']= $antivirus;
		$_POST['escaner']= $row['TipoEscaner'];
		$_POST['insescaner']= $escaner;
		$_POST['herrotro1']= $row['OtroHerramienta1Desc'];
		$_POST['insotroherr1']= $otroherramienta1;
		$_POST['herrotro2']= $row['OtroHerramienta2Desc'];
		$_POST['insotroherr2']= $otroherramienta2;
		$_POST['herrotro3']= $row['OtroHerramienta3Desc'];
		$_POST['insotroherr3']= $otroherramienta3;
		$_POST['unidad1']= $row['UnidadRed1'];
		$_POST['ruta1']= $row['RutaRed1'];
		$_POST['unidad2']= $row['UnidadRed2'];
		$_POST['ruta2']= $row['RutaRed2'];
		$_POST['unidad3']= $row['UnidadRed3'];
		$_POST['ruta3']= $row['RutaRed3'];
		$_POST['unidad4']= $row['UnidadRed4'];
		$_POST['ruta4']= $row['RutaRed4'];
		$_POST['unidad5']= $row['UnidadRed5'];
		$_POST['ruta5']= $row['RutaRed5'];
		$_POST['unidad6']= $row['UnidadRuta6'];
		$_POST['ruta6']= $row['RutaRed6'];
		$_POST['nstelefono']= $row['NumSerieTelefono'];
		$_POST['extension']= $row['Extension'];

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="Autor" content=" Ing.Sergio Andres Garcia Vazquez">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="png" href="../../img/favicon.png" />   
  <link type="text/css" rel="stylesheet" href="../../css/jquery.dataTables.min.css"/>
  <link type="text/css" rel="stylesheet" href="../../css/materialize.css" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../css/estilosInventario.css">  
  <title>Inventario Sistrmas</title>
</head>
<body>

  <header>
    <nav class="indigo darken-4">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Inventario Sistemas</a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <!--li class="active"><a href="inventario.php">Inventario</a></li-->
          <li class="active"><a href="../detalle.php">Detalle</a></li>
        </ul>
        <ul class="side-nav" id="slide-out">
          <li>
            <div class="userView">
              <div class="background">
                <img src="../../images/lito-planta.jpg" class="responsive-img">
              </div>
              <!--a href="#!user"><img class="circle" src="images/yuna.jpg"></a-->
              <a href="#!name">
                <span class="white-text name">
                  <?php echo $_SESSION["NombreUsuario"];?>
                </span>
              </a>
              <a href="#!email">
                <span class="white-text email">
                  <?php echo $_SESSION["Departamento"];?>
                </span>
              </a>
            </div>
          </li>
          <!--li class="active"><a href="inventario.php">Inventario</a></li-->
          <li><a href="../detalle.php">Detalle</a></li>                 
          <li><div class="divider"></div></li>                        
          <li class="bold" id="aside-atras"><a href="../../" id="nav-tickets3">Atras</a></li>
          <li><div class="divider"></div></li>                                               
          <li><a href="../../cerrar.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>  

		<aside>
			<ul id="slide-out" class="side-nav fixed">
				<li class="logo">
					<a id="logo-container" href="#" class="brand-logo">
						<object id="front-page-logo" type="image/png" data="../../img/logo_b.png"></object>
					</a>
				</li>
				<li><div class="divider"></div></li>
				<li class="bold">
					<a href="../../index.php" id="nav-app">
						<i class="material-icons">home</i>Página principal
					</a>
				</li>
				<li><div class="divider"></div></li>
				<li class="bold" id="aside-tickets">
					<a href="../../tickets/index.php" id="nav-app1">
						<i class="material-icons red-text text-darken-4"><img src="../../icons/tickets.png" alt="Tickets" width="25"></i>Tickets
					</a>
				</li>
				<li class="bold" id="aside-directorio">
					<a href="../../directorio/directorio.php" id="nav-app2">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/directorio.png" alt="" width="25"></i>Directorio
					</a>
				</li>    
				<li class="bold" id="aside-libera">
					<a href="../../liberaTipo.php" id="nav-app3">
						<i class="material-icons green-text text-darken-4"><img src="../../icons/liberacion.png" alt="" width="25"></i>Liberacion
					</a>
				</li>
				<li class="bold" id="aside-controlm">
					<a href="../../muestrasTipo.php" id="nav-app4">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/control_muestras.png" alt="" width="25"></i>Muestras
					</a>
				</li>    
				<li class="bold" id="aside-muestreo">
					<a href="../../muestreoTipo.php" id="nav-app5">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/muestreo_bd.png" alt="" width="25"></i>Muestreo BDD
					</a>
				</li>
				<li class="bold" id="aside-acabadom">
					<a href="../../acabadomTipo.php" id="nav-app6">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/acabado_manual.png" alt="" width="25"></i>Acabado Manual
					</a>
				</li>
				<li class="bold" id="aside-reprocesos">
					<a href="../../reprocesosTipo.php" id="nav-app7">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/reprocesos.png" alt="" width="25"></i>Reprocesos
					</a>
				</li>
				<li class="bold" id="aside-iDashboards">
					<a href="http://192.168.2.217:8080/idashboards/" target="_blank" id="nav-app8">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/idashboard.jpg" alt="" width="25"></i>iDashboards
					</a>
				</li>
				<li class="bold" id="aside-dbxtra">
					<a href="http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank" id="nav-app9">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/dbxtra.png" alt="" width="25"></i>DBxtra
					</a>
				</li>    
				<li class="bold" id="aside-krispykreme">
					<a href="http://192.168.2.211:8080/KryspyKreme/public/login" target="_blank" id="nav-app10">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/krispykreme.png" alt="" width="25"></i>Krispy kreme
					</a>
				</li> 
				<li class="bold" id="aside-starbucks">
					<a href="http://192.168.2.211:8080/starbucks/public/login" target="_blank" id="nav-app11">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/starbucks.png" alt="" width="25"></i>Starbucks
					</a>
				</li>
				<li class="bold" id="aside-starbucks2">
					<a href="http://192.168.2.211:8080/starbucks2/public/login" target="_blank" id="nav-app12">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/starbucks2.png" alt="" width="25"></i>Starbucks2
					</a>
				</li> 
				<li class="bold" id="aside-capacitacion">
					<a href="../../capacitacionTipo.php" id="nav-app13">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/capacitacion.png" alt="" width="25"></i>Capacitación
					</a>
				</li>
				<li class="bold" id="aside-inventario">
					<a href="../../inventarioTipo.php" id="nav-app14">
						<i class="material-icons blue-text text-darken-4"><img src="../../icons/inventario_sistemas.png" alt="" width="25"></i>Inventario
					</a>
				</li>                     
				<li><div class="divider"></div></li>
				<li class="bold" id="aside-atras">
					<a href="../../" id="nav-tickets3">
						<i class="material-icons">arrow_back</i>Atras
					</a>
				</li>    
				<li class="bold">
					<a href="../../cerrar.php" id="nav-tickets1">
						<i class="material-icons">exit_to_app</i>Salir
					</a>
				</li>
			</ul>
		</aside>
  </header>

<main class="container">
  <div class="row">
    <form id="frmActualizarInventario" method="POST">
      <ul class="collapsible grey lighten-4" data-collapsible="expandible">
        <!--DATOS DEL USUARIO-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">account_circle</i>Datos del Usuario</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="input-field col s1">
                <input id="idequipo" name="idequipo" type="text" class="validate" value="<?php echo $_POST['id']; ?>" style="text-align: center;" readonly>
                <label for="idequipo">No.Equipo</label>
              </div>              	
              <div class="input-field col s2">
                <input id="usuario" name="usuario" type="text" class="validate" value="<?php echo $_POST['usuario']; ?>">
                <label for="usuario">Usuario</label>
              </div>    

              <div class="input-field col s2">
                <input id="correo" name="correo" type="text" class="validate" value="<?php echo $_POST['correo']; ?>">
                <label for="correo">Correo</label>
              </div>    

              <div class="col s2">
                <label for="departamento">Departamento</label>
                <select id="departamento" name="departamento" class="browser-default" required>
                  <option value="Ninguno" selected>Elije una opción</option>
                  <option value="AcabadoLiteratura">Acabado de Literatura</option>
                  <option value="AcabadoLitografia">Acabado de Litografia</option>
                  <option value="AcabadoManual">Acabado Manual</option>
                  <option value="AcabadosEspeciales">Acabados Especiales</option>
                  <option value="Administracion">Administración</option>
                  <option value="AlmacenMP">Almacen MP</option>
                  <option value="Calidad">Calidad</option>
                  <option value="CapitalHumano">Capital Humano</option>
                  <option value="Compras">Compras</option>
                  <option value="Direccion">Direccion</option>
                  <option value="Embarques">Embarques</option>
                  <option value="ImpresionDigital">Impresion Digital</option>
                  <option value="Mantenimiento">Mantenimiento</option>
                  <option value="Offset">Offset</option>
                  <option value="Preprensa">Preprensa</option>
                  <option value="Produccion">Producción</option>
                  <option value="Sistemas">Sistemas</option>
                  <option value="Ventas">Ventas</option>                                                                                                                                                                                                                      

                </select>
              </div>   

              <div class="col s2">
                <label for="puesto">Puesto</label>
                <select id="puesto" name="puesto" class="browser-default" required>
                  <option value="Ninguno" selected>Elije una opción</option>
					<option value='ADD'>Administrador de Datos</option>
					<option value='AL'>Almacenista</option>
					<option value='ADM'>Analista de Metodos</option>
					<option value='AR'>Arreglista</option>
					<option value='AIP'>Asesor In Plant</option>
					<option value='ACH'>Asistente de Capital Humano</option>
					<option value='ACD'>Auditor de Calidad</option>
					<option value='AA'>Auxiliar Administrativo</option>
					<option value='AC'>Auxiliar Contable</option>
					<option value='ACS'>Auxiliar de Compras</option>
					<option value='ALA'>Auxiliar de Logistica</option>
					<option value='AE'>Ayudante</option>
					<option value='CR'>Comprador</option>
					<option value='CO'>Consejero</option>
					<option value='CMS'>Coordinador de Materiales</option>
					<option value='CPP'>Coordinador de Preprensa</option>
					<option value='COR'>Coortador</option>
					<option value='COT'>Cotizador</option>
					<option value='CXC'>Cuentas por Cobrar</option>
					<option value='CXP'>Cunetas por Pagar</option>
					<option value='DG'>Director General</option>
					<option value='DNN'>D.Nuevos Negocios</option>
					<option value='DS'>Desarrollador de Software</option>
					<option value='DR'>Diseñador</option>
					<option value='EV'>Ejecutivo de Ventas</option>
					<option value='EO'>Electromecanico</option>
					<option value='ES'>Envios</option>
					<option value='FN'>Facturacion</option>
					<option value='FR'>Feeder</option>
					<option value='GA'>Gerente Administrativa</option>
					<option value='GC'>Gerente de Calidad</option>
					<option value='GCH'>Gerente de Capital Humano</option>
					<option value='GO'>Gerente de Operaciones</option>
					<option value='GS'>Gerente de Sistemas</option>
					<option value='GSC'>Gerente de Sistemas de Calidad</option>
					<option value='IP'>Ingeniero Procesos</option>
					<option value='ID'>Integracion y Desarrollo</option>
					<option value='JE'>Jefe de Embarques</option>
					<option value='JLVW'>Jefe de Literatura VW</option>
					<option value='JM'>Jefe de Mantenimiento</option>
					<option value='JO'>Jefe de Operaciones</option>
					<option value='JP'>Jefe de Preprensa</option>
					<option value='JPR'>Jefe de Produccion</option>
					<option value='KAM'>Key Account Manager</option>
					<option value='ME'>Mecanico</option>
					<option value='MC'>Mesa de Control</option>
					<option value='MO'>Montacarguista</option>
					<option value='UN'>Nuberas</option>
					<option value='OOP'>Obligaciones Obrero-Patronales</option>
					<option value='OP'>Operador</option>
					<option value='OS'>Operador SAM</option>
					<option value='PP'>Planeador de Produccion</option>
					<option value='RE'>Recepcionista</option>
					<option value='SE'>Secretaria</option>
					<option value='SEH'>Seguridad e Higiene</option>
					<option value='SSI'>Soporte de Sistemas Intelisis</option>
					<option value='ST'>SoporteTecnico</option>
					<option value='SB'>Subcontador</option>
					<option value='SU'>Supervisor</option>                                                              
                </select>
              </div>    

              <div class="col s2">
                <label for="tipoequippo">Tipo de Equipo</label>
                <select id="tipoequippo" name="tipoequippo" class="browser-default" required>
                  <option value="Ninguno" selected>Elije una opción</option>
                  <option value="EscritorioPC">Escritorio PC</option>
                  <option value="EscritorioMAC">Escritorio MAC</option>                  
                  <option value="LaptopPC">Laptop PC</option>
                  <option value="LaptopMAC">Laptop  MAC</option>
                  <option value="Terminal">Terminal</option>
                  <option value="Otro">Otro</option>                  
                </select>
              </div> 
              <!--div class="col s2"> Fecha Registro: <?php //echo $_POST['fecha']; ?></div-->   
            </div>                    

          </div>
        </li>
        <!-- /DATOS DEL USUARIO-->
        <!--ESPECIFICACIONES DEL EQUIPO-->
        <li> 
          <div class="collapsible-header active"><i class="material-icons">settings</i>Especificaciones del Equipo</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="offset-s2 col s5">
                <p>Descripción</p>
              </div>
              <div class="col s5">
                <p>Número de Serie</p>
              </div>                  

              <div class="col s2">
                <label>CPU</label>
              </div>
              <div class="input-field col s5">
                <input id="especpu" name="especpu" type="text" value="<?php echo $_POST['especpu']; ?>" class="validate chiquito">
                <label for="especpu"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriecpu" name="seriecpu" type="text" class="validate chiquito" value="<?php echo $_POST['seriecpu']; ?>">
                <label for="seriecpu"></label>
              </div>     

              <div class="col s2">
                <label>Monitor</label>
              </div>
              <div class="input-field col s5">
                <input id="espemonitor" name="espemonitor" type="text" class="validate chiquito" value="<?php echo $_POST['espemonitor']; ?>">
                <label for="espemonitor"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriemonitor" name="seriemonitor" type="text" class="validate chiquito" value="<?php echo $_POST['seriemonitor']; ?>">
                <label for="seriemonitor"></label>
              </div>     

              <div class="col s2">
                <label>Teclado</label>
              </div>
              <div class="input-field col s5">
                <input id="espeteclado" name="espeteclado" type="text" class="validate chiquito" value="<?php echo $_POST['espeteclado']; ?>">
                <label for="espeteclado"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serieteclado" name="serieteclado" type="text" class="validate chiquito" value="<?php echo $_POST['serieteclado']; ?>">
                <label for="serieteclado"></label>
              </div>     

              <div class="col s2">
                <label>Ratón</label>
              </div>
              <div class="input-field col s5">
                <input id="esperaton" name="esperaton" type="text" class="validate chiquito" value="<?php echo $_POST['esperaton']; ?>">
                <label for="esperaton"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serieraton" name="serieraton" type="text" class="validate chiquito" value="<?php echo $_POST['serieraton']; ?>">
                <label for="serieraton"></label>
              </div>     

              <div class="col s2">
                <label>Bocinas</label>
              </div>
              <div class="input-field col s5">
                <input id="espebocinas" name="espebocinas" type="text" class="validate chiquito" value="<?php echo $_POST['espebocinas']; ?>">
                <label for="espebocinas"></label>
              </div>    
              <div class="input-field col s5">
                <input id="seriebocinas" name="seriebocinas" type="text" class="validate chiquito" value="<?php echo $_POST['seriebocinas']; ?>">
                <label for="seriebocinas"></label>
              </div>     

              <div class="col s2">
                <label>Lector</label>
              </div>
              <div class="input-field col s5">
                <input id="espelector" name="espelector" type="text" class="validate chiquito" value="<?php echo $_POST['espelector']; ?>">
                <label for="espelector"></label>
              </div>    
              <div class="input-field col s5">
                <input id="serielector" name="serielector" type="text" class="validate chiquito" value="<?php echo $_POST['serielector']; ?>">
                <label for="serielector"></label>
              </div> 
            </div>    

            <div class="row"> 
              <br>
              <div class="offset-s2 col s5">
                <p>Descripción</p>
              </div>
              <div class="col s5">
                <p>Dirección IP</p>
              </div>                  

              <div class="col s2">
                <label>Impresión</label>
              </div>
              <div class="input-field col s5">
                <input id="descimpresion" name="descimpresion" type="text" class="validate chiquito" value="<?php echo $_POST['descimpresion']; ?>">
                <label for="descimpresion"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipimpresion" name="ipimpresion" type="text" class="validate chiquito" value="<?php echo $_POST['ipimpresion']; ?>">
                <label for="ipimpresion"></label>
              </div>

              <div class="col s2"></div>
              <div class="input-field col s5">
                <input id="descimpresion2" name="descimpresion2" type="text" class="validate chiquito" value="<?php echo $_POST['descimpresion2']; ?>">
                <label for="descimpresion2"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipimpresion2" name="ipimpresion2" type="text" class="validate chiquito" value="<?php echo $_POST['ipimpresion2']; ?>">
                <label for="ipimpresion2"></label>
              </div>                          
            </div>

            <div class="row"> 
              <br>
              <div class="offset-s2 col s5">
                <p>MAC Address</p>
              </div>
              <div class="col s5">
                <p>Dirección IP</p>
              </div>                  

              <div class="col s2">
                <label>Ethernet</label>
              </div>
              <div class="input-field col s5">
                <input id="macethernet" name="macethernet" type="text" class="validate chiquito" value="<?php echo $_POST['macethernet']; ?>">
                <label for="macethernet"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipethernet" name="ipethernet" type="text" class="validate chiquito" value="<?php echo $_POST['ipethernet']; ?>">
                <label for="ipethernet"></label>
              </div>

              <div class="col s2">
                <label>WIFI</label>
              </div>
              <div class="input-field col s5">
                <input id="macwifi" name="macwifi" type="text" class="validate chiquito" value="<?php echo $_POST['macwifi']; ?>">
                <label for="macwifi"></label>
              </div>    
              <div class="input-field col s5">
                <input id="ipwifi" name="ipwifi" type="text" class="validate chiquito" value="<?php echo $_POST['ipwifi']; ?>">
                <label for="ipwifi"></label>
              </div>
            </div>

          </div>
        </li>
        <!-- /ESPECIFICACIONES DEL EQUIPO-->
        <!--SISTEMA OPERATIVO Y OFIMATICA-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">desktop_windows</i>Sistema Operativo y Ofimatica</div>
          <div class="collapsible-body">

            <div class="row">
              <div class="col s4">
                <div class="row">
                  <div class="col s12">
                    <p>Sistema Operativo</p>
                  </div>                     
                </div>
				
                <label for="sistope">Sistema Operativo</label>
                <select id="sistope" name="sistope" class="browser-default">
                  <option value="Ninguno" selected>Elije una opción</option>
                  <option value="WidowsXP">Widows XP</option>
                  <option value="WidowsVista">Widows Vista</option>                  
                  <option value="Windows7">Windows 7</option>
                  <option value="Windows8">Windows 8</option>
                  <option value="Windows81">Windows 8.1</option>
                  <option value="Windows10">Windows 10</option>
                  <option value="WindowsServer2008">Windows Server 2008</option>
                  <option value="WindowsServer2012">Windows Server 2012</option>                  
                  <option value="Leopard">Mac OS X 10.5 "Leopard"</option>
                  <option value="SnowLeopard">Mac OS X 10.6 "Snow Leopard"</option>
                  <option value="Lion">Mac OS X 10.7 "Lion"</option>
                  <option value="MountainLion">Mac OS X 10.8 "Mountain Lion"</option>
                  <option value="Mavericks">Mac OS X 10.9 "Mavericks"</option>
                  <option value="Yosemite">Mac OS X 10.10 "Yosemite"</option>
                  <option value="ElCapitan">Mac OS X 10.11 "El Capitan"</option>
                  <option value="Sierra">Mac OS X 10.12 "Sierra"</option>   
                  <option value="HighSierra">Mac OS X 10.13 "High Sierra"</option>                                                                   
                </select>                
				<br>
                <div class="input-field">
                  <input id="sistopelicencia" name="sistopelicencia" type="text" class="validate" value="<?php echo $_POST['sistopelicencia']; ?>">
                  <label for="sistopelicencia">Licencia</label>
                </div>    
					
				<br>	
                <div class="input-field">
                  <textarea id="sistopeobs" name="sistopeobs" class="materialize-textarea" data-length="120"><?php echo $_POST['sistopeobs']; ?></textarea>
                  <label for="sistopeobs">Observaciones</label>
                </div>

                <label for="sistopeinternet">Internet</label>
                <select id="sistopeinternet" name="sistopeinternet" class="browser-default">
                  <option value="Ninguno" selected>Elije una opción</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="col s8">
                <div class="col s6">
                  <div class="row">
                    <div class="col s12">
                      <p>Office</p>
                    </div>                     
                  </div>                  
                  <div class="row">
                    <div class="col s12">
                      <label for="versionoffice">Office</label>
                      <select id="versionoffice" name="versionoffice" class="browser-default">
                        <option value="Ninguno" selected>Elije una opción</option>
                        <option value="2003">2003</option>
                        <option value="2007">2007</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2013">2013</option>                      
                        <option value="2016">2016</option>                        
                        <option value="365">365</option>
                      </select>                
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="ofilicencia" name="ofilicencia" type="text" class="validate" value="<?php echo $_POST['ofilicencia']; ?>">
                      <label for="ofilicencia">Licencia</label>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="ofiobserva" name="ofiobserva" class="materialize-textarea" data-length="50"><?php echo $_POST['ofiobserva']; ?></textarea>
                      <label for="ofiobserva">Observaciones</label>
                    </div>
                  </div>

                </div> 
                <div class="col s6">
                  <div class="row">
                    <div class="col s12">
                      <p>Ofimatica</p>
                    </div>                     
                  </div>             

                  <div class="row">
                    <div class="col s3">
                      <label>Word</label>
                    </div>   
                    <div class="col s3">
                      <label for="insword"></label>
                      <select id="insword" name="insword" class="browser-default">
                       	<option value="Ninguno">Elige</option>                         
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Excel</label>
                    </div>  
                    <div class="col s3">
                      <label for="insexcel"></label>
                      <select id="insexcel" name="insexcel" class="browser-default">
                      <option value="Ninguno">Elige</option>                          
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Power Point</label>
                    </div>  
                    <div class="col s3">
                      <label for="inspower"></label>
                      <select id="inspower" name="inspower" class="browser-default">
                      <option value="Ninguno">Elige</option>                          
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Outlook</label>
                    </div>                    
                    <div class="col s3">
                      <label for="insoutlook"></label>
                      <select id="insoutlook" name="insoutlook" class="browser-default">
                      	<option value="Ninguno">Elige</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Visio</label>
                    </div>   
                    <div class="col s3">
                      <label for="insvisio"></label>
                      <select id="insvisio" name="insvisio" class="browser-default">
                      	<option value="Ninguno">Elige</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Proyect</label>
                    </div>   
                    <div class="col s3">
                      <label for="insproyect"></label>
                      <select id="insproyect" name="insproyect" class="browser-default">
                      	<option value="Ninguno">Elige</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>    

                    <div class="col s3">
                      <label>Cli Correo</label>
                    </div>
                    <div class="col s3">
                      <label for="clicorreo"></label>
                      <select id="clicorreo" name="clicorreo" class="browser-default">
                        <option value="Ninguno">Elije una opción</option>
                        <option value="Outlook">Outlook</option>
                        <option value="Gmail">Gmail</option>
                        <option value="Mail-Mac">Mail-Mac</option>
                      </select>                
                    </div>               
                    <div class="col s3">
                      <label>Firma Correo</label>
                    </div>   
                    <div class="col s3">
                      <label for="reqfirma"></label>
                      <select id="reqfirma" name="reqfirma" class="browser-default">
                      	<option value="Ninguno">Elige</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>                      
                  </div>
                </div>                     
              </div>
            </div>

          </div>
        </li>
        <!-- /SISTEMA OPERATIVO Y OFIMATICA-->
        <!--APLICACIONES DE ESCRITORIO Y WEB-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">apps</i>Aplicaciones de Escritorio y Web</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="col s8">
                <div class="row">
                  <div class="col s12">
                    <p>Aplicaciones de escritorio</p>
                  </div>                     
                </div>                
                <div class="col s2">
                  <label>Intelisis</label>
                </div>   
                <div class="col s2">
                  <label for="insintelisis"></label>
                  <select id="insintelisis" name="insintelisis" class="browser-default">
                  	<option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Apontar</label>
                </div>   
                <div class="col s2">
                  <label for="insapontar"></label>
                  <select id="insapontar" name="insapontar" class="browser-default">
                  	<option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>JobTrack</label>
                </div>    
                <div class="col s2">
                  <label for="insjobtrack"></label>
                  <select id="insjobtrack" name="insjobtrack" class="browser-default"> 
                  	<option value="Ninguno">Elige</option>                         
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>JTMonitor</label>
                </div>   
                <div class="col s2">
                  <label for="insjtmonitor"></label>
                  <select id="insjtmonitor" name="insjtmonitor" class="browser-default">
                  	<option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Planner</label>
                </div>   
                <div class="col s2">
                  <label for="insplanner"></label>
                  <select id="insplanner" name="insplanner" class="browser-default">
                  	<option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Printware</label>
                </div>  
                <div class="col s2">
                  <label for="insprintware"></label>
                  <select id="insprintware" name="insprintware" class="browser-default">
                  	<option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Crece</label>
                </div>    
                <div class="col s2">
                  <label for="inscrece"></label>
                  <select id="inscrece" name="inscrece" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Chrome</label>
                </div>   
                <div class="col s2">
                  <label for="inschrome"></label>
                  <select id="inschrome" name="inschrome" class="browser-default"> 
                  <option value="Ninguno">Elige</option>                         
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Explorer</label>
                </div>    
                <div class="col s2">
                  <label for="insexplorer"></label>
                  <select id="insexplorer" name="insexplorer" class="browser-default"> 
                  <option value="Ninguno">Elige</option>                         
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Firefox</label>
                </div>   
                <div class="col s2">
                  <label for="insfirefox"></label>
                  <select id="insfirefox" name="insfirefox" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Safari</label>
                </div>   
                <div class="col s2">
                  <label for="inssafari"></label>
                  <select id="inssafari" name="inssafari" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>DBEMetrics</label>
                </div>    
                <div class="col s2">
                  <label for="insdbemetrics"></label>
                  <select id="insdbemetrics" name="insdbemetrics" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>DBEIntelisis</label>
                </div>   
                <div class="col s2">
                  <label for="insdbeintelisis"></label>
                  <select id="insdbeintelisis" name="insdbeintelisis" class="browser-default">
					<option value="Ninguno">Elige</option>                                            
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Acr.Reader</label>
                </div>  
                <div class="col s2">
                  <label for="insreader"></label>
                  <select id="insreader" name="insreader" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Acr.PRO</label>
                </div>   
                <div class="col s2">
                  <label for="insacrpro"></label>
                  <select id="insacrpro" name="insacrpro" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Photoshop</label>
                </div>   
                <div class="col s2">
                  <label for="insphotoshop"></label>
                  <select id="insphotoshop" name="insphotoshop" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Ilustrator</label>
                </div>   
                <div class="col s2">
                  <label for="insilustrator"></label>
                  <select id="insilustrator" name="insilustrator" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>In Design</label>
                </div>   
                <div class="col s2">
                  <label for="insindesign"></label>
                  <select id="insindesign" name="insindesign" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Dreamviewer</label>
                </div>  
                <div class="col s2">
                  <label for="insdream"></label>
                  <select id="insdream" name="insdream" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>                     
              </div> 

              <div class="col s4">
                <div class="row">
                  <div class="col s12">
                    <p>Aplicaciones Web</p>
                  </div>                     
                </div>
                
                <div class="col s3">
                  <label>Satarbucks</label>
                </div>   
                <div class="col s3">
                  <label for="insstarbucks"></label>
                  <select id="insstarbucks" name="insstarbucks" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>KrispyKreme</label>
                </div>   
                <div class="col s3">
                  <label for="inskrispy"></label>
                  <select id="inskrispy" name="inskrispy" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>DBxtra</label>
                </div>    
                <div class="col s3">
                  <label for="insdbxtra"></label>
                  <select id="insdbxtra" name="insdbxtra" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>SAAM</label>
                </div>   
                <div class="col s3">
                  <label for="inssaam"></label>
                  <select id="inssaam" name="inssaam" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>DOTS</label>
                </div>   
                <div class="col s3">
                  <label for="insdots"></label>
                  <select id="insdots" name="insdots" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label style="font-size:11px;">Mesa Control</label>
                </div>  
                <div class="col s3">
                  <label for="insmesacontrol"></label>
                  <select id="insmesacontrol" name="insmesacontrol" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label style="font-size:11px;">iDashboards</label>
                </div>    
                <div class="col s3">
                  <label for="insidashboards"></label>
                  <select id="insidashboards" name="insidashboards" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>Cotizador</label>
                </div>   
                <div class="col s3">
                  <label for="inscotizador"></label>
                  <select id="inscotizador" name="inscotizador" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Otro</label>
                </div>  
                <div class="input-field col s4">
                  <input id="otroapp1" name="otroapp1" type="text" class="validate chiquito" value="<?php echo $_POST['otroapp1']; ?>">
                  <label for="otroapp1"></label>
                </div>                         
                <div class="col s6">
                  <label for="insotroapp1"></label>
                  <select id="insotroapp1" name="insotroapp1" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s2">
                  <label>Otro</label>
                </div> 
                <div class="input-field col s4">
                  <input id="otroapp2" name="otroapp2" type="text" class="validate chiquito" value="<?php echo $_POST['otroapp2']; ?>">
                  <label for="otroapp2"></label>
                </div>                         
                <div class="col s6">
                  <label for="insotroapp2"></label>
                  <select id="insotroapp2" name="insotroapp2" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>                                        
              </div>
            </div>                   
          </div>
        </li>
        <!-- /APLICAIONES DE ESCRITORIO Y WEB-->
        <!--HERRAMIENTAS VARIAS-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">build</i>Herramientas varias</div>
          <div class="collapsible-body">
            <div class="col s6">

              <div class="row">
                <div class="col s3">
                  <label>Pdf Editor</label>
                </div>   
                <div class="col s3">
                  <label for="inspdfeditor"></label>
                  <select id="inspdfeditor" name="inspdfeditor" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="col s3">
                  <label>ITunes</label>
                </div>   
                <div class="col s3">
                  <label for="insitunes"></label>
                  <select id="insitunes" name="insitunes" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div> 

                <div class="col s3">
                  <label>Kies</label>
                </div> 
                <div class="col s3">
                  <label for="inskies"></label>
                  <select id="inskies" name="inskies" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div> 

                <div class="col s3">
                  <label>Lab.Matrix</label>
                </div>  
                <div class="col s3">
                  <label for="inslabmatrixs"></label>
                  <select id="inslabmatrixs" name="inslabmatrixs" class="browser-default">
                  <option value="Ninguno">Elige</option>                          
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>

              </div>                  
            </div>

            <div class="col s6">
              <div class="col s2">
                <label>Antivirus</label>
              </div>
              <div class="input-field col s2">
                <input id="antivirus" name="antivirus" type="text" class="validate chiquito" value="<?php echo $_POST['antivirus']; ?>">
                <label for="antivirus"></label>
              </div>                         
              <div class="col s2">
                <label for="insantivirus"></label>
                <select id="insantivirus" name="insantivirus" class="browser-default">
                <option value="Ninguno">Elige</option>                          
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="col s2">
                <label>Escaner</label>
              </div>
              <div class="input-field col s2">
                <input id="escaner" name="escaner" type="text" class="validate chiquito" value="<?php echo $_POST['escaner']; ?>">
                <label for="escaner"></label>
              </div>                        
              <div class="col s2">
                <label for="insescaner"></label>
                <select id="insescaner" name="insescaner" class="browser-default">
                <option value="Ninguno">Elige</option>                          
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div> 

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro1" name="herrotro1" type="text" class="validate chiquito" value="<?php echo $_POST['herrotro1']; ?>">
                <label for="herrotro1"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr1"></label>
                <select id="insotroherr1" name="insotroherr1" class="browser-default"> 
                <option value="Ninguno">Elige</option>                         
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>  

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro2" name="herrotro2" type="text" class="validate chiquito" value="<?php echo $_POST['herrotro2']; ?>">
                <label for="herrotro2"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr2"></label>
                <select id="insotroherr2" name="insotroherr2" class="browser-default">
                <option value="Ninguno">Elige</option>                          
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div> 

              <div class="col s2">
                <label>Otro</label>
              </div>
              <div class="input-field col s2">
                <input id="herrotro3" name="herrotro3" type="text" class="validate chiquito" value="<?php echo $_POST['herrotro3']; ?>">
                <label for="herrotro3"></label>
              </div>                        
              <div class="col s2">
                <label for="insotroherr3"></label>
                <select id="insotroherr3" name="insotroherr3" class="browser-default"> 
                <option value="Ninguno">Elige</option>                         
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>                                                                                                  
            </div>

          </div>
        </li>
        <!-- /HERRAMIENTAS VARIAS-->
        <!--MAPEOS Y COMUNICACIONES-->
        <li>
          <div class="collapsible-header active"><i class="material-icons">build</i>Mapeos y Comunicaciones</div>
          <div class="collapsible-body">
            <div class="row">
              <div class="col s8">
                <div class="col s2">
                  <label>Unidad</label>
                </div> 
                <div class="col s4">
                  <label>Ruta</label>
                </div> 
                <div class="col s2">
                  <label>Unidad</label>
                </div> 
                <div class="col s4">
                  <label>Ruta</label>
                </div>
                <div class="input-field col s2">
                  <input id="unidad1" name="unidad1" type="text" class="validate chiquito" value="<?php echo $_POST['unidad1']; ?>">
                  <label for="unidad1"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta1" name="ruta1" type="text" class="validate chiquito" value="<?php echo $_POST['ruta1']; ?>">
                  <label for="ruta1"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad2" name="unidad2" type="text" class="validate chiquito" value="<?php echo $_POST['unidad2']; ?>">
                  <label for="unidad2"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta2" name="ruta2" type="text" class="validate chiquito" value="<?php echo $_POST['ruta2']; ?>">
                  <label for="ruta2"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad3" name="unidad3" type="text" class="validate chiquito" value="<?php echo $_POST['unidad3']; ?>">
                  <label for="unidad3"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta3" name="ruta3" type="text" class="validate chiquito" value="<?php echo $_POST['ruta3']; ?>">
                  <label for="ruta3"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad4" name="unidad4" type="text" class="validate chiquito" value="<?php echo $_POST['unidad4']; ?>">
                  <label for="unidad4"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta4" name="ruta4" type="text" class="validate chiquito" value="<?php echo $_POST['ruta4']; ?>">
                  <label for="ruta4"></label>
                </div>
                <div class="input-field col s2">
                  <input id="unidad5" name="unidad5" type="text" class="validate chiquito" value="<?php echo $_POST['unidad5']; ?>">
                  <label for="unidad5"></label>
                </div> 
                <div class="input-field col s4">
                  <input id="ruta5" name="ruta5" type="text" class="validate chiquito" value="<?php echo $_POST['ruta5']; ?>">
                  <label for="ruta5"></label>
                </div> 
                <div class="input-field col s2">
                  <input id="unidad6" name="unidad6" type="text" class="validate chiquito" value="<?php echo $_POST['unidad6']; ?>">
                  <label for="unidad6"></label>
                </div>    
                <div class="input-field col s4">
                  <input id="ruta6" name="ruta6" type="text" class="validate chiquito" value="<?php echo $_POST['ruta6']; ?>">
                  <label for="ruta6"></label>
                </div>                                                                                                                                
              </div>

              <div class="col s4">
                <div class="col s6">
                  <label>NS Télefono</label>
                </div> 
                <div class="col s6">
                  <label>Extension</label>
                </div>
                <div class="input-field col s6">
                  <input id="nstelefono" name="nstelefono" type="text" class="validate chiquito" value="<?php echo $_POST['nstelefono']; ?>">
                  <label for="nstelefono"></label>
                </div>    
                <div class="input-field col s6">
                  <input id="extension" name="extension" type="text" class="validate chiquito" value="<?php echo $_POST['extension']; ?>">
                  <label for="extension"></label>
                </div>                       
              </div>                  
            </div>

          </div>
        </li>
        <!-- /MAPEOS Y COMUNICACIONES-->            
      </ul>

      <div class="row">
        <div class="offset-s3 col s2">
         <!--a id="registrar" class="waves-effect waves-light blue darken-4 btn">Registrar</a-->
         <button id="actualizar" class="btn waves-effect waves-light blue darken-4 btn" type="submit" name="registrar">Actualizar
        </button>                       
      </div>      
      <div class="offset-s2 col s2">
        <a id="cancelar" class="waves-effect waves-light grey lighten-5 black-text btn">Cancelar</a>
      </div>        
    </div>                
  </form>

</div>
</main>
<script type="text/javascript" src="../../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../../js/materialize.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.button-collapse').sideNav();

     if( <?php echo $_SESSION["MenuTickets"];?> != 1 ) {
      $('#aside-tickets').hide();
      $('#panel-tickets').hide();
  }
     if( <?php echo $_SESSION["MenuLibera"];?> != 1 ) {
      $('#aside-libera').hide();
      $('#panel-libera').hide();
  }
     if( <?php echo $_SESSION["MenuMaquilas"];?> != 1 ) {
      $('#aside-acabadom').hide();
      $('#panel-acabadom').hide();
  }
     if( <?php echo $_SESSION["MenuMuestras"];?> != 1 ) {
      $('#aside-controlm').hide();
      $('#panel-controlm').hide();
  }
     if( <?php echo $_SESSION["MenuRevBDD"];?> != 1 ) {
      $('#aside-muestreo').hide();
      $('#panel-muestreo').hide();
  }
     if( <?php echo $_SESSION["UserRevBDD"];?> != 1 ) {
      $('#bitacoraRevBDD').hide();
      $('#muestreoRevBDD').hide();
  }  
     if( <?php echo $_SESSION["MenuReprocesos"];?> != 1 ) {
      $('#aside-reprocesos').hide();
      $('#panel-reprocesos').hide();
  }
     if( <?php echo $_SESSION["MenuCapacitacion"];?> != 1 ) {
      $('#aside-capacitacion').hide();
      $('#panel-capacitacion').hide();
  } 
     if( <?php echo $_SESSION["MenuiDashboards"];?> != 1 ) {
      $('#aside-iDashboards').hide();
      $('#panel-iDashboards').hide();
  }      
     if( <?php echo $_SESSION["MenuDBxtra"];?> != 1 ) {
      $('#aside-dbxtra').hide();
      $('#panel-dbxtra').hide();
  }   
     if( <?php echo $_SESSION["MenuKrispykreme"];?> != 1 ) {
      $('#aside-krispykreme').hide();
      $('#panel-krispykreme').hide();
  } 
     if( <?php echo $_SESSION["MenuStarbucks"];?> != 1 ) {
      $('#aside-starbucks').hide();
      $('#panel-starbucks').hide();
  }   
     if( <?php echo $_SESSION["MenuStarbucks2"];?> != 1 ) {
      $('#aside-starbucks2').hide();
      $('#panel-starbucks2').hide();
  }
     if( <?php echo $_SESSION["MenuInventario"];?> != 1 ) {
      $('#aside-inventario').hide();
      $('#panel-inventario').hide();
  }                                     
     if( <?php echo $_SESSION["MenuNissan"];?> != 1 ) {
      $('#aside-nissan').hide();
      $('#panel-nissan').hide();
  }
       if( <?php echo $_SESSION["UserNissan"];?> != 1 ) {
      $('#bitacoraNissan').hide();
      $('#escanerNissan').hide();
      
  }              
}); 
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.collapsible').collapsible();
    collapseAll();

    $("#departamento option[value="+ "<?php echo $_POST['departamento']; ?>" +"]").attr("selected",true);
	$("#puesto option[value="+ "<?php echo $_POST['puesto']; ?>" +"]").attr("selected",true);
    $("#tipoequippo option[value="+ "<?php echo $_POST['tipoequippo']; ?>" +"]").attr("selected",true);
    $("#sistope option[value="+ "<?php echo $_POST['sistope']; ?>" +"]").attr("selected",true);
    $("#sistopeinternet option[value="+ "<?php echo $_POST['sistopeinternet']; ?>" +"]").attr("selected",true);
    $("#versionoffice option[value="+ "<?php echo $_POST['versionoffice']; ?>" +"]").attr("selected",true); 
    $("#insword option[value="+ "<?php echo $_POST['insword']; ?>" +"]").attr("selected",true);                   
    $("#insexcel option[value="+ "<?php echo $_POST['insexcel']; ?>" +"]").attr("selected",true); 
    $("#inspower option[value="+ "<?php echo $_POST['inspower']; ?>" +"]").attr("selected",true);
    $("#insoutlook option[value="+ "<?php echo $_POST['insoutlook']; ?>" +"]").attr("selected",true); 
    $("#insvisio option[value="+ "<?php echo $_POST['insvisio']; ?>" +"]").attr("selected",true); 
    $("#insproyect option[value="+ "<?php echo $_POST['insproyect']; ?>" +"]").attr("selected",true);
    $("#clicorreo option[value="+ "<?php echo $_POST['clicorreo']; ?>" +"]").attr("selected",true);
    $("#reqfirma option[value="+ "<?php echo $_POST['reqfirma']; ?>" +"]").attr("selected",true); 
    $("#insintelisis option[value="+ "<?php echo $_POST['insintelisis']; ?>" +"]").attr("selected",true);
    $("#insapontar option[value="+ "<?php echo $_POST['insapontar']; ?>" +"]").attr("selected",true);  
    $("#insjobtrack option[value="+ "<?php echo $_POST['insjobtrack']; ?>" +"]").attr("selected",true); 
    $("#insjtmonitor option[value="+ "<?php echo $_POST['insjtmonitor']; ?>" +"]").attr("selected",true); 
    $("#insplanner option[value="+ "<?php echo $_POST['insplanner']; ?>" +"]").attr("selected",true); 
    $("#insprintware option[value="+ "<?php echo $_POST['printware']; ?>" +"]").attr("selected",true);
    $("#inscrece option[value="+ "<?php echo $_POST['inscrece']; ?>" +"]").attr("selected",true);
    $("#inschrome option[value="+ "<?php echo $_POST['inschrome']; ?>" +"]").attr("selected",true);
    $("#insexplorer option[value="+ "<?php echo $_POST['insexplorer']; ?>" +"]").attr("selected",true);
    $("#insfirefox option[value="+ "<?php echo $_POST['insfirefox']; ?>" +"]").attr("selected",true);
    $("#inssafari option[value="+ "<?php echo $_POST['inssafari']; ?>" +"]").attr("selected",true);
    $("#insdbemetrics option[value="+ "<?php echo $_POST['insdbemetrics']; ?>" +"]").attr("selected",true); 
    $("#insdbeintelisis option[value="+ "<?php echo $_POST['insdbeintelisis']; ?>" +"]").attr("selected",true);
    $("#insreader option[value="+ "<?php echo $_POST['insreader']; ?>" +"]").attr("selected",true);
    $("#insacrpro option[value="+ "<?php echo $_POST['insacrpro']; ?>" +"]").attr("selected",true);
    $("#insphotoshop option[value="+ "<?php echo $_POST['insphotoshop']; ?>" +"]").attr("selected",true);
    $("#insilustrator option[value="+ "<?php echo $_POST['insilustrator']; ?>" +"]").attr("selected",true);
    $("#insindesign option[value="+ "<?php echo $_POST['insindesign']; ?>" +"]").attr("selected",true);
    $("#insdream option[value="+ "<?php echo $_POST['insdream']; ?>" +"]").attr("selected",true);
    $("#insstarbucks option[value="+ "<?php echo $_POST['insstarbucks']; ?>" +"]").attr("selected",true);
    $("#inskrispy option[value="+ "<?php echo $_POST['inskrispy']; ?>" +"]").attr("selected",true);
    $("#insdbxtra option[value="+ "<?php echo $_POST['insdbxtra']; ?>" +"]").attr("selected",true);
    $("#inssaam option[value="+ "<?php echo $_POST['inssaam']; ?>" +"]").attr("selected",true); 
    $("#insdots option[value="+ "<?php echo $_POST['insdots']; ?>" +"]").attr("selected",true);
    $("#insmesacontrol option[value="+ "<?php echo $_POST['insmesacontrol']; ?>" +"]").attr("selected",true);
    $("#insidashboards option[value="+ "<?php echo $_POST['insidashboards']; ?>" +"]").attr("selected",true);
    $("#inscotizador option[value="+ "<?php echo $_POST['inscotizador']; ?>" +"]").attr("selected",true);
    $("#insotroapp1 option[value="+ "<?php echo $_POST['insotroapp1']; ?>" +"]").attr("selected",true);
    $("#inspdfeditor option[value="+ "<?php echo $_POST['inspdfeditor']; ?>" +"]").attr("selected",true);
    $("#insitunes option[value="+ "<?php echo $_POST['insitunes']; ?>" +"]").attr("selected",true); 
    $("#inskies option[value="+ "<?php echo $_POST['inskies']; ?>" +"]").attr("selected",true); 
    $("#inslabmatrixs option[value="+ "<?php echo $_POST['inslabmatrixs']; ?>" +"]").attr("selected",true);
    $("#insantivirus option[value="+ "<?php echo $_POST['insantivirus']; ?>" +"]").attr("selected",true);
    $("#insescaner option[value="+ "<?php echo $_POST['insescaner']; ?>" +"]").attr("selected",true);
    $("#insotroherr1 option[value="+ "<?php echo $_POST['insotroherr1']; ?>" +"]").attr("selected",true);
    $("#insotroherr2 option[value="+ "<?php echo $_POST['insotroherr2']; ?>" +"]").attr("selected",true);
    $("#insotroherr3 option[value="+ "<?php echo $_POST['insotroherr3']; ?>" +"]").attr("selected",true);

	$("#frmActualizarInventario").submit(function(){
		var cadena = $(this).serialize();
		console.log(cadena);

		$.post('actualizar.php', cadena,
			function(data){
				if (data.validation=="true") {

					Materialize.toast('Se registro', 1000,'green darken-4');
					window.location = '../detalle.php';

				}else{				
					Materialize.toast('Algo Salio Mal', 1000,'red darken-4');
				}
			},'json');
		return false;
  });

  $("#cancelar").click(function(){
	window.location = '../detalle.php';

});

function collapseAll(){
  $(".collapsible-header").addClass(function(){
    return "active";
  });
  //$(".collapsible").collapsible({accordion: true});
  //$(".collapsible").collapsible({accordion: false});
}  

  });     
</script>
</body>
</html>