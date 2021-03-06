<?php require 'views/header.php' ?>
<main class="container">

  <div class="row">
    <div class="col m8">
    <h4>Administración de solicitudes</h4>
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
    <div class="col m12">
      <table id="all-tickets" class="hover cell-border compact" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>N°</th>
            <th>Solicita</th>
            <th>Nombre empresa</th>
            <th>Título</th>
            <th>Detalles</th>
            <th>Departamento</th>
            <th>Fecha registro</th>
            <th>Prioridad</th>
            <th>Fecha entrega</th>
            <th>Hora entrega</th> 
            <th>Estatus</th>   
            <th>Finalizado</th>
            <th>Detalle</th>
            <th>Reporte</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody id="body-tabla">
          <!--Registrs desde BD-->
        </tbody>
      </table>
    </div>
  </div>

</main>

<!-- SegTicket (Seguimiento de Tickets)-->
<?php require ('../templates/SeguimientoAgente.php'); ?>

<?php require ('../layout/scripts.php'); ?>
<script type="text/javascript" src="js/mod-solicitudes.js?v=<?php echo(rand()); ?>"></script>

</body>
</html>
