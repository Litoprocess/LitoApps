<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="Autor" content=" Ing.Sergio Andres Garcia Vazquez">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="png" href="../img/favicon.png" />   
  <link type="text/css" rel="stylesheet" href="../css/jquery.dataTables.min.css"/>
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/estilos.panel.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.cotizador.css">
  <title>Cotizador de Plotter</title>
</head>
<body>
  <?php require 'layout/aside.php'; ?>

  <header style="width: 100%; position: fixed; z-index: 100;">

    <ul class="dropdown-content" id="user_dropdown">
      <li><a href="#!" class="indigo-text text-darken-3"><?php echo $_SESSION["Permisos"]["NombreUsuario"];?></a></li>
      <li><a href="../cerrar.php" class="indigo-text text-darken-3">Salir</a></li>
    </ul>

    <nav class="indigo darken-3 nav-extended">
      <div class="nav-wrapper">
        <a style="margin-left: 50px; font-size:22px;" class="breadcrumb" href="#!">Cotizador de Plotter</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>  
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li id="cotizador"><a href="index.php">Cotizador</a></li>
        <li id="listado"><a href="listado.php">Listado</a></li> 
            <a href="#!name" class='right dropdown-button' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>       
        </ul>
        <ul class="side-nav" id="mobile-demo">
        <li id="cotizador"><a href="index.php">Cotizador</a></li>  
        <li id="listado"><a href="listado.php">Listado</a></li>                        
          <li><div class="divider"></div></li>                        
          <li class="bold" id="aside-atras"><a href="../" id="nav-tickets3">Atras</a></li>
          <li><div class="divider"></div></li>                                               
          <li><a href="../cerrar.php">Cerrar sesión</a></li>
        </ul>      
      </div>
    </nav>
  </header>