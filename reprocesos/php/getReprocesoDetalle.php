<?php session_start();

include 'conexion.php';

$orden = $_GET['folio'];

$sql = "SELECT * FROM Reprocesos WHERE NumOrden='$orden'";
$stmt = sqlsrv_query($conn,$sql);
$row_count = sqlsrv_has_rows ( $stmt );

if($stmt === false){
	die(print_r(sqlsrv_errors(),true));
}

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
{

	$_POST['nombreTrabajo'] = utf8_encode($row['NombreTrabajo']);
	$_POST['nombreCliente'] = $row['NombreCliente'];
	$_POST['fechaOrden'] = $row['FechaOrden']->format('d/m/Y');
	$_POST['cantidad'] = number_format($row['Cantidad'],2,".",",");
	$_POST['departamento'] = $row['Departamento'];
	$_POST['importe'] = number_format($row['ImporteCotizado'],2,".",",");
	$_POST['nota'] = utf8_encode($row['Nota']);
	$_POST['acabManual'] = number_format($row['AcabMan'],2,".",",");
	$_POST['preprensa'] = number_format($row['Preprensa'],2,".",",");
	$_POST['offset'] = number_format($row['Offset'],2,".",",");
	$_POST['acabLito'] = number_format($row['AcabLito'],2,".",",");
	$_POST['acabEsp'] = number_format($row['AcabEsp'],2,".",",");
	$_POST['ventas'] = number_format($row['Ventas'],2,".",",");
	$_POST['maqExt'] = number_format($row['MaqExt'],2,".",",");
	$_POST['maqInt'] = number_format($row['MaqInt'],2,".",",");
	$_POST['operaciones'] = number_format($row['Operaciones'],2,".",",");
	$_POST['almacen'] = number_format($row['Almacen'],2,".",",");
	$_POST['sistemas'] = number_format($row['Sistemas'],2,".",",");
	$_POST['litVw'] = number_format($row['LitVW'],2,".",",");
	$_POST['entregas'] = number_format($row['Entregas'],2,".",",");
	$_POST['cliente'] = number_format($row['Cliente'],2,".",",");
	$_POST['calidad'] = number_format($row['Calidad'],2,".",",");
	$_POST['tipoRegistro'] = $row['TipoRegistro'];
	$_POST['indigo'] = number_format($row['Indigo'],2,".",",");
	$_POST['nuberas'] = number_format($row['Nuberas'],2,".",",");
	$_POST['buskro'] = number_format($row['Buskro'],2,".",",");
}

?>


  <!DOCTYPE html>
<html lang="es">
<head> 
  <meta charset="UTF-8">
  <meta name="Autor" content="Ing.Sergio Andres Garcia Vazquez">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="png" href="../../img/favicon.png" /> 
  <link type="text/css" rel="stylesheet" href="../../css/materialize.css" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../../css/estilos.panel.css">
  <link rel="stylesheet" href="../css/estilosReprocesos.css">  
	<title>Reprocesos</title>
</head>

<body> 
    <header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a href="#!" class="indigo-text text-darken-3"><?php echo $_SESSION["Permisos"]["NombreUsuario"];?></a></li>
      <li><a href="cerrar.php" class="indigo-text text-darken-3" href="#!">Salir</a></li>
    </ul>

    <nav class="nav-extended indigo darken-3">
      <div class="nav-wrapper">
        <a style="margin-left: 50px; font-size:22px;" class="breadcrumb" href="#!">Reprocesos</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li id="repProd"><a href="../reprocesosProduccion.php">Producci&oacute;n</a></li>
          <li id="repCali"><a href="../reprocesosCalidad.php">Calidad</a></li>
          <li id="consRep"><a href="../consultaReprocesos.php">Consulta Rep.</a></li>
          <a href="#!name" class='right dropdown-button' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
        </ul>
        <ul class="side-nav" id="mobile-demo">
        <li><a href="../reprocesosProduccion.php">Reprocesos Producci&oacute;n</a></li>
        <li><a href="../reprocesosCalidad.php">Reprocesos Calidad</a></li>
        <li><a href="../consultaReprocesos.php">Consulta Reprocesos</a></li>                 
          <li><div class="divider"></div></li>                        
          <li class="bold" id="aside-atras"><a href="../../" id="nav-tickets3">Atras</a></li>
          <li><div class="divider"></div></li>                                               
          <li><a href="../../cerrar.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>

<aside>
  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-3 white-text" style="height: 128px;">
        <div class="row">
          <img style="margin-top: 15%;" width="150"src="../../img/Logo_lito.png" />
          <p style="margin-top: -13%;">
            Panel de Aplicaciones
          </p>
        </div>
      </div>
    </li>
    <li class="bold">
      <a class="waves-effect" href="../../index.php" id="nav-app">
        <i class="material-icons">home</i>Página principal
      </a>
    </li>
    <li><div class="divider"></div></li>

    <?php if ($_SESSION["Permisos"]["MenuTickets"] === 1): ?>
    <li class="bold" id="aside-tickets">
      <a class="waves-effect" href="../../tickets/index.php" id="nav-app1">
       <i class="material-icons red-text text-darken-4"><img src="../../icons/tickets.png" alt="Tickets" width="25"></i>Tickets
     </a>
   </li>
   <?php endif; ?>

   <li class="bold" id="aside-directorio">
    <a class="waves-effect" href="../../directorio/directorio.php" id="nav-tickets2">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/directorio.png" alt="" width="25"></i>Directorio
    </a>
  </li> 

  <?php if ($_SESSION["Permisos"]["MenuReportesProduccion"] === 1): ?>   
  <li class="bold" id="aside-cotizador">
    <a class="waves-effect" href="../../reportesProduccion/index.php" id="nav-app17">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/reportar.png" alt="" width="25"></i>Reportes Prod.
    </a>
  </li>
  <?php endif; ?>   

  <?php if ($_SESSION["Permisos"]["MenuPreviewOP"] === 1): ?>   
  <li class="bold" id="aside-cotizador">
    <a class="waves-effect" href="../../informeOP/index.php" id="nav-app18">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/ordenproduccion.png" alt="" width="25"></i>Informe OP
    </a>
  </li>
  <?php endif; ?>   

    <?php if ($_SESSION["Permisos"]["MenuiDashboards"] === 1): ?>
  <li class="bold" id="aside-iDashboards">
    <a class="waves-effect" href="../../http://192.168.2.217:8080/idashboards/" target="_blank" id="nav-app8">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/idashboard.png" alt="" width="25"></i>iDashboards
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuDBxtra"] === 1): ?>
  <li class="bold" id="aside-dbxtra">
    <a class="waves-effect" href="../../http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank" id="nav-app9">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/dbxtra.png" alt="" width="25"></i>DBxtra
    </a>
  </li> 
  <?php endif; ?> 

  <?php if ($_SESSION["Permisos"]["MenuKrispykreme"] === 1): ?>  
  <li class="bold" id="aside-krispykreme">
    <a class="waves-effect" href="../../http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank" id="nav-app10">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/krispykreme.png" alt="" width="25"></i>KrispyKreme
    </a>
  </li> 
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuStarbucks"] === 1): ?>
  <li class="bold" id="aside-starbucks">
    <a class="waves-effect" href="../../http://192.168.2.211:8080/starbucks/public/login" target="_blank" id="nav-app11">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/starbucks.png" alt="" width="25"></i>Starbucks
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuStarbucks2"] === 1): ?>
  <li class="bold" id="aside-starbucks2">
    <a class="waves-effect" href="../../http://192.168.2.211:8080/starbucks2/public/login" target="_blank" id="nav-app12">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/starbucks2.png" alt="" width="25"></i>Starbucks2
    </a>
  </li>
  <?php endif; ?>  

  <?php if ($_SESSION["Permisos"]["MenuLibera"] === 1): ?>    
  <li class="bold" id="aside-libera">
    <a class="waves-effect" href="../../liberacionPT/index.php" id="nav-tickets3">
      <i class="material-icons green-text text-darken-4"><img src="../../icons/liberacion.png" alt="" width="25"></i>Liberacion
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuMuestras"] === 1): ?>
  <li class="bold" id="aside-controlm">
    <a class="waves-effect" href="../../muestras/index.php" id="nav-tickets4">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/control_muestras.png" alt="" width="25"></i>Muestras
    </a>
  </li> 
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuRevBDD"] === 1): ?>   
  <li class="bold" id="aside-muestreo">
    <a class="waves-effect" href="../../muestreoBD/index.php" id="nav-tickets5">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/muestreo_bd.png" alt="" width="25"></i>Revision BD
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuMaquilas"] === 1): ?>
  <li class="bold" id="aside-acabadom">
    <a class="waves-effect" href="../../acabadoManual/index.php" id="nav-tickets6">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/acabado_manual.png" alt="" width="25"></i>A.Manual
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuReprocesos"] === 1): ?>
  <li class="bold" id="aside-reprocesos">
    <a class="waves-effect" href="../../reprocesos/index.php" id="nav-app7">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/reprocesos.png" alt="" width="25"></i>Reprocesos
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuCapacitacion"] === 1): ?>
  <li class="bold" id="aside-capacitacion">
    <a class="waves-effect" href="../../capacitacion/index.php" id="nav-app13">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/capacitacion.png" alt="" width="25"></i>Capacitación
    </a>
  </li>
  <?php endif; ?> 

  <?php if ($_SESSION["Permisos"]["MenuInventario"] === 1): ?>
  <li class="bold" id="aside-inventario">
    <a class="waves-effect" href="../../inventarioSistemas/index.php" id="nav-app13">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/inventario_sistemas.png" alt="" width="25"></i>Inventario
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuNissan"] === 1): ?>
  <li class="bold" id="aside-nissan">
    <a class="waves-effect" href="../../nissan/index.php" id="nav-app14">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/nissan.png" alt="" width="25"></i>Nissan Scan
    </a>
  </li>
  <?php endif; ?>

  <!--li class="bold" id="aside-consumibles">
    <a class="waves-effect" href="../../nissanTipo.php" id="nav-app15">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/consumibles.png" alt="" width="25"></i>Inv.Consumibles
    </a>
  </li--> 

  <?php if ($_SESSION["Permisos"]["MenuCotizador"] === 1): ?>   
  <li class="bold" id="aside-cotizador">
    <a class="waves-effect" href="../../cotizador/index.php" id="nav-app16">
      <i class="material-icons blue-text text-darken-4"><img src="../../icons/presupuesto.png" alt="" width="25"></i>Cotizador
    </a>
  </li>
  <?php endif; ?>  

  <li><div class="divider"></div></li>
  <li class="bold">
    <a class="waves-effect" href="../../cerrar.php" id="nav-tickets1">
      <i class="material-icons">exit_to_app</i>Salir
    </a>
  </li>
</ul>
</ul>  
</aside>    
	</header>
	<div class="row">
		<div class="offset-s2 col s4">
			<h5>Reprocesos/Detalle</h5>		
		</div>	
	</div>
	<main class="container">
		<div class="row">
			<div class="offset-s3 col s6 offset-s3">
				<!--form name="reprocesosDetalle" id="reprocesosDetalle" method="POST" action=""-->
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div class="input-field col s3">			
								<input style="text-transform: uppercase" class="validate" type="text" id="orden" value='<?php echo $_GET['folio']; ?>' readonly/>		
								<label for="orden">Orden</label>
							</div>		
						</div>				 
						<div class="row">
							<div class="input-field col s8">
								<input style="text-transform: uppercase" class="validate" type="text" value='<?php echo $_POST['nombreTrabajo']; ?>' id="trabajo" readonly />
								<label for="trabajo" class="camposReprocesos">Trabajo</label>			
							</div>  				
						</div>
						<div class="row">
							<div class="input-field col s8">
								<input style="text-transform: uppercase" class="validate" type="text" value='<?php echo $_POST['nombreCliente']; ?>' id="cliente" readonly />
								<label for="cliente">Cliente</label>					
							</div>				
						</div>

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" value='<?php echo $_POST['fechaOrden']; ?>' id="fRegistro" readonly />
								<label for="fRegistro">Fecha</label>			
							</div>					
						</div>	

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" VALUE='<?php echo $_POST['cantidad']; ?>' id="cantidad" readonly/>
								<label for="cantidad">Cantidad Pedida</label>						
							</div>					
						</div>	

						<div class="row">
							<div class="input-field col s8">
								<input class="validate" type="text" value='<?php echo $_POST['departamento']; ?>' id="depto" readonly />
								<label for="depto">Departamento</label>			
							</div>				
						</div>

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" value='<?php echo $_POST['importe']; ?>' id="importCot" readonly  />
								<label for="importCot">Importe Cotizado</label>							
							</div>				
						</div>			

						<div class="row">
							<div class="input-field col s12">
								<textarea  id="notas" class="materialize-textarea" style="text-transform: uppercase" value='<?php echo $_POST['nota']; ?>' readonly></textarea>
								<label for="notas">Notas</label>
							</div>						
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s6">
						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['acabManual']; ?>' id="a_manual" readonly/>
								<label for="a_manual">Acabado Manual</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['acabEsp']; ?>' id="acab_especial" readonly>
								<label for="acab_especial">Acabados Especiales</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['acabLito']; ?>' id="acab_lito" readonly>
								<label for="acab_lito">Acabado Litograf&iacute;a</label>	
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['almacen']; ?>' id="almacen_" readonly>
								<label for="almacen_">Almac&eacute;n:$0.00</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['calidad']; ?>' id="calidad" readonly>
								<label for="calidad">Calidad</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['cliente']; ?>' id="cliente_" readonly>
								<label for="cliente_">Cliente</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['entregas']; ?>' id="entregas_" readonly/>
								<label id="entregas_">Entregas</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['litVw']; ?>' id="literatura_vw" readonly>
								<label for="literatura_vw">Literatura VW</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['offset']; ?>' id="offset" readonly>
								<label for="offset">Offset</label>											
							</div>						
						</div>
					</div>				

					<div id="bloqueDer" class="col s6">
						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['operaciones']; ?>' id="operaciones" readonly>
								<label for="operaciones">Operaciones/Producci&oacute;n</label>
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['preprensa']; ?>' id="preprensa" value="<?php echo $data['preprensa']; ?>" readonly>
								<label for="preprensa" id="almacen">Pre-prensa</label>						
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['maqInt']; ?>' id="maquila_interna" readonly>
								<label for="maquila_interna">Proceso Maq.Interna</label>	
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['maqExt']; ?>' id="externa" readonly>
								<label for="externa">Prov.Maq.Externa</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['sistemas']; ?>' id="sistemas" readonly>
								<label for="sistemas">Sistemas</label>					
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['ventas']; ?>' id="ventas" readonly>
								<label for="ventas">Ventas</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['indigo']; ?>' id="indigo" readonly>
								<label for="indigo">Impresión Digital</label>											
							</div>							
						</div>	

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['nuberas']; ?>' id="nuberas" readonly>
								<label for="nuberas">Impresión Nuberas</label>
							</div>							
						</div>	

						<div class="row">
							<div class="input-field col s6">
								<input class="validate amt" type="text" value='<?php echo $_POST['buskro']; ?>' id="buskro" readonly>
								<label for="buskro">Impresión Buskro</label>											
							</div>										
						</div>
					</div>
				</div>					
				<!--/div-->
				<!--/form-->
			</div>			
		</div>
	</main>
<script type="text/javascript" src="../../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../../js/materialize.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
</body>
</html>