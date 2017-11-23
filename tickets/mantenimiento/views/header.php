<!DOCTYPE html>
<html lang="es">

<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />

  <link type="text/css" rel="stylesheet" href="../css/jquery.dataTables.min.css" />

  <link type="text/css" rel="stylesheet" href="../css/responsive.dataTables.min.css" />

  <link type="text/css" rel="stylesheet" href="../css/estilos.css" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <script>
    localStorage.setItem("Correo2", "<?php echo $_SESSION["CorreoCopia"];?>");
  </script>

</head>

<body>
  <header>

    <nav class="green darken-4">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Mantenimiento - Tickets</a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li id="li-usuario"><a href="usuarios.php">Usuario</a></li>
          <li id="li-agente"><a href="agentes.php">Agente</a></li>
          <li id="li-admin"><a href="solicitudes.php">Solicitudes</a></li>
        </ul>
        <ul class="side-nav" id="slide-out">
          <li>
            <div class="userView">
              <div class="background">
                <img src="../images/lito-planta.jpg" class="responsive-img">
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
          <li id="side-user"><a href="usuarios.php">Usuario</a></li>
          <li id="side-agente"><a href="agentes.php">Agente</a></li>
          <li id="side-solicitud"><a href="solicitudes.php">Solicitudes</a></li>
          <li><div class="divider"></div></li>
          <li><a href="cerrar.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>
    <?php require 'layout/aside.php' ?>
  </header>
