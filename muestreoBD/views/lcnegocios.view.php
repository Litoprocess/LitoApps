<?php require 'views/head.php'; ?>
	<main class="container">
		<h5 class="blue-text text-darken-4 center-align">Linea de Credito de Negocios Telmex(1194)</h5>
		<br>
		<div class="row">
			<div  class="input-field offset-s5 col s2 offset-m5 col m2 offset-l5 col l2 offset-xl5 col xl2">
				<input id="telefono" type="text" class="validate center-align">
				<label for="telefono" class="active grey-text text-darken-4 center-align">Teléfono</label>
			</div>			
		</div>
		<div class="row">
			<div  class="input-field offset-s3 col s6 offset-m3 col m6 offset-l3 col l6 offset-xl3 col xl6">
				<input readonly id="nombre" type="text" class="validate">
				<label for="nombre" class="active grey-text text-darken-4 center-align"></label>					
			</div>	
			<div  class="input-field offset-s3 col s6 offset-m3 col m6 offset-l3 col l6 offset-xl3 col xl6">     				
				<input readonly id="dir1" type="text" class="validate">
				<label for="dir1" class="active grey-text text-darken-4 center-align"></label>
			</div>
			<div class="input-field offset-s3 col s6 offset-m3 col m6 offset-l3 col l6 offset-xl3 col xl6"> 
				<input readonly id="dir2" type="text" class="validate">
				<label for="dir2" class="active grey-text text-darken-4 center-align"></label>
			</div>
			<div  class="input-field offset-s3 col s6 offset-m3 col m6 offset-l3 col l6 offset-xl3 col xl6">
				<input readonly id="colonia" type="text" class="validate">
				<label for="colonia" class="active grey-text text-darken-4 center-align"></label>
			</div>
			<div  class="input-field offset-s3 col s6 offset-m3 col m6 offset-l3 col l6 offset-xl3 col xl6">	
				<input readonly id="ciudad" type="text" class="validate">
				<label for="ciudad" class="active grey-text text-darken-4 center-align"></label>
			</div>					
		</div>
		<div class="row">
			<div  class="input-field offset-s4 col s2 offset-m4 col m2 offset-l4 col l2 offset-xl4 col xl2">     				
				<input readonly id="cp" type="text" class="validate">
				<label for="cp" class="active grey-text text-darken-4 center-align"></label>
			</div>
			<div class="input-field col s2 col m2 col l2 col xl2"> 
				<input readonly id="estado" type="text" class="validate">
				<label for="estado" class="active grey-text text-darken-4 center-align"></label>
			</div>	
		</div>	
		<div class="row">
			<div  class="input-field offset-s5 col s2 offset-m5 col m2 offset-l5 col l2 offset-xl5 col xl2">	
				<input readonly id="credito" type="text" class="validate">
				<label for="credito" class="active grey-text text-darken-4 center-align"></label>
			</div>			
		</div>
		<div class="row">
			<div  class="input-field offset-s4 col s2 offset-m4 col m2 offset-l4 col l2 offset-xl4 col xl2">	
				<input readonly id="importe_permor" type="text" class="validate">
				<label for="importe_permor" class="active grey-text text-darken-4 center-align"></label>
			</div>	
			<div  class="input-field col s2 col m2 col l2 col xl2">     				
				<input readonly id="importe_perfis" type="text" class="validate">
				<label for="importe_perfis" class="active grey-text text-darken-4 center-align"></label>
			</div>	</div>	
			<br>
			<br>
			<div class="row">
				<div class="input-field col s6 col m6 col l6 col xl6">
					<!-- Modal Trigger -->
					<a id="error" class="waves-effect waves-green btn-flat right" href="#modal1">Erroneo</a>			
					<!--a id="btn-erroneo" class="waves-effect waves-light indigo darken-4 btn">Erroneo</a-->			
				</div>
				<div class="input-field col s6 col m6 col l6 col xl6"> 
					<a id="btn-correcto" class="waves-effect waves-light green darken-4 btn left">Correcto</a>
				</div>
			</div>	
		</main>
	</div>
	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h6>AGREGA UN COMENTARIO</h6>
			<div class="input-field col s12 col m12 col l12 col xl12">
				<textarea id="comentario" class="materialize-textarea"></textarea>
				<label for="comentario">Opcional</label>
			</div>
		</div>
		<div class="modal-footer">
			<a id="btn-erroneo" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Enviar</a>
		</div>
	</div>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/lcnegocios.js"></script>
</body>
</html>


