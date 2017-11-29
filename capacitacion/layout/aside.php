<aside>
  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-3 white-text" style="height: 128px;">
        <div class="row">
          <img style="margin-top: 15%;" width="150"src="../img/Logo_lito.png" />
          <p style="margin-top: -13%;">
            Panel de Aplicaciones
          </p>
        </div>
      </div>
    </li>
    <li class="bold">
      <a class="waves-effect" href="../index.php" id="nav-app">
        <i class="material-icons">home</i>Página principal
      </a>
    </li>
    <li><div class="divider"></div></li>

    <?php if ($_SESSION["Permisos"]["MenuTickets"] === 1): ?>
    <li class="bold" id="aside-tickets">
      <a class="waves-effect" href="../tickets/index.php" id="nav-app1">
       <i class="material-icons red-text text-darken-4"><img src="../icons/tickets.png" alt="Tickets" width="25"></i>Tickets
     </a>
   </li>
   <?php endif; ?>

   <li class="bold" id="aside-directorio">
    <a class="waves-effect" href="../directorio/directorio.php" id="nav-tickets2">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/directorio.png" alt="" width="25"></i>Directorio
    </a>
  </li> 

  <?php if ($_SESSION["Permisos"]["MenuLibera"] === 1): ?>    
  <li class="bold" id="aside-libera">
    <a class="waves-effect" href="../liberacionPT/index.php" id="nav-tickets3">
      <i class="material-icons green-text text-darken-4"><img src="../icons/liberacion.png" alt="" width="25"></i>Liberacion
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuMuestras"] === 1): ?>
  <li class="bold" id="aside-controlm">
    <a class="waves-effect" href="../muestras/index.php" id="nav-tickets4">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/control_muestras.png" alt="" width="25"></i>Muestras
    </a>
  </li> 
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuRevBDD"] === 1): ?>   
  <li class="bold" id="aside-muestreo">
    <a class="waves-effect" href="../muestreoBD/index.php" id="nav-tickets5">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/muestreo_bd.png" alt="" width="25"></i>Revision BD
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuMaquilas"] === 1): ?>
  <li class="bold" id="aside-acabadom">
    <a class="waves-effect" href="../acabadoManual/index.php" id="nav-tickets6">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/acabado_manual.png" alt="" width="25"></i>A.Manual
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuReprocesos"] === 1): ?>
  <li class="bold" id="aside-reprocesos">
    <a class="waves-effect" href="../reprocesos/index.php" id="nav-app7">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/reprocesos.png" alt="" width="25"></i>Reprocesos
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuiDashboards"] === 1): ?>
  <li class="bold" id="aside-iDashboards">
    <a class="waves-effect" href="../http://192.168.2.217:8080/idashboards/" target="_blank" id="nav-app8">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/idashboard.png" alt="" width="25"></i>iDashboards
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuDBxtra"] === 1): ?>
  <li class="bold" id="aside-dbxtra">
    <a class="waves-effect" href="../http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank" id="nav-app9">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/dbxtra.png" alt="" width="25"></i>DBxtra
    </a>
  </li> 
  <?php endif; ?> 

  <?php if ($_SESSION["Permisos"]["MenuKrispykreme"] === 1): ?>  
  <li class="bold" id="aside-krispykreme">
    <a class="waves-effect" href="../http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank" id="nav-app10">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/krispykreme.png" alt="" width="25"></i>KrispyKreme
    </a>
  </li> 
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuStarbucks"] === 1): ?>
  <li class="bold" id="aside-starbucks">
    <a class="waves-effect" href="../http://192.168.2.211:8080/starbucks/public/login" target="_blank" id="nav-app11">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/starbucks.png" alt="" width="25"></i>Starbucks
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuStarbucks2"] === 1): ?>
  <li class="bold" id="aside-starbucks2">
    <a class="waves-effect" href="../http://192.168.2.211:8080/starbucks2/public/login" target="_blank" id="nav-app12">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/starbucks2.png" alt="" width="25"></i>Starbucks2
    </a>
  </li>
  <?php endif; ?> 

  <?php if ($_SESSION["Permisos"]["MenuCapacitacion"] === 1): ?>
  <li class="bold" id="aside-capacitacion">
    <a class="waves-effect" href="../capacitacion/index.php" id="nav-app13">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/capacitacion.png" alt="" width="25"></i>Capacitación
    </a>
  </li>
  <?php endif; ?> 

  <?php if ($_SESSION["Permisos"]["MenuInventario"] === 1): ?>
  <li class="bold" id="aside-inventario">
    <a class="waves-effect" href="../inventarioSistemas/index.php" id="nav-app13">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/inventario_sistemas.png" alt="" width="25"></i>Inventario
    </a>
  </li>
  <?php endif; ?>

  <?php if ($_SESSION["Permisos"]["MenuNissan"] === 1): ?>
  <li class="bold" id="aside-nissan">
    <a class="waves-effect" href="../nissan/index.php" id="nav-app14">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/nissan.png" alt="" width="25"></i>Nissan Scan
    </a>
  </li>
  <?php endif; ?>

  <!--li class="bold" id="aside-consumibles">
    <a class="waves-effect" href="../nissanTipo.php" id="nav-app15">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/consumibles.png" alt="" width="25"></i>Inv.Consumibles
    </a>
  </li--> 

  <?php if ($_SESSION["Permisos"]["MenuCotizador"] === 1): ?>   
  <li class="bold" id="aside-cotizador">
    <a class="waves-effect" href="../cotizador/index.php" id="nav-app16">
      <i class="material-icons blue-text text-darken-4"><img src="../icons/presupuesto.png" alt="" width="25"></i>Cotizador
    </a>
  </li>
  <?php endif; ?>  

  <li class="bold" id="aside-atras">
    <a class="waves-effect" href="../" id="nav-app16">
      <i class="material-icons">arrow_back</i>Atras
    </a>
  </li>

  <li><div class="divider"></div></li>
  <li class="bold">
    <a class="waves-effect" href="../cerrar.php" id="nav-tickets1">
      <i class="material-icons">exit_to_app</i>Salir
    </a>
  </li>
</ul>
</ul>  
</aside>
