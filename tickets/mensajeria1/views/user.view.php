<?php require 'views/header.php' ?>
<main class="container">

  <div class="row">
    <div class="col m8">
      <h4>Registro de tickets</h4>
    </div>
    <div class="col m4">
      <div class="right">
        <p>
          <input type="checkbox" class="filled-in" id="chkMostrar" />
          <label for="chkMostrar">Mostrar tickets cerrados</label>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">    
      <div id="Tabla">
        <table id="tbl-pendiente" class="hover cell-border compact" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Título</th>
              <th>Empresa</th>
              <th>Fecha de Entrega</th>
              <th>Hora de Entrega</th>
              <th>Prioridad</th>
              <th>Estatus</th>
              <th>Fecha finalizado</th>
              <th>Detalle</th>
              <th>Reporte</th>
            </tr>
          </thead>
          <tbody>
            <!--Datos traidos desde la base de datos-->
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="fixed-action-btn" style="bottom: 4%; right: 2%;">
    <a class="btn-floating btn-large waves-effect waves-light red" id="btn-AddTicket"><i class="material-icons">add</i></a>
  </div>

</main>

<!-- Tap Target Structure -->
<div class="tap-target" data-activates="btn-AddTicket">
  <div class="tap-target-content">
    <h5>Botón agregar</h5>
    <p>Aquí puede agregar un ticket</p>
  </div>
</div>

<!-- SegTicket (Seguimiento de Tickets)-->
<?php require ('../templates/AddEnvio.php'); ?>

<!-- SegTicket (Seguimiento de Tickets)-->
<?php require ('../templates/SeguimientoTicket.php'); ?>

<?php require ('../layout/scripts.php'); ?>
<script type="text/javascript" src="js/mod-clientes.js?v=<?php echo(rand()); ?>"></script>

</body>
</html>