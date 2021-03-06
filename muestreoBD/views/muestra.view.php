<?php require 'views/head.php'; ?>
<main class="container">
	<h4 class="blue-text text-darken-4 center-align">Muestreo TELMEX</h4>
	<div class="row">
		<div  class="input-field offset-s5 col s2">
			<input id="telefono" type="text" class="validate center-align">
			<label for="telefono" class="active grey-text text-darken-4 center-align">Teléfono</label>
		</div>			
	</div>
	<div class="row">
		<div  class="input-field offset-s3 col s6">
			<input readonly id="nombre" type="text" class="validate">
			<label for="nombre" class="active grey-text text-darken-4 center-align"></label>					
		</div>	
		<div  class="input-field offset-s3 col s6">     				
			<input readonly id="dir1" type="text" class="validate">
			<label for="dir1" class="active grey-text text-darken-4 center-align"></label>
		</div>
		<div class="input-field offset-s3 col s6"> 
			<input readonly id="dir2" type="text" class="validate">
			<label for="dir2" class="active grey-text text-darken-4 center-align"></label>
		</div>
		<div  class="input-field offset-s3 col s6">
			<input readonly id="dir3" type="text" class="validate">
			<label for="dir3" class="active grey-text text-darken-4 center-align"></label>
		</div>
		<div  class="input-field offset-s3 col s6">	
			<input readonly id="ciudad" type="text" class="validate">
			<label for="ciudad" class="active grey-text text-darken-4 center-align"></label>
		</div>					
	</div>
	<div class="row">
		<div  class="input-field  offset-s3 col s2">     				
			<input readonly id="cp" type="text" class="validate">
			<label for="cp" class="active grey-text text-darken-4 center-align"></label>
		</div>
		<div class="input-field col s2"> 
			<input readonly id="estado" type="text" class="validate">
			<label for="estado" class="active grey-text text-darken-4 center-align"></label>
		</div>	
		<div  class="input-field col s2">
			<input readonly id="municipio" type="text" class="validate">
			<label for="municipio" class="active grey-text text-darken-4 center-align"></label>
		</div>		
	</div>	
	<div class="row">
		<div  class="input-field offset-s4 col s2">	
			<input readonly id="fact_mensual" type="text" class="validate">
			<label for="fact_mensual" class="active grey-text text-darken-4 center-align"></label>
		</div>	
		<div  class="input-field col s2">     				
			<input readonly id="pago_mensual" type="text" class="validate">
			<label for="pago_mensual" class="active grey-text text-darken-4 center-align"></label>
		</div>	</div>	
	<br>
	<br>
	<div class="row">
				<div class="input-field col s6">
			<!-- Modal Trigger -->
			<a class="waves-effect waves-green btn-flat right" href="#modal1">Erroneo</a>			
			<!--a id="btn-erroneo" class="waves-effect waves-light indigo darken-4 btn">Erroneo</a-->			
		</div>
		<div class="input-field col s6"> 
			<a id="btn-correcto" class="waves-effect waves-light green darken-4 btn left">Correcto</a>
		</div>
	</div>	
</main>

<!-- Modal Structure -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<h6>AGREGA UN COMENTARIO</h6>
		<div class="input-field col s12">
			<textarea id="comentario" class="materialize-textarea"></textarea>
			<label for="comentario">Opcional</label>
		</div>
	</div>
	<div class="modal-footer">
		<a id="btn-erroneo" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Enviar</a>
	</div>
</div>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/Lector.js"></script>
</body>
</html>


