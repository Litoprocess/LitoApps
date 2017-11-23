<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
		<div class="col s2">
			<form name="registroEmpleados" id="registroEmpleados" method="POST">
				<div class="row">
					<div id="dato2" class="col s12">
						<label>Id Proveedor</label>
						<select class="browser-default" name="proveedor" id="proveedor" required>
						</select>			
					</div>					
				</div>
				<div class="row">
					<div id="dato2" class="input-field col s12">
						<input type="text" name="nombre" id="nombre" required class="validate">
						<label class="active" for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">
					<div id="dato2" class="input-field col s12">
						<input type="text" name="edad" id="edad" required class="validate">
						<label class="active" for="edad">Edad</label>
					</div>
				</div>
				<div class="row">
					<div id="dato2" class="col s12">
						<label>Genero</label>
						<select class="browser-default" name="genero" id="genero" required>
							<option>Seleccionar...</option>
							<option>Femenino</option>
							<option>Masculino</option>					
						</select>			
					</div>				
				</div>
				<div class="row">
					<div id="dato2" class="input-field col s12">
						<input type="text" name="imss" id="imss" required class="validate">
						<label class="active" for="imss">No. IMSS</label>
					</div>					
				</div>
				<div class="row">
					<div id='errorImss'></div>
					<div id='msjConfirmaciondos' class='negrita'></div>							
				</div>												
				<div  class="row centeremp">
					<div class="btn-guardar col s2">
						<button class="waves-effect green darken-4 btn" id="guardaEmpleado">Guardar</button>	
					</div>	
					<div class="btn-limpiar col s2 offset-s6">
						<button class="waves-effect blue-grey lighten-5 btn-flat" id="cancelaEmpleado">Cancelar</button>	
					</div>	
				</div>				  					  		  									
			</form>						
		</div>

		<div class="col s3">
			<div id='claveG'>
				No.Asignación
			</div>				
		</div>

		<div class="col s7">
			<div id='regEmpleados'>
				<table id='consultaEmpleados'></table>
			</div>				
		</div>

	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/jquery-ui-custom.min.js"></script>
<script type="text/javascript" src="js/guardar.js"></script>
<script type="text/javascript" src="js/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="js/grid.locale-en.js"></script>
<script type="text/javascript" src="js/grids.js"></script>
<script type="text/javascript" src="js/regEmpleados.js"></script>
</body>
</html>