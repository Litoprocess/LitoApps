<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
        <div class="input-field col s6">
          <input id="ops" name="ops" type="text" class="validate">
          <label for="ops">Orden de producción</label>
        </div>	

        <div id="div1">
 			<!--a href="#" onclick="window.open('192.168.2.217:100/L13279_Orden%20de%20produccion.htm')">CLICK ME</a-->        	
 			<!--a href="//192.168.2.217:100/L13279_Orden%20de%20produccion.htm" target="_blank">click</a-->

			<!--input type="file" id="file-input" />
			<h3>Contenido del archivo:</h3-->
			<!--pre id="contenido-archivo"></pre--> 
			<!--iframe id="contenido-archivo" src="URL"></iframe-->

        </div>	
	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/informes.js"></script>

<!--script>
function leerArchivo(e) {
  var archivo = e.target.files[0];
  console.log(archivo);
  if (!archivo) {
    return;
  }
  var lector = new FileReader();
  lector.onload = function(e) {
    var contenido = e.target.result;
    mostrarContenido(contenido);
  };
  lector.readAsText(archivo);
}

function mostrarContenido(contenido) {
  var elemento = document.getElementById('contenido-archivo');
  elemento.innerHTML = contenido;
}

document.getElementById('file-input')
  .addEventListener('change', leerArchivo, false);
</script-->

</body>
</html>