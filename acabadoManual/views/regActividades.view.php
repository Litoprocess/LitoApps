<?php require 'views/head.php'; ?>
<main class="container">	
	<div class="row">
		<div id="contenidoUno" class="col s4"><!--Inicio del ContenidoUno-->			
			<form name="registraActividad" id="registraActividad" method="POST">
				<?php
				$fecha=date('Y-m-d');
				$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
				$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); ?>
				<div class="row">
					<br>
					<div class="input-field col s3">
						<input id="fech" type="text" value="<?php echo $fecha;?>" class="validate">
						<label for="fech">F.Sistema</label>
					</div>	
					<div id="categoria" class="input-field col s3">
						<div class="col s3">		
							<input type="checkbox" name='lito' id='lito' disabled />
							<label for="lito">Interno</label>											
						</div>
						<div class="offset-s6 col s3" >			
							<input type="checkbox" name='maq' id='maq' disabled />
							<label for="maq">Maquila</label>												
						</div>
					</div>
					<div id="prov" class="col 2 offset-s2">
						<!--Nombre del Proveedor desde JS-->
					</div>													
				</div>
				<div class="row">
					<div class="input-field col s2">
						<input type="text" name="noEmpleado" id="noEmpleado">
						<label for="noEmpleado">No.Empleado</label>								
					</div>
					<div  class="input-field col s4">
						<input type="text" id="valorNombre">
						<label for="valorNombre">Nombre</label>								
					</div>				
				</div>
				<div class="row">
					<div class="input-field col s2">
						<input type="text" name="op" id="op">
						<label for="op">OP</label>				
					</div>
					<div class="input-field col s5">
						<input type="text" id='valorOrden'>
						<label for="valorOrden">Trabajo</label>				
					</div>
					<div class="input-field">			
						<input type='hidden' name='noTrabajo' id='noTrabajo' value=''>
						<label for="noTrabajo"></label>				
					</div>
					<div class="select col s3">
						<label>Maquina</label>
						<select class="browser-default" name='costos' id='costos' required>
							<option value="0">Ninguna</option>
						</select>			
					</div>							
				</div>
				<div class="row">
					<div class="campo">
						<b>Fecha-Hora Inicio</b>
					</div>
					<div class="dato">
						<div class="input-field col s3">			
							<input type="date" name='fechInicio' id='fechInicio' value="<?php echo $fecha;?>">
							<label for="fechInicio"></label>				
						</div>
						<div class="input-field col s3">			
							<input type="text" name="inicio" id="inicio" required size='10'>
							<label for="inicio">HH:MM</label>				
						</div>
						<div class="input-field offset-s1 col s3">			
							<input type="text" name="repo" id="repo">
							<label for="repo">Cantidad Rep.</label>				
						</div>																
					</div>
				</div>

				<div class="row">
					<div class="campo">
						<b>Fecha-Hora Fin</b>
					</div>
					<div class="dato">
						<div class="input-field col s3">			
							<input type="date" name='fechFin' id='fechFin' value="<?php echo $fecha;?>">
							<label for="fechFin"></label>				
						</div>
						<div class="input-field col s3">			
							<input type="text" name="fin" id="fin" required>
							<label for="fin">HH:MM</label>				
						</div>
						<div class="input-field offset-s1 col s4">
							<input type='text' name='otro' id='otro' placeholder="Descripcion de la act.">
							<label for="otro"><b>NOTA</b>:</label>
						</div>												
					</div>			
				</div>
				<div class="row">
					<div class="campo2 col s12">
						<b>Selecciona una Actividad</b>
						<table  id='actividades' border="1">
							<tr class='desmarcado'>
								<td id='1' ></td><td id='2'></td><td id='3'></td><td id='4'></td><td id='5'></td><td id='6'></td> <td id='7'></td> <td id='8'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='9'></td><td id='10'></td><td id='11'></td><td id='12'></td><td id='13'></td><td id='14'></td> <td id='15'></td> <td id='16'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='17'></td><td id='18'></td><td id='19'></td><td id='20'></td><td id='21'></td><td id='22'></td> <td id='23'></td> <td id='24'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='25'></td><td id='26'></td><td id='27'></td><td id='28'></td><td id='29'></td><td id='30'></td> <td id='31'></td> <td id='32'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='33'></td><td id='34'></td><td id='35'></td><td id='36'></td><td id='37'></td><td id='38'></td> <td id='39'></td> <td id='40'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='41'></td><td id='42'></td><td id='43'></td><td id='44'></td><td id='45'></td><td id='46'></td> <td id='47'></td> <td id='48'></td>  
							</tr>
							<tr class='desmarcado'>
								<td id='49'></td><td id='0'></td>    
							</tr>
						</table>		
					</div>
					<div class="input-field">			
						<input type='hidden' name='elijeAct' id='Act'>
						<label for="elijeAct"></label>				
					</div>	
					<div id="TiempoTrasncurrido"></div>
					<div id='msjConfirmacion' class='negrita'></div>
					<div id='descripcionNota'></div>					
				</div>
			</form> 
		</div><!--Fin del ContenidoUno-->

		<div id='contenedorDos' class="col s7">

			<div class="row">
				<a href="#"><i id="buscar" class="material-icons">search</i></a>						
			</div>
			<div class="row">
				<div id='contenidoDos'>
					<table id='consulta' ></table>
				</div>	
			</div>				

			<div class="row centeract">
				<div class="btn-guardar col s3">
					<button class="waves-effect green darken-4 btn" id="guardaActividad" name="guardaActividad">Guardar
					</button>	
				</div>	
				<div class="btn-limpiar col s3">
					<button class="waves-effect blue-grey lighten-5 btn-flat" id="cancelar" name="guardaActividad">Limpiar
					</button>	
				</div>
				<div class="btn-limpiar col s3">
					<button class="btn waves-effect btn-flat right" id="borrar" name="guardaActividad">Borrar
					</button>	
				</div>	
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
</body>
</html>