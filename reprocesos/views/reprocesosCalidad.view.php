<?php require 'views/head.php'; ?>
<main class="container">
	<h5>Reprocesos/Calidad</h5>			
	<div class="row">
		<div class="offset-s3 col s6 offset-s3"><!--id="formNuevo"-->
			<form name="reprocesosCalidad" id="reprocesos" method="POST">
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div class="input-field col s3">			
								<input style="text-transform: uppercase" class="validate" type="text" name="orden" id="orden" />			
								<label for="orden">Orden</label>
							</div>		
						</div>				 
						<div class="row">
							<div class="input-field col s8">
								<input style="text-transform: uppercase" class="validate" type="text" name="trabajo" id="trabajo" readonly="readonly" />
								<label for="trabajo">Trabajo</label>				
							</div>  				
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input style="text-transform: uppercase" class="validate" type="text" name="cliente" id="cliente" readonly="readonly" />
								<label for="cliente">Cliente</label>					
							</div>				
						</div>

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" name="fRegistro" id="fRegistro" readonly="readonly" />
								<label for="fRegistro">Fecha</label>			
							</div>					
						</div>	

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" name="cantidad" id="cantidad" readonly="readonly"/>
								<label for="cantidad">Cantidad Pedida</label>						
							</div>					
						</div>	

						<div class="row">
							<div class="input-field col s8">
								<input class="validate" type="text" name="depto" id="depto" readonly="readonly" />
								<label for="depto">Departamento</label>			
							</div>				
						</div>

						<div class="row">
							<div class="input-field col s5">
								<input class="validate" type="text" name="importCot" id="importCot" readonly="readonly"  />
								<label for="importCot">Importe Cotizado</label>							
							</div>				
						</div>			

						<div class="row">
							<div class="input-field col s12">
								<textarea class="materialize-textarea" style="text-transform: uppercase" name="notas" id="notas"></textarea>
								<label for="notas">Notas</label>
							</div>						
						</div>
					</div>
				</div>
				<!--div id="row cantidades"-->
				<div class="row">
					<div id="bloqueIzq" class="col s6">
						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="a_manual" id="a_manual" placeholder="$0.00" />
								<label for="a_manual">Acabado Manual</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="acab_especial" id="acab_especial" placeholder="$0.00" >
								<label for="acab_especial">Acabados Especiales</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="acab_lito" id="acab_lito" placeholder="$0.00" >
								<label for="acab_lito">Acabado Litograf&iacute;a</label>	
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="almacen_" id="almacen_" placeholder="$0.00" >
								<label for="almacen_">Almac&eacute;n</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="calidad" id="calidad" placeholder="$0.00" >
								<label for="calidad">Calidad</label>					
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="cliente_" id="cliente_" placeholder="$0.00" >
								<label for="cliente_">Cliente</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="entregas_" id="entregas_" placeholder="$0.00"  />
								<label id="entregas_">Entregas</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="literatura_vw" id="literatura_vw" placeholder="$0.00" >
								<label for="literatura_vw">Literatura VW</label>											
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="offset" id="offset" placeholder="$0.00" >
								<label for="offset">Offset</label>											
							</div>						
						</div>
					</div>				
					
					<!--div id="bloqueCentro"></div-->

					
					<div id="bloqueDer" class="col s6">
						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="operaciones" id="operaciones" placeholder="$0.00" >
								<label for="operaciones">Operaciones/Producci&oacute;n</label>
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="preprensa" id="preprensa" placeholder="$0.00" >
								<label for="preprensa" id="almacen">Pre-prensa</label>						
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="maquila_interna" id="maquila_interna" placeholder="$0.00" >
								<label for="maquila_interna">Maquila Interna</label>	
							</div>						
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="externa" id="externa" placeholder="$0.00" >
								<label for="externa">Maquila Externa</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="sistemas" id="sistemas" placeholder="$0.00" >
								<label for="sistemas">Sistemas</label>					
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="ventas" id="ventas" placeholder="$0.00" >
								<label for="ventas">Ventas</label>											
							</div>							
						</div>

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="indigo" id="indigo" placeholder="$0.00" >
								<label for="indigo">Impresión Indigo</label>											
							</div>							
						</div>	

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="nuberas" id="nuberas" placeholder="$0.00" >
								<label for="nuberas">Impresión Nuberas</label>
							</div>							
						</div>	

						<div class="row">
							<div class="input-field col s8">
								<input class="validate amt" type="text" name="buskro" id="buskro" placeholder="$0.00" >
								<label for="buskro">Impresión Buskro</label>											
							</div>										
						</div>
						<div class="row">
							<div class="input-field col s12">
								<span>El formato para las cantidades es:</span>
								<p id="estatus"> <!-- Estatus desde JS--> </p>
							</div>							
						</div>
					</div>
				</div>					
				<!--/div-->
			</form>

			<div id="row">	
				<div class="col s5">
					<!--input class="botones_input" type="submit" value="Guardar" id="guardar" name="guardar"-->
					<button id="guardar" class="btn waves-effect waves-light indigo darken-4" type="submit">Guardar</button>		
				</div>

				<div class="offset-s3 col s3">
					<!--input class="botones_input" type="button" value="Limpiar" id="limpiar" name="limpiar" onclick="CleanForm_Reprocesos()"-->
					<button id="limpiar" class="btn waves-effect waves-light grey lighten-3 black-text">Limpiar</button>		

				</div>
			</div>

		</div>			
	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/getReprocesoCalidad.js"></script>
</body>
</html>