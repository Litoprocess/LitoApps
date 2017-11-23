<?php require 'views/head.php'; ?>
<main class="container">
  <h5>Reprocesos/Consulta Reprocesos</h5>   
  <div class="row">
    <div class="col s12">
        <table id="tblConsultaReproceso" class="hover row-border compact" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No.Orden</th> 
              <th>Departamento</th>
              <th>Nombre Trabajo</th>         
              <th>Nombre Cliente</th>          
              <th>Fecha Orden</th>
              <th>Cantidad</th>
              <th>Importe Cotizado</th>
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
<script type="text/javascript" src="js/getConsultaReprocesos.js"></script>
</body>
</html>