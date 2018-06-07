<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
		<div class="col s3">
			<form name="registroEmpleados" id="registroEmpleados" method="POST">
				<div class="row">
					<div class="col s12">
						<label>Id Proveedor</label>
						<select class="browser-default" name="proveedor" id="proveedor" required>
							<option value="ELIGE" selected disabled>ELIGE</option>
						</select>			
					</div>					
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="nombre" id="nombre" required class="validate">
						<label class="active" for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="edad" id="edad" required class="validate">
						<label class="active" for="edad">Edad</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<label>Genero</label>
						<select class="browser-default" name="genero" id="genero" required>
							<option value="ELIGE" selected disabled>ELIGE</option>
							<option value="FEMENINO">FEMENINO</option>
							<option value="MASCULINO">MASCULINO</option>					
						</select>			
					</div>				
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="imss" id="imss" data-length="11" class="validate" required>
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
						<!--button class="waves-effect blue-grey lighten-5 btn-flat" id="cancelaEmpleado">Cancelar</button-->	
						<a class="waves-effect waves-light btn" id="cancelaEmpleado">Limpiar</a>
					</div>	
				</div>				  					  		  									
			</form>						
		</div>

		<div class="col s3">
			<div id='clave'>
				<a class="waves-effect waves-light btn btn-clave" id='claveG'>No.Asignación</a>
			</div>				
		</div>

		<div class="col s6">
			<div id='regEmpleados'>
			<table id="consultaEmpleados" class="hover compact row-border" cellspacing="0" width="100%" style=" font-size:70%; text-align: center;">
				<thead>
					<tr>
						<th>ClaveID</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Genero</th>
						<th>No_Imss</th>																	
						<th>ID_proveedor</th>								
					</tr>
				</thead>
				<tbody>
					<!--Registrs desde BD-->
				</tbody>
			</table>
			</div>				
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
<script type="text/javascript" src="js/empleados.js"></script>
</body>
</html>