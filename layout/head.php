<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/estilos.panel.css" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="png" href="img/favicon.png" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LitoApps</title>
</head>
<body>
  <?php require 'layout/aside.php'; ?>
  <header style="  width: 100%; position: fixed; z-index: 100;">
    <ul class="dropdown-content" id="user_dropdown">
      <li><a href="cerrar.php" class="indigo-text text-darken-3" href="#!">Salir</a></li>
    </ul>
    <nav class="indigo darken-3" role="navigation">
      <div class="nav-wrapper">
        <a id="efecto" style="margin-left: 35px; font-size:24px;" class="breadcrumb" href="#!"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">view_module</i></a>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="#!name" class='right dropdown-button' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
            <span style="margin-left: 50px; font-size:14px;" class="white-text breadcrumb name">
              <?php echo $_SESSION["Permisos"]["Departamento"];?>         
            </span>
            <span style="font-size:14px;" class="breadcrumb"><?php echo $_SESSION["Permisos"]["NombreUsuario"];?></span>
          </li>          
        </ul> 
        <!--a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">view_module</i></a-->
        <ul class="side-nav" id="mobile-demo">                                              
          <li><a href="cerrar.php">Cerrar sesión</a></li>
        </ul>        
      </div>
    </nav>
  </header>
