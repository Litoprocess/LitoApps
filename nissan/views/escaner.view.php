<?php require 'views/head.php'; ?>

<main class="container">
  <div class="row">
  <div class="col s4">
    <h5>Escaner</h5>
</div>
    <div class="col s4">
      <br>
      <div class="row">
        <div class="input-field col s6">
          <input id="guia" name="sku" type="text" class="validate">
          <label for="guia">GUIA</label>
        </div>
        <div class="input-field col s6">
          <input id="sku" name="sku" type="text" class="validate">
          <label for="sku">SKU</label>
        </div>
      </div>                     
    </div>
    <div class="row">
      <div class="offset-s1 col s11">
        <div id="alerta" class="alerta">

        </div>        
      </div>
    </div>
    <div class="row">
      <div class="offset-s2 col s8">
        <div id="btnalerta">

        </div>        
      </div>
    </div>    
</div>
</main>

<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/escanear.js"></script>
</body>
</html>