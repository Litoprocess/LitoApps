<?php require 'views/head.php'; ?>

<main class="container">
	<h5>Quejas Clientes</h5>		
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
						<label for="TipoRegistro" class="lblFechas">Tipo</label>		
						<select class="browser-default" name="TipoRegistro" id="TipoRegistro">
							<option value="0">-- Seleccionar una opci&oacute;n --</option>
							<option value="QUEJA">QUEJA</option>
							<option value="FELICITACION">FELICITACION</option>
						
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
					<div class="col s8">
						<label for="Departamentos" class="lblFechas">Departamentos</label>
						<select class="browser-default" name="Departamentos" id="Departamentos">
							<option value="0" SELECTED>-- Seleccionar una opci&oacute;n --</option>
							<option value="LITOPROCESS">LITOPROCESS</option>
							<option value="A. MANUAL">A. MANUAL</option>
							<option value="ACAB. ESPECIAL">ACAB. ESPECIAL</option>
							<option value="ACAB.LITO">ACAB.LITO</option>
							<option value="ALMACEN">ALMACEN</option>
							<option value="CALIDAD">CALIDAD</option>
							<option value="CLIENTE">CLIENTE</option>
							<option value="ENTREGAS">ENTREGAS</option>
							<option value="LITERATURA VW">LITERATURA VW</option>
							<option value="OFFSET">OFFSET</option>
							<option value="OPERACIONES/PRODUCCION">OPERACIONES/PRODUCCI&Oacute;N</option>
							<option value="PREPRENSA">PREPRENSA</option>
							<option value="MAQUILA INTERNA">MAQUILA INTERNA</option>
							<option value="MAQUILA EXTERNA">MAQUILA EXTERNA</option> 
							<option value="SISTEMAS">SISTEMAS</option>
							<option value="VENTAS">VENTAS</option>
							<option value="IMPRESIÓN INDIGO">IMPRESIÓN INDIGO</option>
							<option value="IMPRESIÓN NUBERAS">IMPRESIÓN NUBERAS</option>
							<option value="IMPRESIÓN BUSKRO">IMPRESIÓN BUSKRO</option>
						</select>							
					</div>						
				</div>
				
				<div class="row">
					<div class="input-field col s5">

					<label for="fRegistro" class="lblFechas">Fecha Queja</label>
				</div>
			</div>

				<div class="row">
					<div class="input-field col s5">

						<!--<input class="campo_fecha required" type="text" name="fRegistro" id="fRegistro" />-->
						<input type="date" name="fRegistro" id="fRegistro" step="1" min="2018-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>"
>
												
					</div>						
				</div>

				<div class="row">
					<div class="input-field col s5">
						<input type="text" name="importCot" id="importCot"/>
						<label for="importCot" class="lblFechas">Costo</label>						
					</div>						
				</div>

				<div class="row">
					<div class="col s5">
						<label for="Reproceso" class="lblFechas">Reproceso</label>		
						<select class="browser-default" name="Reproceso" id="Reproceso">
							<option value="0">-- Seleccionar una opci&oacute;n --</option>
							<option value="si">SI</option>
							<option value="no">NO</option>
						
						</select>							
					</div>	
				</div>	

				<div class="row">
					<div class="input-field col s12">
						<textarea  id="notas" class="materialize-textarea" style="text-transform: uppercase" name="notas" maxlength="100"></textarea>
						<label for="notas" class="lblFechas">Detalle</label>
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
<script type="text/javascript" src="js/getReprocesoQuejas.js"></script>
</body>
</html>