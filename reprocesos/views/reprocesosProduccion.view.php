<?php require 'views/head.php'; ?>

<main class="container">
	<h5>Reprocesos/Producci&oacute;n</h5>		
	<div class="row">
		<div class="offset-s3 col s6 offset-s3"><!--id="formNuevo" class="reprocesosProd"-->	
			<form id="reprocesosProduccion" method="POST">
				<div class="row">
					<div class="input-field col s3">
						<input style="text-transform: uppercase" type="text" name="orden" id="orden"/>				
						<label for="orden" class="lblFechas">Orden</label>			
					</div>						
				</div>

				<div class="row">
					<div class="col s5">
						<label for="TipoRegistro" class="lblFechas">Tipo de Registro</label>		
						<select class="browser-default" name="TipoRegistro" id="TipoRegistro">
							<option value="0">-- Seleccionar una opci&oacute;n --</option>
							<option value="CC">Con Costo</option>
							<option value="SC">Sin Costo</option>
							<option value="CP">Con Costo Parcial</option>
						</select>							
					</div>	
				</div>	 				

				<div class="row">
					<div class="input-field col s8">
						<input style="text-transform: uppercase" type="Text" name="trabajo" id="trabajo" readonly="readonly"/>			
						<label for="trabajo" class="lblFechas">Trabajo</label>	
					</div>						
				</div>

				<div class="row">
					<div class="input-field col s8">
						<input style="text-transform: uppercase" type="text" name="cliente" id="cliente" readonly="readonly"/>
						<label for="cliente" class="lblFechas">Cliente</label>						
					</div>						
				</div>
				
				<div class="row">
					<div class="input-field col s5">
						<input class="campo_fecha required" type="text" name="fRegistro" id="fRegistro" readonly="readonly"/>				
						<label for="fRegistro" class="lblFechas">Fecha</label>						
					</div>						
				</div>

				<div class="row">
					<div class="input-field col s5">
						<input type="text" name="cantidad" id="cantidad"/>
						<label for="cantidad" class="lblFechas">Cantidad Solicitada</label>						
					</div>						
				</div>

				<div class="row">
					<div class="col s8">
						<label for="error" class="lblFechas">Error de</label>
						<select class="browser-default" name="error" id="error">
							<option value="0" SELECTED>-- Seleccionar una opci&oacute;n --</option>
							<option>A. MANUAL</option>
							<option>ACAB. ESPECIAL</option>
							<option>ACAB.LITO</option>
							<option>ALMACEN</option>
							<option>CALIDAD</option>
							<option>CLIENTE</option>
							<option>ENTREGAS</option>
							<option>EXTERNA</option>
							<option>INTERNA</option>
							<option>LITERATURA VW</option>
							<option>OFFSET</option>
							<option>OPERACIONES/PRODUCCI&Oacute;N</option>
							<option>PREPRENSA</option>
							<option>PROCESO MAQUILA INTERNA</option>
							<option>PROVEEDOR MAQUILA</option> 
							<option>SISTEMAS</option>
							<option>VENTAS</option>
							<option>IMPRESIÓN INDIGO</option>
							<option>IMPRESIÓN NUBERAS</option>
							<option>IMPRESIÓN BUSKRO</option>
						</select>							
					</div>						
				</div>

				<div class="row">
					<div class="input-field col s5">
						<input type="text" name="importCot" id="importCot"/>
						<label for="importCot" class="lblFechas">Importe Cotizado</label>						
					</div>						
				</div>

				<div class="row">
					<div class="input-field col s12">
						<textarea  id="notas" class="materialize-textarea" style="text-transform: uppercase" name="notas"></textarea>
						<label for="notas" class="lblFechas">Notas</label>
					</div>						
				</div>					
			</form>
			<div id="row">	
				<div class="col s3">
					<!--input class="botones_input" type="submit" value="Guardar" id="guardar" name="guardar"-->
					<button id="guardar" class="btn waves-effect waves-light indigo darken-4" type="submit">Guardar</button>		
				</div>

				<div class="offset-s2 col s3">
					<!--input class="botones_input" type="button" value="Limpiar" id="limpiar" name="limpiar" onclick="CleanForm_Reprocesos()"-->
					<button id="limpiar" class="btn waves-effect waves-light grey lighten-3 black-text">Limpiar</button>		

				</div>
			</div>						
		</div>
		<!--div style="display:inline-block; height:50px; width:100%;"></div-->
	</div>				
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/getReprocesoProduccion.js"></script>
</body>
</html>