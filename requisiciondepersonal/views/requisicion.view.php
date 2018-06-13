<?php require 'views/head.php'; ?>
<style>
.tabs .tab a:hover, .tabs .tab a.active {
    color: #283593;
}	

.tabs .tab a {
    color: rgb(40, 53, 147);
    }

.tabs .indicator {
    background-color: #283593;
}    

.row .col.s3 {
    width: 32%;
}
</style>
<main class="container">
	<div class="row">
		<div class="col s12">
		<ul class="tabs">
		  	<!--li class="tab col s3"><a class="active" href="#test1">Información General</a></li-->
		  	<li id="uno" class="tab col s3"><a href="#test1">Información del Puesto a Cubrir</a></li>
		  	<!--li class="tab col s3"><a href="#test3">Uso exclusivo de Capital Humano</a></li-->
		  	<li id="dos" class="tab col s3"><a href="#test2">Caracteristicas del Candidato</a></li>
		  	<li id="tres" class="tab col s3"><a href="#test3">Comentarios Adicionales</a></li>
		</ul>
		</div>
		<br>
		<br>
		<br>
		<form id="generarSolicitud" method="POST" action="php/agregarSolicitud.php">

			<!--div id="test1" class="col s12">
				<div class="row">
		            <div class="input-field col s12">
		              <input type="text" name="txtDepartamento" id="txtDepartamento">
		              <label for="txtDepartamento">Departamento Solicitante</label>
		            </div>	
		            <div class="input-field col s12">
		              <input type="text" name="txtSolicitante" id="txtSolicitante">
		              <label for="txtSolicitante">Nombre del Solicitante</label>
		            </div>	
		            <div class="input-field col s12">
		              <input type="text" name="txtPuesto" id="txtPuesto">
		              <label for="txtPuesto">Puesto del Solicitante</label>
		            </div>
		            <div class="input-field col s12">
		              <input type="text" name="txtGerencia" id="txtGerencia">
		              <label for="txtGerencia">Gerencia</label>
		            </div>	            		            	            				
		        </div>
		        <br>
		        <br>
			</div-->		

			<div id="test1" class="col s12">
				<div class="row">
		            <div class="input-field col s12">
		              <input type="text" name="txtPuestoSolicitado" id="txtPuestoSolicitado" required>
		              <label for="txtPuestoSolicitado">Puesto Solicitado</label>
		            </div>	
		            <div class="input-field col s12">
		              <input type="text" name="txtNombreJefeInmediato" id="txtNombreJefeInmediato" required>
		              <label for="txtNombreJefeInmediato">Nombre del Jefe Inmediato</label>
		            </div>	
		            <div class="input-field col s12">
		              <input type="text" name="txtPuestoJefeInmediato" id="txtPuestoJefeInmediato" required>
		              <label for="txtPuestoJefeInmediato">Puesto del Solicitante</label>
		            </div>	            		            	            				
		        </div>
		        <br>
		        <div class="row">
		            <div class="col s12">
		              <span>Origen de la vacante:</span>
		            </div>           
		            <div class="col s4">
		              <p>
		                <input name="group1" type="radio" id="reposicion" value="Reposicion" /required>
		                <label for="reposicion">Reposicion</label>
		              </p>  
		            </div>                                 
		            <div class="col s4">
		              <p>
		                <input name="group1" type="radio" id="puestonuevo" value="Puesto Nuevo" />
		                <label for="puestonuevo">Puesto Nuevo</label>              
		              </p>                                                    
		            </div>
		            <div class="col s4">
		              <p>
		                <input name="group1" type="radio" id="adicional" value="Adicional" />
		                <label for="adicional">Adicional</label>              
		              </p>              
		            </div>		        	
		        </div>
				<div class="row">
					<div class="col s12">
					  <span>Tipo de contrato:</span>
					</div>           
					<div class="col s4">
					  <p>
					    <input name="group2" type="radio" id="planta" value="Planta" /required>
					    <label for="planta">Planta</label>
					  </p>  
					</div>                                 
					<div class="col s4">
					  <p>
					    <input name="group2" type="radio" id="temporal" value="Temporal" />
					    <label for="temporal">Temporal</label>              
					  </p>                                                    
					</div>
					<div class="input-field col s4">
					  <input id="txtMeses" name="txtMeses" type="number" class="validate" min="1" max="12" disabled>
					  <label for="txtMeses">Meses</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					  <textarea id="txtObjetivo" name="txtObjetivo" class="materialize-textarea" required></textarea>
					  <label for="txtObjetivo">Objetivo del puesto</label>
					</div>
				</div>						        
		        <br>
		        <br>				
			</div>

			<!--div id="test3" class="col s12">
				<div class="row">
					<div class="col s12">
					  <span>Rango de Sueldo:</span>
					</div>
					<div class="input-field col s4">
					  <input id="txtDe" name="txtDe" type="text" class="validate">
					  <label for="txtDe">De: $</label>
					</div>		
					<div class="input-field col s4 offset-s2">
					  <input id="txtDe" name="txtDe" type="text" class="validate">
					  <label for="txtDe">Hasta: $</label>
					</div>								 		
				</div>
				<br>
				<br>		
			</div-->

			<div id="test2" class="col s12">
				<div class="row">
					<div class="col s6">
						<div class="row">
							<div class="input-field col s5">
							  <input id="txtEdad" name="txtEdad" type="number" class="validate" min="18" max="99" required>
							  <label for="txtEdad">Edad</label>
							</div>	
							<div class="col s5 offset-s2">
							  <label>Sexo</label>
							  <select class="browser-default" id="txtSexo" name="txtSexo" required>
							    <option value="Ninguno" disabled selected>Selecciona una opción</option>
							    <option value="Femenino">Femenino</option>
							    <option value="Masculino">Masculino</option>
							  </select>
							</div>	
							<div class="input-field col s12">
							  <input id="txtEscolaridad" name="txtEscolaridad" type="text" class="validate" required>
							  <label for="txtEscolaridad">Escolaridad</label>
							</div>
							<div class="input-field col s12">
							  <input id="txtConocimientosT" name="txtConocimientosT" type="text" class="validate" required>
							  <label for="txtConocimientosT">Conocimientos Teóricos</label>
							</div>
							<div class="input-field col s2">
							  <input id="txtidioma1" name="txtidioma1" type="text" class="validate" required>
							  <label for="txtidioma1">Idioma</label>
							</div>
							<div class="input-field col s2 offset-s1">
							  <input id="txtPorIdi1" name="txtPorIdi1" type="number" class="validate" min="1" max="100" required>
							  <label for="txtPorIdi1">%</label>
							</div>	
							<div class="input-field col s2 offset-s1">
							  <input id="txtidioma2" name="txtidioma2" type="text" class="validate">
							  <label for="txtidioma2">Idioma</label>
							</div>	
							<div class="input-field col s2 offset-s1">
							  <input id="txtPorIdi2" name="txtPorIdi2" type="number" class="validate" min="1" max="100">
							  <label for="txtPorIdi2">%</label>
							</div>
							<div class="input-field col s12">
							  <input id="txtExperiencia" name="txtExperiencia" type="text" class="validate" required>
							  <label for="txtExperiencia">Experiencia</label>
							</div>
							<div class="input-field col s12">
							  <input id="txtConocimientosP" name="txtConocimientosP" type="text" class="validate" required>
							  <label for="txtConocimientosP">Conocimientos Prácticos</label>
							</div>																																																											
						</div>
						<div class="row">
							<div class="col s12">
							  <span>Disponibilidad para viajar:</span>
							</div>           
							<div class="col s2">
							  <p>
							    <input name="group3" type="radio" id="txtViajarSi" value="Si" required/>
							    <label for="txtViajarSi">Si</label>
							  </p>  
							</div>
							<div class="input-field col s4">
							  <input id="txtViajarTiempo" name="txtViajarTiempo" type="number" class="validate" min="1" max="100">
							  <label for="txtViajarTiempo">% Tiempo</label>
							</div>							                                 
							<div class="col s4 offset-s2">
							  <p>
							    <input name="group3" type="radio" id="txtViajarNo" value="No" />
							    <label for="txtViajarNo">No</label>              
							  </p>                                                    
							</div>							
						</div>		
						<div class="row">
							<div class="col s12">
							  <span>Disponibilidad para cambiar de Recidencia:</span>
							</div>           
							<div class="col s4">
							  <p>
							    <input name="group4" type="radio" id="txtResidenciaSi" required/>
							    <label for="txtResidenciaSi">Si</label>
							  </p>  
							</div>

							<div class="col s4 offset-s2">
							  <p>
							    <input name="group4" type="radio" id="txtResidenciaNo" />
							    <label for="txtResidenciaNo">No</label>              
							  </p>                                                    
							</div>							
						</div>										
					</div>
					<div class="col s6">
						<div class="row">
							<div class="col s5">
							  <span>Capacidad y Habilidades</span>
							</div> 	
							<div class="col s2">|</div>
							<div class="col s5">
							  <span>Grado Requerido</span>
							</div>
							<div class="col s2 offset-s6">
							  <span>Bajo</span>
							</div>		
							<div class="col s2">
							  <span>Medio</span>
							</div>
							<div class="col s2">
							  <span>Alto</span>
							</div>

							<div class="col s5">
								<span>Capacidad Intelectual</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group5" type="radio" id="txtCapInteBaj" value="Bajo" required/>
							    <label for="txtCapInteBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group5" type="radio" id="txtCapInteMed" value="Promedio" />
							    <label for="txtCapInteMed"></label>              
							</div>
							<div class="col s2">

							    <input name="group5" type="radio" id="txtCapInteAlt" value="Alto" />
							    <label for="txtCapInteAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Iniciativa y Empuje</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group6" type="radio" id="txtIniEmpBaj" value="Bajo" required/>
							    <label for="txtIniEmpBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group6" type="radio" id="txtIniEmpMed" value="Promedio" />
							    <label for="txtIniEmpMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group6" type="radio" id="txtIniEmpAlt" value="Alto" />
							    <label for="txtIniEmpAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Manejo de Personal</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group7" type="radio" id="txtManPerBaj" value="Bajo" required/>
							    <label for="txtManPerBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group7" type="radio" id="txtManPerMed" value="Promedio" />
							    <label for="txtManPerMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group7" type="radio" id="txtManPerAlt" value="Alto" />
							    <label for="txtManPerAlt"></label>              
							</div>

							<div class="col s5">
								<span>Toma de decisiones</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group8" type="radio" id="txtTomDesBaj" value="Bajo" required/>
							    <label for="txtTomDesBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group8" type="radio" id="txtTomDesMed" value="Promedio" />
							    <label for="txtTomDesMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group8" type="radio" id="txtTomDesAlt" value="Alto" />
							    <label for="txtTomDesAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Relaciones Interpersonales</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group9" type="radio" id="txtRelIntBaj" value="Bajo" required/>
							    <label for="txtRelIntBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group9" type="radio" id="txtRelIntMed" value="Promedio" />
							    <label for="txtRelIntMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group9" type="radio" id="txtRelIntAlt" value="Alto" />
							    <label for="txtRelIntAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Estabilidad Emocional</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group10" type="radio" id="txtEstEmoBaj" value="Bajo" required/>
							    <label for="txtEstEmoBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group10" type="radio" id="txtEstEmoMed" value="Promedio" />
							    <label for="txtEstEmoMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group10" type="radio" id="txtEstEmoAlt" value="Alto" />
							    <label for="txtEstEmoAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Tolerancia a la Presión</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group111" type="radio" id="txtTolPreBaj" value="Bajo" required/>
							    <label for="txtTolPreBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group111" type="radio" id="txtTolPreMed" value="Promedio" />
							    <label for="txtTolPreMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group111" type="radio" id="txtTolPreAlt" value="Alto" />
							    <label for="txtTolPreAlt"></label>              
							</div>	

							<div class="col s5">
								<span>Organizacion</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group12" type="radio" id="txtOrganizacionBaj" value="Bajo" required/>
							    <label for="txtOrganizacionBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group12" type="radio" id="txtOrganizacionMed" value="Promedio" />
							    <label for="txtOrganizacionMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group12" type="radio" id="txtOrganizacionAlt" value="Alto" />
							    <label for="txtOrganizacionAlt"></label>              
							</div>

							<div class="col s5">
								<span>Apego a Normas</span>								
							</div>
							<div class="col s2 offset-s1">
							    <input name="group13" type="radio" id="txtApeNorBaj" value="Bajo" required/>
							    <label for="txtApeNorBaj"></label>              
							</div>
							<div class="col s2">
							    <input name="group13" type="radio" id="txtApeNorMed" value="Promedio" />
							    <label for="txtApeNorMed"></label>              
							</div>
							<div class="col s2">
							    <input name="group13" type="radio" id="txtApeNorAlt" value="Alto" />
							    <label for="txtApeNorAlt"></label>              
							</div>																																																																									
						</div>
					</div>
				</div>
			</div>	

			<div id="test3" class="col s12">
				<div class="row">
					<div class="input-field col s4">
					  <input id="txtContratacionDeseada" name="txtContratacionDeseada" type="date" class="datepicker" required>
					  <label for="txtContratacionDeseada">Fecha de Contratación deseada</label>
					</div>		
					<div class="input-field col s12">
					  <input id="txtCandidatoInterno" name="txtCandidatoInterno" type="text" class="validate" required>
					  <label for="txtCandidatoInterno">Nombre del Candidato interno a considerar</label>
					</div>								 		
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col s4 offset-s4">
						<a id="btn1-cancelar" class="waves-effect waves-green btn-flat">Limpiar</a>    
						<button type="submit" value="Submit" class="waves-effect waves-green btn-flat indigo darken-4 white-text">Guardar</button>				
					</div>					
				</div>
				<br>
				<br>		
			</div>			

			<!--div class="col s4 offset-s4">
				<a id="btn1-cancelar" class="waves-effect waves-green btn-flat">Cerrar</a>    
				<button type="submit" value="Submit" class="waves-effect waves-green btn-flat" style="background-color:#283593; color: white;">Guardar</button>				
			</div-->
		</form>		 
	</div>  
	<div class="row">
		<!--div class="col s2 offset-s4 center previous">
		<a href="#!"><i class="material-icons">navigate_before</i></a>			
		</div>

		<div class="col s2 center next">
		<a href="#!"><i class="material-icons">navigate_next</i></a>			
		</div-->		
	</div>	
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/reportes.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$('select').material_select();

	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Aceptar',
    closeOnSelect: false, // Close upon selecting a date,
// The title label to use for the month nav buttons
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',
// The title label to use for the dropdown selectors
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
// Months and weekdays
        monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
// Materialize modified
        weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
        format: 'dd-mm-yyyy'
  });	

var date = new Date();

if(date.getDate() < 10)
{
	dia = "0" + date.getDate();
}
else
{
	dia = date.getDate();
}

if(date.getMonth() < 10)
{
	mes = "0" + (date.getMonth()+1);
}
else
{
	mes = (date.getMonth()+1);
}

var today = dia + "-" + mes + "-" + date.getFullYear() ;

$('.datepicker').val(today);

$("#generarSolicitud").submit(function(event)
{
	data = $("#generarSolicitud").serialize();
	console.log(data);
	event.preventDefault();

	$.ajax({
		url: 'php/agregarSolicitud.php',
		type: "POST",
		data: data,
		success: function(result) 
		{
			if(result.validacion === true)
			{
				Materialize.toast('Se guardo', 1200,'green darken-4');
				window.setTimeout('location.reload()', 1201);
			}
			else
			{
				Materialize.toast('Algo salio mal', 1200,'red darken-4');
			}
		} 		
	});	

});

	$("#planta").click(function(){
		$("#txtMeses").prop("disabled",true);
	});

	$("#temporal").click(function(){
		$("#txtMeses").prop("disabled",false);
	});

	$(".next").click(function(){
		if( $("#uno a").hasClass('active') )
		{
			alert("true");
			window.location.href = "#test2";
			$(".tabs").find("#dos a").addClass('active');
			$(".tabs #uno a").removeClass('active');
		}
	});

});
</script>
</body>
</html>