<?php require 'views/head.php'; ?>
<?php
$fecha = date('Y-m-d');
?>
<main class="container">	
	<div class="row">
		<form name="registraActividad" id="registraActividad" method="POST">		
		<div class="col s6 m6 l6 xl6">			
			<div class="row">
		        <!--div class="col s6 m6 l6 xl6"-->		          
		          <div class="input-field col s3 m3 l3 xl3">
		            <input name="fechaSistema" id="fechaSistema" type="datetime" value="<?php echo $fecha;?>" class="validate" readonly>
		            <!--label for="fech">Fecha del Sistema</label-->
		          </div>
		        <!--/div-->
				<div class="col s2 m2 l2 xl2">		
			      <input class="with-gap" type="radio" id="lito" name="tipo_maquila" readonly/>
			      <label for="lito">Interno</label>												
				</div>	
				<div class="col s2 m2 l2 xl2">
			      <input class="with-gap" type="radio" id="maq" name="tipo_maquila" readonly/>
			      <label for="maq">Maquila</label>					
				</div>
				<div class="offset-s1 offset-m1 offset-l1 offset-xl1 col s2 m2 l2 xl2">
					<span><center id="prov"></center></span>
				</div>				        				
			</div>
			<div class="row">
	          <div class="input-field col s3 m3 l3 xl3">
	            <input id="noEmpleado" name="noEmpleado" type="text" class="validate" required>
	            <label for="noEmpleado">No.Empleado</label>
	          </div>
	          <div class="input-field col s8 m8 l8 xl8">
	            <input id="valorNombre" type="text" class="validate" readonly>
	            <label for="valorNombre">Nombre</label>
	          </div>	          				
			</div>
			<div class="row">
				<div class="input-field col s2 m2 l2 xl2">
					<input type="text" id="op" name="op" type="text" class="validate">
					<label for="op">OP</label>				
				</div>
				<div class="input-field col s5 m5 l5 xl5">
					<input type="text" id='valorOrden' name='valorOrden'>
					<label for="valorOrden">Trabajo</label>				
				</div>
				<div class="select col s4 m4 l4 xl4">
					<label>Maquina</label>
					<select class="browser-default" name='costos' id='costos'>
						<option value="0">Ninguna</option>
					</select>			
				</div>							
			</div>
				<div class="row">
					<div class="campo">
						<b>Fecha-Hora Inicio</b>
					</div>
					<div class="dato">
						<div class="input-field col s4 m4 l4 xl4">			
							<input type="date" class="date" id='fechaInicio' required>
							<label for="fechaInicio"></label>				
						</div>
						<div class="input-field col s2 m2 l2 xl2">			
							<input type="text" id="hrinicio" placeholder="HH:MM" required>
							<label for="hrinicio">HH:MM</label>				
						</div>
						<div class="input-field col s1 m1 l1 xl1">			
							<label>24Hrs</label>				
						</div>						
						<div class="input-field offset-s1 offset-m1 offset-l1 offset-xl1 col s3 m3 l3 xl3">			
							<input type="text" name="repo" id="repo" required>
							<label for="repo">Cantidad Rep.</label>				
						</div>																
					</div>
				</div>
				<div class="row">
					<div class="campo">
						<b>Fecha-Hora Fin</b>
					</div>
					<div class="dato">
						<div class="input-field col s4 m4 l4 xl4">			
							<input type="date" id='fechaFin' required>
							<label for="fechaFin"></label>				
						</div>
						<div class="input-field col s2 m2 l2 xl2">			
							<input type="text" id="hrfin" placeholder="HH:MM" max="5" required>
							<label for="hrfin">HH:MM</label>				
						</div>
						<div class="input-field col s1 m1 l1 xl1">			
							<label>24Hrs</label>				
						</div>						
						<div class="input-field offset-s1 offset-m1 offset-l1 offset-xl1 col s4 m4 l4 xl4">
							<input type='text' name='otro' id='otro' placeholder="Descripcion de la act.">
							<label for="otro"><b>NOTA</b>:</label>
						</div>												
					</div>			
				</div>
				<div class="row">
					<b>Selecciona una Actividad</b>
					<div class="datagrid">						
					<table id="actividades">
						<thead>
							<tr>
								<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
							</tr>
						</thead>
					<tbody>						
							<tr class="desmarcado">
								<td id='1' ></td><td id='2'></td><td id='3'></td><td id='4'></td><td id='5'></td><td id='6'></td> <td id='7'></td> <td id='8'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='9'></td><td id='10'></td><td id='11'></td><td id='12'></td><td id='13'></td><td id='14'></td> <td id='15'></td> <td id='16'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='17'></td><td id='18'></td><td id='19'></td><td id='20'></td><td id='21'></td><td id='22'></td> <td id='23'></td> <td id='24'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='25'></td><td id='26'></td><td id='27'></td><td id='28'></td><td id='29'></td><td id='30'></td> <td id='31'></td> <td id='32'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='33'></td><td id='34'></td><td id='35'></td><td id='36'></td><td id='37'></td><td id='38'></td> <td id='39'></td> <td id='40'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='41'></td><td id='42'></td><td id='43'></td><td id='44'></td><td id='45'></td><td id='46'></td> <td id='47'></td> <td id='48'></td>  
							</tr>
							<tr class="desmarcado">
								<td id='49'></td><td id='50'></td><td id='0'></td> <td style="background: #fff;"></td><td style="background: #fff; border-left: none; border-bottom: none;"></td><td style="background: #fff; border-left: none; border-bottom: none;"></td><td style="background: #fff; border-left: none; border-bottom: none;"></td><td style="background: #fff; border-left: none; border-bottom: none;"></td>
							</tr>
					</tbody>						
					</table>
					</div>					
				</div>
			<!--/form-->							
		</div>
		<div class="col s6 m6 l6 xl6">
			<table id="RegistroActividades" class="hover compact row-border" cellspacing="0" width="100%" style=" font-size:70%; text-align: center;">
				<thead>
					<tr>
						<th>id</th>
						<th>Clave</th>
						<th>Actividad</th>
						<th>Fecha_Inicio</th>
						<th>Fecha_Fin</th>
						<th>Cantidad</th>		
						<th>OP</th>
						<th>Tiempo</th>
						<th>Nota</th>
						<th>Tipo</th>
						<th>Maquina</th>
					</tr>
				</thead>
				<tbody>
					<!--Registrs desde BD-->
				</tbody>
			</table>
		</div>
		<div class="col s12 m12 l12 xl12">
			<div class="row">
				<div class="btn-guardar offset-s3 offset-m3 offset-l3 offset-xl3 col s2 m2 l2 xl2">
					<button class="waves-effect green darken-4 btn" id="guardaActividad">Guardar</button>	
				</div>
				<div class="btn-limpiar col s2 m2 l2 xl2">
					<a class="waves-effect waves-light btn" id="cancelar">Limpiar</a>
					<!--button class="waves-effect blue-grey lighten-5 btn-flat" >Limpiar
					</button-->	
				</div>
				<div class="btn-limpiar col s2 m2 l2 xl2">
					<a class="waves-effect waves-light btn" id="borrar">Eliminar</a>
					<!--button class="btn waves-effect btn-flat right" id="borrar">Borrar
					</button-->	
				</div>						
			</div>			
		</div>
	</form>
	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/actividades.js"></script>
</body>
</html>