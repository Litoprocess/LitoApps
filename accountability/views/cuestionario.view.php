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

input{
text-transform: uppercase;	
}

span{
	font-size: 12px;
}
</style>
<main class="container">
	<div class="row">
		<div class="col s12">
		<ul class="tabs">
		  	<li id="uno" class="tab col s3"><a href="#test1">Identifique su brecha en Accountability</a></li>
		  	<li id="dos" class="tab col s3"><a href="#test2">Aplique los Pasos hacia Accountability</a></li>
		  	<li id="tres" class="tab col s3"><a href="#test3">Haga su Plan de Accountability</a></li>
		</ul>
		</div>
		<br>
		<br>
		<br>
		<form id="enviarcuestionario" method="POST" action="php/cuestionario.php">	

			<div id="test1" class="col s12">

			    <!--div class="row">
			      <div class="col s12 m12">
			        <div class="card-panel">
			          <span class="black-text"><p>Una Brecha de Accountability es una <b>Brecha en el desempeño</b> que afecta
			          	directamente la capacidad de lograr un resultado clave. Es la diferencia entre lo que en realidad está
			          	sucediendo y lo que deseamos que suceda. Le llamamos Brecha de Accountability para enfatizar la necesidad
			          	de tomar responsabilidad para cerrar una brecha que pone en peligro un Resultado Clave.</p>
			          </span>
			        </div>
			      </div>
			    </div-->			    

				<div class="row">				
					<div class="input-field col s12">
					  <input id="txt1" name="txt1" type="text" class="validate" placeholder="">
					  <label for="txt1">Elegir un resultado clave.</label>
					</div>
					<div class="col s12"><span class="black-text"><p><b>Identificar la brecha de Accountability que puede poner en peligro este resultado Clave. Posteriormente marque con un asterisco la brecha que más necesita cerrar.</b></p></span></div>					
					<div class="input-field col s12">
					  <input id="txt2" name="txt2" type="text" class="validate" placeholder="">
					  <label for="txt2">1.-</label>
					</div>	
					<div class="input-field col s12">
					  <input id="txt3" name="txt3" type="text" class="validate" placeholder="">
					  <label for="txt3">2.-</label>
					</div>	
					<div class="input-field col s12">
					  <input id="txt4" name="txt4" type="text" class="validate" placeholder="">
					  <label for="txt4">3.-</label>
					</div>
					<div class="col s12"><span class="black-text"><p><b>Para la Brecha de Accountability que ha circulado, describa lo siguiente:</b></p></span></div>
					<div class="input-field col s12">
					  <input id="txt5" name="txt5" type="text" class="validate" placeholder="">
					  <label for="txt5">¿Qué en realidad está sucediendo?</label>
					</div>
					<div class="input-field col s12">
					  <input id="txt6" name="txt6" type="text" class="validate" placeholder="">
					  <label for="txt6">¿Qué deseamos que suceda?</label>
					</div>	
					<div class="col s12"><span class="black-text"><p><b>Si usted no cierra esta Brecha. ¿Qué impacto tendrá en el resultado clave?</b></p></span></div>
					<div class="input-field col s12">
						<textarea id="txa1" name="txa1" class="materialize-textarea"></textarea>
						<label for="txa1"></label>
					</div>														
				</div>					    
					    								
			</div>			

			<div id="test2" class="col s12">
				<div class="row">
					<div class="input-field col s10">
						<textarea id="txa2" name="txa2" class="materialize-textarea"></textarea>
						<label for="txa2">Brecha en Accountability (circulando en Panel 1):</label>
					</div>		
					<div class="col s2">
						<span class="grey-text">
							<p><b>Pregúntese esto para mejorar su uso de la Herramienta VARH</b></p>
						</span>
					</div>	
					<div class="input-field col s10">
						<textarea id="txa3" name="txa3" class="materialize-textarea"></textarea>
						<label for="txa3">1.-¿Cuál es la realidad que yo (nosotros) necesito cambiar más?</label>
					</div>		
					<div class="col s2">
						<span class="grey-text">
							<p><b>VERLO</b></p>
							<b>¿Qué cosa no ésta funcionando?</b>
							<b>¿Cuáles son las "cosas dificiles" ue necesito (necesitamos) oír?</b>
							<b>¿A quién debo (debemos) pedirle retroalimentación?</b>
						</span>
					</div>	
					<div class="input-field col s10">
						<textarea id="txa4" name="txa4" class="materialize-textarea"></textarea>
						<label for="txa4">2.-¿Cómo contribuyo y/o (nosotros) al problema y/o solución?</label>
					</div>		
					<div class="col s2">
						<span class="grey-text">
							<p><b>ADUEÑARSELO</b></p>
							<b>¿Quién debe participar?</b>
							<b>¿Cómo avanzo (avanzamos) para comprar/invertir?</b>
							<b>¿A quién debo (debemos) ofrecerle retroalimentación?</b>
						</span>
					</div>
					<div class="input-field col s10">
						<textarea id="txa5" name="txa5" class="materialize-textarea"></textarea>
						<label for="txa5">3.-¿Qué más puedo yo (nosotrs) hacer?</label>
					</div>		
					<div class="col s2">
						<span class="grey-text">
							<p><b>RESOLVERLO</b></p>
							<b>¿Qué paso extra puedo (podemos) tomar?</b>
							<b>¿Qué doy (damos) por sentado está fuera de mi (nuestro) control que podría no estarlo?</b>
							<b>¿Quién más podría ayudarme (ayudarnos) a resolver el problema?</b>
						</span>
					</div>
					<div class="input-field col s10">
						<textarea id="txa6" name="txa6" class="materialize-textarea"></textarea>
						<label for="txa6">4.-¿Qué soy yo (nosotros) accountability de hacer, para Cuándo?</label>
					</div>		
					<div class="col s2">
						<span class="grey-text">
							<p><b>HACERLO</b></p>
							<b>¿Cómo ejecutaré (ejecutaremos) y cerraré (cerraremos) la brecha?</b>
							<b>¿Cómo me mantendré (nos mantendremos) Arriba de la línea en caso de enfrentar obstáculos?</b>
							<b>¿Cómo puedo (podemos) informar mi (nuestro progreso de una manera transparente?</b>
						</span>
					</div>																								
				</div>
			</div>	

			<div id="test3" class="col s12">
				<div class="row">
					<div class="input-field col s2 offset-s10">
					  <input id="fecha" name="fecha" type="date" class="datepicker" readonly>
					  <label for="fecha">Fecha:</label>
					</div>		
					<div class="input-field col s6">
					  <input id="nombre" name="nombre" type="text" class="validate">
					  <label for="nombre">Nombre: </label>
					</div>	
					<div class="input-field col s6">
					  <input id="equipo" name="equipo" type="text" class="validate">
					  <label for="equipo">Equipo: </label>
					</div>
					<div class="input-field col s12">
						<textarea id="txa7" name="txa7" class="materialize-textarea"></textarea>
						<label for="txa7">Brecha de Accountability</label>
					</div>	
					<div class="col s12"><span class="black-text"><p><b>¿Qué soy (somos) responsable(s) de hacer, para cuándo?</b></p></span></div>
					<!--div class="input-field col s4">
					  <input id="nombre1" name="nombre1" type="text" class="validate">
					  <label for="nombre1">NOMBRE</label>
					</div>	
					<div class="input-field col s4">
					  <input id="que1" name="que1" type="text" class="validate">
					  <label for="que1">QUÉ</label>
					</div>
					<div class="input-field col s4">
					  <input id="paracuando1" name="paracuando1" type="text" class="validate">
					  <label for="paracuando1">PARA CUANDO</label>
					</div>
					<div class="input-field col s4">
					  <input id="nombre2" name="nombre2" type="text" class="validate">
					  <label for="nombre2">NOMBRE</label>
					</div>	
					<div class="input-field col s4">
					  <input id="que2" name="que2" type="text" class="validate">
					  <label for="que2">QUÉ</label>
					</div>
					<div class="input-field col s4">
					  <input id="paracuando3" name="paracuando3" type="text" class="validate">
					  <label for="paracuando3">PARA CUANDO</label>
					</div>	
					<div class="input-field col s4">
					  <input id="nombre4" name="nombre4" type="text" class="validate">
					  <label for="nombre4">NOMBRE</label>
					</div>	
					<div class="input-field col s4">
					  <input id="que4" name="que4" type="text" class="validate">
					  <label for="que4">QUÉ</label>
					</div>
					<div class="input-field col s4">
					  <input id="paracuando4" name="paracuando4" type="text" class="validate">
					  <label for="paracuando4">PARA CUANDO</label>
					</div>	
					<div class="input-field col s4">
					  <input id="nombre5" name="nombre5" type="text" class="validate">
					  <label for="nombre5">NOMBRE</label>
					</div>	
					<div class="input-field col s4">
					  <input id="que5" name="que5" type="text" class="validate">
					  <label for="que5">QUÉ</label>
					</div>
					<div class="input-field col s4">
					  <input id="paracuando5" name="paracuando5" type="text" class="validate">
					  <label for="paracuando5">PARA CUANDO</label>
					</div>	
					<div class="input-field col s4">
					  <input id="nombre6" name="nombre6" type="text" class="validate">
					  <label for="nombre6">NOMBRE</label>
					</div>	
					<div class="input-field col s4">
					  <input id="que6" name="que6" type="text" class="validate">
					  <label for="que6">QUÉ</label>
					</div>
					<div class="input-field col s4">
					  <input id="paracuando6" name="paracuando6" type="text" class="validate">
					  <label for="paracuando6">PARA CUANDO</label>
					</div-->	
					<div class="col s12">
						<table id="lista" class="row-border compact" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>NOMBRE</th>
									<th>QUÉ</th>
									<th>PARA CÚANDO</th>    
									<th></th>                                          
								</tr>
							</thead>
						</table>          
					</div>																																						
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col s4 offset-s4">
						<a id="btn-limpiar" class="waves-effect waves-green btn-flat">Limpiar</a>    
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
<script type="text/javascript">
$(document).ready(function()
{
	var id;
	
	$(".button-collapse").sideNav();
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

    var t = $('#lista').DataTable(
    {    
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Agregar',
                className:'addRow'
            }
        ], 
	    "columnDefs": [
	      { "width": "auto", "targets": [0,1,2] }
	    ],	           	
        "language": 
        {    
          zeroRecords: "No hay registros",
          sInfo: "_END_ de _TOTAL_ registros",
          sInfoEmpty: "0 de 0 registros",
          sInfoFiltered: "(de _MAX_ registros en total)",                       
          search: "Buscar:"
        },
        "searching": false,
        info : false,
        //"scrollY":        '35vh',
        //"scrollX": true,
        //"scrollCollapse": true,
        "paging":         false,
        "responsive": true
    });     	

    var counter = 1;
 
    $('.addRow').on( 'click', function () {
        t.row.add( [
            "<input id='nombre" + counter + "' name='nombre" + counter + "' type='text' class='brechas browser-default' size='45'>",
            "<input id='que" + counter + "' name='que" + counter + "' type='text' class='brechas browser-default' size='45'>",
            "<input id='cuando" + counter + "' name='cuando" + counter + "' type='text' class='brechas browser-default' size='45'>",
            "<a class='remove' href='#!'><i class='material-icons'>remove</i></a>"
        ] ).draw( false );
 
        counter++;
    } );
    // Automatically add a first row of data
    $('.addRow').click();

$('#lista tbody').on( 'click', '.remove', function () {
    t.row( $(this).parents('tr') ).remove().draw();
} );    

$("#enviarcuestionario").submit(function(event)
{

	data = $("#enviarcuestionario").serialize();
	event.preventDefault();	

	var array = new Array();
	$(".brechas").each(function (i){

		 array.push($(this).val());
		
	});
	console.log(array);

	$.post('php/cuestionario.php',data,
		function(result)
		{
			if(result.validacion === true)
			{
				id = result.id;	
				$.post('php/brechas.php',{id : id, array : array},
					function(result)
					{
						Materialize.toast('Se guardo', 1200,'green darken-4');
					}
				);											
			}
			else
			{
				Materialize.toast('Algo salio mal', 1200,'red darken-4');
			}
		} 		
	);	
});

});

function limpiar()
{
	$('input[type=text]').not('[readonly]').val("");
	$('input[type=number]').val("");
	$('input[type=radio]').prop("checked",false);
	$('textarea').val("");
	$('ul.tabs a:first').click();
}
</script>
</body>
</html>