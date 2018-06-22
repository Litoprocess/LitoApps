<?php require 'views/head.php'; 

?>
<link rel="stylesheet" href="css/estilosPropuestas.css">


<main class="container">
	

	<br><h1 id="usuario" style="display: none;" > <?php echo $_SESSION["Permisos"]['UserPropuestas']?></h1>
	<div class="row">
		<div class="offset-s3 " id="propuestaclientes">
			<form id="formulario" method="POST" class="wrap blue-grey-text col s6">

				<h1>Nueva Propuesta</h1>
				
				

				<div class="row">
					<div class="input-field col s3">
						<input style="text-transform: uppercase" type="text" name="clave_cliente" id="clave_cliente" readonly="readonly" />
						<label for="clave_cliente" class="lblFechas">Cliente</label>						
					</div>	
					<div class="input-field col s9">
						<input style="text-transform: uppercase" type="text" name="cliente" id="cliente" readonly="readonly"/>
									
					</div>					
				</div>

				<br><br>	

				<div class="row">
					<div class="input-field col s6">
					<label for="fRegistro" class="lblFechas">Fecha Registro</label>
					</div>
					<div class="input-field col s6">

					<label for="fAplicacion" class="lblFechas">Fecha Aplicacion</label>
				</div>
			</div>
				<div class="row">
					<div class="input-field col s6">
						<input type="date" name="fRegistro" id="fRegistro" step="1" min="2018-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" readonly="readonly">
					</div>		
					<div class="input-field col s6">
						<input type="date" name="fAplicacion" id="fAplicacion" step="1" min="2018-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" readonly="readonly">
					</div>				
				</div>

				<br><br>

				<div class="row">
					<div class="input-field col s6">
						<input style="text-transform: uppercase" type="text" name="propuesta_titulo" id="propuesta_titulo" readonly="readonly"/>
						<label for="propuesta_titulo" class="lblFechas">Titulo</label>						
					</div>	
				</div>
					<br><br>

				<div class="row">
					<div class="input-field col s12">
						<textarea  id="notas" class="materialize-textarea" style="text-transform: uppercase" name="notas" maxlength="255" readonly="readonly"></textarea>
						<label for="notas" class="lblFechas" >Propuesta</label>
					</div>						
				</div>		
				<br><br>

					<div id="row">	
				<div class="col s6">
					<button id="guardar" class="btn waves-effect waves-light indigo darken-4" type="submit">Guardar</button>		
				</div>

				<div class="col s6">
					<button id="limpiar" class="btn waves-effect waves-light grey lighten-3 black-text">Limpiar</button>		

				</div>
			</div>				
			</form>


			<form id="tabla" method="POST" class="wrap blue-grey-tex col s6">
				<h1>Propuestas</h1>
				
				  <div class="row">
    <div class="col s12">
        <table id="tblConsultaPropuestas" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No.</th> 
              <th>Cliente</th>
              <th>Fecha R.</th>         
              <th>Fecha A.</th>          
              <th>Titulo</th>
              </tr>
          </thead>
          <tbody>
            <!--Registrs desde BD-->
          </tbody>
        </table>
    </div>
  </div>

			</form>

		</div>


<!--/////////////////  AGREGAR PROPUESTAS /////////////////////7-->

  <div class="fixed-action-btn" style="bottom: 4%; right: 2%;">
    <a class="btn-floating btn-large waves-effect waves-light red" id="btn-AddProp"><i class="material-icons">add</i></a>
  </div>


</main>

<!-- Tap Target Structure -->
<div class="tap-target" data-activates="btn-AddProp">
  <div class="tap-target-content">
    <h5>Botón agregar</h5>
    <p>Aquí puede agregar un Propuesta</p>
  </div>
</div>


<?php require '../layout/scripts.php'; ?>

<script type="text/javascript" src="js/getprouestasclientes.js"></script>
<script type="text/javascript" src="js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="js/dataTables.responsive.min.js"></script>    
<script type="text/javascript" src="js/responsive.jqueryui.min.js"></script>    
<script src='js/moment.min.js'></script>
<!--<script src='js/locale/es-us.js'></script>-->
<script src='js/fullcalendar.js'></script>
<!-- php de la esctructura  del Modal -->


</body>
</html>
