<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="Autor" content=" Ing.Sergio Andres Garcia Vazquez">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" type="png" href="../img/favicon.png" />   
  <link type="text/css" rel="stylesheet" href="../css/jquery.dataTables.min.css"/>
  <link type="text/css" rel="stylesheet" href="../css/buttons.dataTables.min.css"/>
  <link type="text/css" rel="stylesheet" href="../css/select.dataTables.min.css"/>  
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/estilos.panel.css">
  <link rel="stylesheet" type="text/css" href="css/estilosMuestras.css">
  <title>Control de Muestras</title>
</head>

<body>
  <?php require 'layout/aside.php'; ?>
  <header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a href="#!" class="indigo-text text-darken-3"><?php echo $_SESSION["Permisos"]["NombreUsuario"];?></a></li>
      <li><a href="../cerrar.php" class="indigo-text text-darken-3">Salir</a></li>
    </ul>

    <nav class="nav-extended indigo darken-3">
      <div class="nav-wrapper">
        <a style="margin-left: 50px; font-size:22px;" class="breadcrumb" href="#!">Ordenes</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

          <?php switch( $_SESSION['Permisos']["UserMuestras"] ) { 
          case 3: ?>
          <li id="ordenes"><a class="active" href="ordenes.php">Ordenes</a></li>
          <li id="noaplica"><a href="noaplica.php">No aplica</a></li>
          <li id="cumplido"><a href="cumplido.php">Cumplido</a></li>
          <li id="nocumplido"><a href="nocumplido.php">No cumplido</a></li>              
          <?php
          break;

          default:;
          break;
           } ?>   

          <a href="#!name" class='right dropdown-button' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
        </ul>
        <ul class="side-nav" id="mobile-demo">

          <?php switch( $_SESSION['Permisos']["UserMuestras"] ) { 
          case 3: ?>
          <li><a href="ordenes.php">Ordenes</a></li>
          <li><a href="noaplica.php">No aplica</a></li>
          <li><a href="cumplido.php">Cumplido</a></li>
          <li><a href="nocumplido.php">No cumplido</a></li>              
          <?php
          break;

          default:;
          break;
           } ?>    

          <li><div class="divider"></div></li>                        
          <li class="bold" id="aside-atras"><a href="../" id="nav-tickets3">Atras</a></li>
          <li><div class="divider"></div></li>                                               
          <li><a href="../cerrar.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>
</header>