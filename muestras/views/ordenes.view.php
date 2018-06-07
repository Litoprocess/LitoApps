<?php require 'views/head.php'; ?>
<style>
  table.dataTable.compact tbody th, table.dataTable.compact tbody td {
    padding: 0px;
}
</style>
<main class="dt-responsive">
  <div class="row">
    <h5>Ordenes</h5>
  </div>
  <div class="row">
    <div class="col s12 offset-m2 m8 offset-l2 l8 offset-xl2 xl8">
        <table id="registros" class="hover row-border compact" cellspacing="0" width="100%" style="font-size:80%;">
          <thead>
            <tr>
              <th>No.Orden</th>
              <th>Trabajo</th>
              <th>Cant.Entregar</th>         
              <th>Cant.Entregada</th>                                  
              <th>Cant.Muestra</th>
              <th>N/A</th>                    
            </tr>
          </thead>
          <tbody>
            <!--Registrs desde BD-->
          </tbody>
        </table>
    </div>
  </div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/ControlMuestras.js"></script>
</body>
</html>