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
  <title>Cotizador</title>
  <style>
  
  </style>
</head>
<body>

  <?php require 'layout/aside.php'; ?>
  <header style="width: 100%; position: fixed; z-index: 100;">
    <ul class="dropdown-content" id="user_dropdown">
      <li><a href="#!" class="indigo-text text-darken-3"><?php echo $_SESSION["Permisos"]["NombreUsuario"];?></a></li>
      <li><a href="cerrar.php" class="indigo-text text-darken-3" href="#!">Salir</a></li>
    </ul>
    <nav class="indigo darken-3" role="navigation">
      <div class="nav-wrapper">
        <a style="margin-left: 50px; font-size:24px;" class="breadcrumb" href="#!">Cotizador</a>
        <a data-activates="slide-out" class="button-collapse show-on-" href="#!"></a>

        <ul class="right hide-on-med-and-down">
          <li id="li-abrir" style="display: none;">
            <a id="abrir" class="waves-effect" href="#dialogabrir"><i class="material-icons">folder_open</i></a>
            <div class="txt-nav">abrir</div>          
          </li>
          <li  id="li-guardar" style="display: none;">
            <a id="guardar" class="waves-effect" href="#dialogguardar"><i class="material-icons center">save</i></a>
            <div class="txt-nav">guardar</div>
          </li>
          <li  id="li-imprimir2" style="display: none;">
            <a id="imprimir2" class="waves-effect" href="#!"><i class="material-icons center">print</i></a>
            <div class="txt-nav">imprimir</div>
          </li>  
          <li  id="li-imprimir3" style="display: none;">
            <a id="imprimir3" class="waves-effect" href="#!"><i class="material-icons center">print</i></a>
            <div class="txt-nav">reimprimir</div>
          </li>          
          <li id="li-imprimirord" style="display: none;">
            <a id="imprimirord" class="waves-effect" href="#!"><i class="material-icons center">chrome_reader_mode</i></a>
            <div class="txt-nav">orden</div>
          </li>                   
          <li  id="li-limpiar" style="display: none;">
            <a id="limpiar" class="waves-effect" href="#!"><i class="material-icons">cancel</i></a>
            <div class="txt-nav">borrar</div>
          </li>          
          <li>
            <a href="#!name" class='right dropdown-button' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">view_module</i></a>
      </div>
    </nav>
  </header>