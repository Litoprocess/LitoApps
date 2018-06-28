<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
		<div class="offset-s4 col s2">        	
			<label for="maquina">Maquina</label>
			<select id="maquina" name="maquina" class="browser-default" required>							
			</select>
		</div>				
	</div>
	<div id="calendario" class="row">
		<div id="calendar" class="offset-s1 col s8"></div>
		<div class="col s2">
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#9e9e9e;border-color:#9e9e9e;color:black;"><div class="fc-content"><span class="fc-time">Unico</span></div></a>
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#ef9a9a;border-color:#ef9a9a;color:black;"><div class="fc-content"><span class="fc-time">Diario</span></div></a>
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#fff59d;border-color:#fff59d;color:black;"><div class="fc-content"><span class="fc-time">Semanal</span></div></a>
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#90caf9;border-color:#90caf9;color:black;"><div class="fc-content"><span class="fc-time">Mes</span></div></a>
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#a5d6a7;border-color:#a5d6a7;color:black;"><div class="fc-content"><span class="fc-time">Semestral</span></div></a>
			<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#b39ddb;border-color:#b39ddb;color:black;"><div class="fc-content"><span class="fc-time">Anual</span></div></a>				
		</div>
	</div>
	<div id="preloader" class="row" style="display:none;">
		<div class="col s12">
			<div class="preloader-wrapper big active">
				<div class="spinner-layer spinner-blue-only">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
					<div class="circle"></div>
				</div><div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>					
</div>					
</div>

  <div class="fixed-action-btn" style="bottom: 4%; right: 2%;">
    <a class="btn-floating btn-large waves-effect waves-light red" id="btn-programar"><i class="material-icons">add</i></a>
  </div>
</main>	

<!-- Tap Target Structure -->
<div class="tap-target" data-activates="btn-programar">
  <div class="tap-target-content">
    <h5>Botón agregar</h5>
    <p>Aquí puede programar un mantenimiento</p>
  </div>
</div>

<!-- Modal Programar Eventos Structure -->
<div id="modal1" class="modal">
	<form id="agregarEvento" method="POST" action="php/addevento.php" class="col s12"> 	
		<div class="modal-content">		
			<div class="row">
				<div class="col s8">
					<h5 id="titulo_evento">Programar eventos frecuentes</h5>
					<h6 id="fecha"></h6>    			
				</div>
				<div class="col s2">
					<p>
						<input value="operador" name="group2" type="radio" id="operador" required/>
						<label for="operador">Operador</label>
					</p>
				</div>		        	
				<div class="col s2">
					<p>
						<input value="ayudante" name="group2" type="radio" id="ayudante" />
						<label for="ayudante">Ayudante</label>
					</p>										
				</div>
			</div>
			<div class="row">
				<div class="row">
					<div class="input-field col s4" style='display:none;'>
						<input id="dia" name="dia" type="text" class="validate">
						<label for="dia"></label>
					</div>      			
					<div class="input-field col s4">
						<input id="titulo" name="titulo" type="text" class="validate" required>
						<label for="titulo">Titulo</label>
					</div>		        		        	
					<div class="col s3">        	
						<label for="componente">Componente</label>
						<select id="componente" name="componente" class="browser-default" required>											
						</select>
					</div>
					<div class="input-field col s4">
						<input id="material" name="material" type="text" class="validate" required>
						<label for="material">Material</label>
					</div>		        		        
					<div class="input-field col s12">
						<textarea id="detalle" name="detalle" class="materialize-textarea" required></textarea>
						<label for="detalle">Detalle</label>
					</div>		        			
				</div>
				<div class="row">
					<div class="col s2">
						<p>
							<input value="unico" name="group1" type="radio" id="unico" />
							<label for="unico">Único</label>
						</p>
					</div>					
					<div class="col s2">
						<p>
							<input value="diario" name="group1" type="radio" id="diario" />
							<label for="diario">Diario</label>
						</p>
					</div>		        	
					<div class="col s2">
						<p>
							<input value="semanal" name="group1" type="radio" id="semanal" />
							<label for="semanal">Semanal</label>
						</p>										
					</div>
					<div class="col s2">
						<p>
							<input value="mensual" name="group1" type="radio" id="mensual" />
							<label for="mensual">Mensual</label>
						</p>										
					</div>	
					<div class="col s2">
						<p>
							<input value="semestral" name="group1" type="radio" id="semestral" />
							<label for="semestral">Semestral</label>
						</p>										
					</div>		
					<div class="col s2">
						<p>
							<input value="anual" name="group1" type="radio" id="anual" required/>
							<label for="anual">Anual</label>
						</p>										
					</div>	
				</div>												        
				<div class="row">
					<div class="col s4">
						<label for="fechainicio">Fecha Inicio</label>
						<input id="fechainicio" name="fechainicio" type="date" class="validate" required>		        			
					</div>
					<div class="col s1">
						<label for="duracion">Duración(días)</label>
						<input id="duracion" name="duracion" type="number" class="validate" required>		        			
					</div>
					<div id="manual" class="offset-s2 col s5 file-field input-field">
						<div class="btn">
							<span><i class="material-icons">attach_file</i></span>
							<input type="file" id="file" name="file" accept="application/pdf">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Adjuntar Instructivo">
						</div>
					</div>
					<div id="iconmanual" class="offset-s2 col s5">					
					</div>			    	        		       		
				</div>
				<div class="row">
					<div class="col s4" style="display:none;">
						<input id="secuencia" type="text" class="validate">
						<label for="secuencia">Secuencia</label>       			        			
					</div>        		
					<div id="secuence" class="col s4" style="display:none;">
						<p>
							<input type="checkbox" id="eliminarsecuencia"/>
							<label for="eliminarsecuencia">Eliminar Secuencia</label>
						</p>        			        			
					</div>
				</div>			
			</div>		
		</div>
		<div class="modal-footer">
			<a id="btn1-cancelar" class="waves-effect waves-green btn-flat">Cerrar</a>    
			<!--a id="btn-guardar" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Guardar</a-->
			<button type="submit" value="Submit" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Guardar</button>
		</div>
	</form>
</div> 

<!-- Modal Structure -->
<div id="modal2" class="modal">
	<div class="modal-content">
		<h4>¿Estas seguro de que deseas eliminar la secuencia?</h4>
	</div>
	<div class="modal-footer">
		<a id="btn2-cancelar" class="waves-effect waves-green btn-flat">Cancelar</a>    
		<a id="btn2-aceptar" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Aceptar</a>
	</div>
</div>  

<!-- Modal Structure -->
<div id="modal3" class="modal">
	<div class="modal-content">
		<h4>Selecciona una Máquina</h4>
	</div>
	<div class="modal-footer">
		<a id="btn3-cancelar" class="waves-effect waves-green btn-flat">Cancelar</a>    
		<a id="btn3-aceptar" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Aceptar</a>
	</div>
</div>  

<!-- Modal Structure -->
<div id="modal4" class="modal">
	<div class="modal-content">
		<h4>No has adjuntado ningun instructivo. ¿Deseas Continuar?</h4>
	</div>
	<div class="modal-footer">
		<a id="btn4-cancelar" class="waves-effect waves-green btn-flat">Cancelar</a>    
		<a id="btn4-aceptar" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Aceptar</a>
	</div>
</div> 

</body>
</html>
<?php require '../layout/scripts.php'; ?>
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.js'></script>
<script src='js/locale/es-us.js'></script>
<script src='js/programarmantto.js'></script>