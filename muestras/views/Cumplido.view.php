<?php require 'views/head.php'; ?>
<main class="container dt-responsive">
  <div class="row">
    <div class="col s12">
      <table id="tblCumplido" class="hover row-border compact" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No.Orden</th>
            <th>Trabajo</th>
            <th>Cant.Entregar</th>         
            <th>Cant.Entregada</th>          
            <th>Cant.Muestra</th>
            <th>Estatus</th>                    
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
<script type="text/javascript" src="js/Cumplido.js"></script>
</body>
</html>