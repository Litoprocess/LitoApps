  <?php require 'head.php' ?>
    <div class="row">
      <br>
      <br>
      <div class="col s10 offset-s2">
        <table id="directorio" class="row-border compact" cellspacing="0" width="100%">
          <caption style="background: blue;"><b>Litoprocess</b></caption>
          <thead>
            <tr class="lista">
              <th id="extension">Extensión</th>
              <th id="nombre">Nombre</th>
              <th id="departamento">Departamento</th>   
              <th id="puesto">Puesto</th>   
              <th id="correo">Correo</th>                                              
            </tr>
          </thead>
          <tbody class="nombres">
          <!--Registros de la BD-->                                                       
          </tbody>
        </table>          
      </div>
    </div>
    <?php require '../layout/scripts.php'; ?>
    <script type="text/javascript" src="js/directorio.js"></script>
  </body>
</html>