<?php require 'views/header.php' ?>
<main class="container">

  <div class="row">
  <div class="col m8">
      <h4>Solicitudes de servicio</h4>
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
      <div id="tabla" class="agente">
        <table id="all-tickets" class="hover cell-border compact" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>N°</th>
              <th>Solicita</th>
              <th>Título</th>
              <th>Descripción</th>
              <th>Registro</th>
              <th>Prioridad</th>
              <th>Compromiso</th>
              <th>Estatus</th>
              <th>Finalizado</th>
              <th>Detalle</th>
              <th>Correo</th>
            </tr>
          </thead>
          <tbody id="body-tabla">
            <!--Registrs desde BD-->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<!-- SegTicket (Seguimiento de Tickets)-->
<?php require ('../templates/SeguimientoAgente.php'); ?>

<?php require ('../layout/scripts.php'); ?>
<script type="text/javascript" src="js/mod-agente.js"></script>


</body>
</html>
