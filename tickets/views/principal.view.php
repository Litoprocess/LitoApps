<!DOCTYPE html>
<html lang="es">
<?php require 'layout/head.php' ?>
<body>
  <header>

  </header>
  <main class="container">
    <?php require 'layout/aside.php' ?>
    <div class="row">
      <h3 class="center-align">Bienvenido al sistema de tickets</h3>
    </div>
    <div class="row">      
      <div class="col s12 m3" id="princi-sistemas">
        <div class="center promo">
          <a href="sistemas-tipo.php"><i class="material-icons red-text text-darken-4">desktop_windows</i></a>
          <p class="promo-caption">Sistemas</p>
        </div>
      </div>

      <div class="col s12 m3" id="princi-manto">
        <div class="center promo">
          <a href="manto-tipo.php"><i class="material-icons green-text text-darken-4">settings</i></a>     
          <p class="promo-caption">Mantenimiento</p>
        </div>
      </div>

      <div class="col s12 m3" id="princi-mensaje1">
        <div class="center promo">
          <a href="mensaje-tipo1.php"><i class="material-icons blue-text text-darken-4">mail_outline</i></a>
          <p class="promo-caption">Mensajería 1</p>
        </div>
      </div>

      <div class="col s12 m3" id="princi-mensaje2">
        <div class="center promo">
          <a href="mensaje-tipo2.php"><i class="material-icons yellow-text text-darken-4">mail_outline</i></a>
          <p class="promo-caption">Mensajería 2</p>
        </div>
      </div>
      </div>      
    </div>
  </main>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

</body>
<script>

  $(document).ready(function() {

    $('.modal').modal();
    $(".dropdown-button").dropdown();
    $('.button-collapse').sideNav();

    switch(<?php echo $_SESSION["UserSistemas"];?>){

      case 1: $('#li-usuario, #li-agente, #li-admin').show();
      break;

      case 2: $('#li-admin').hide();
      break;

      case 3: $('#li-usuario, #li-agente, #li-admin').hide();
      break;

      default: alert("No se detecto tipo de usuario");
      break;

    }

    if(<?php echo $_SESSION["MenuSistemas"];?> != 1){

      $('#aside-sistemas').hide();
      $('#princi-sistemas').hide();

    }

    if(<?php echo $_SESSION["MenuManto"];?> != 1){

      $('#aside-manto').hide();
      $('#princi-manto').hide();

    }

    if(<?php echo $_SESSION["MenuMensaje1"];?> != 1){

      $('#aside-mensaje1').hide();
      $('#princi-mensaje1').hide();

    }

    if(<?php echo $_SESSION["MenuMensaje2"];?> != 1){

      $('#aside-mensaje2').hide();
      $('#princi-mensaje2').hide();

    }

  } );

</script>
</script>
</html>