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
/*th, td { white-space: nowrap; }
div.dataTables_wrapper {
    margin: 0 auto;
}

div.container {
    width: 80%;
}*/
table.compact {
margin: 0 auto;
width: 100%;
clear: both;
border-collapse: collapse;
table-layout: fixed; // ***********add this 
word-wrap:break-word; // ***********and this 

}

#circulo {
	height: 70px;
	width: 70px;
	display: table-cell;
	text-align: center;
	font-size:36px;
	color: white;
	vertical-align: middle;
	border-radius: 50%;
	background: red;
	position: relative;
	left: 90px;
}

</style>
<main class="container">
	<div class="row">
		<!--div class="col s12">
		<ul class="tabs">
		  	<li id="uno" class="tab col s3"><a href="#test1">Identifique su brecha en Accountability</a></li>
		  	<li id="dos" class="tab col s3"><a href="#test2">Aplique los Pasos hacia Accountability</a></li>
		  	<li id="tres" class="tab col s3"><a href="#test3">Haga su Plan de Accountability</a></li>
		</ul>
		</div>
		<br>
		<br>
		<br-->
		<form id="enviarcuestionario" method="POST" action="php/cuestionario.php">	

			<!--div id="test1" class="col s12"-->

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
			    <br>			    
				<div class="row">
					<div class="col s2 offset-s1 center">
						<div id="circulo">1</div>
					</div>
					<div class="col s9">
						<div style=" display: table-cell; vertical-align: middle;">
							<span style="font-size: 34px;">
								<p>Identifique su <b>Brecha en Accountability</b></p>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<span class="black-text" style="font-size:14px;">
							<p>Una Brecha de Accountability es una <b>brecha en el desempeño</b> 
							que afecta directamente la capacidad de lograr un resultado clave. 
							Es la diferencia entre lo que en realidad está sucediendo y lo que 
							deseamos que suceda. Le llamamos Brecha de Accountability para 
							enfatizar la necesidad de tomar responsabilidad para cerrar una 
							brecha que <b>pone en peligro un resultado Clave.</b></p>
						</span>
					</div>					
				</div>				
				<div class="row" style="background: -webkit-radial-gradient(center center, circle, white,#1162ac);">					
					<div class="col s4 offset-s1" style="display: table-cell; vertical-align: middle;">
						<span style="font-size:20px; color:white;">Lo que está sucediendo</span>
					</div>
					<div class="col s2">
						<span style="font-size:20px;">¡Cerrar la brecha!</span>
					</div>
					<div class="offset-s1 col s3">
						<span style="font-size:20px; color:white;">Lo que queremos que suceda</span>
					</div>
				</div>				
				<div class="row">				
					<div class="input-field col s12">
					  <textarea id="txt1" name="txt1" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt1">Elegir un resultado clave.</label>
					</div>
					<div class="col s10"><span class="black-text"><p><b>Identificar la brecha de Accountability que puede poner en peligro este resultado Clave. Posteriormente marque con un asterisco la brecha que más necesita cerrar.</b></p></span></div>
					<div class="col s2"><span class="black-text"><p><b>Elige la brecha más importante</b></p></span></div>					
					<div class="input-field col s10">
					  <textarea id="txt2" name="txt2" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt2">1.-</label>
					</div>	
					<div class="col s2">
					    <p>
					      <input id="radio1" name="group1" type="radio" value="1" required />
					      <label for="radio1"></label>
					    </p>						
					</div>
					<div class="input-field col s10">
					  <textarea id="txt3" name="txt3" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt3">2.-</label>
					</div>
					<div class="col s2">
					    <p>
					      <input id="radio2" name="group1" type="radio" value="2" />
					      <label for="radio2"></label>
					    </p>						
					</div>						
					<div class="input-field col s10">
					  <textarea id="txt4" name="txt4" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt4">3.-</label>
					</div>
					<div class="col s2">
					    <p>
					      <input id="radio3" name="group1" type="radio" value="3" />
					      <label for="radio3"></label>
					    </p>						
					</div>					
					<div class="col s12"><span class="black-text"><p><b>Para la Brecha de Accountability que ha circulado, describa lo siguiente:</b></p></span></div>
					<div class="input-field col s12">
					  <textarea id="txt5" name="txt5" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt5">¿Qué en realidad está sucediendo?</label>
					</div>
					<div class="input-field col s12">
					  <textarea id="txt6" name="txt6" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
					  <label for="txt6">¿Qué deseamos que suceda?</label>
					</div>	
					<div class="col s12"><span class="black-text"><p><b>Si usted no cierra esta Brecha. ¿Qué impacto tendrá en el resultado clave?</b></p></span></div>
					<div class="input-field col s12">
						<textarea id="txa1" name="txa1" class="materialize-textarea" required></textarea>
						<label for="txa1"></label>
					</div>														
				</div>					    
				<br>    								
			<!--/div-->			
				<div class="row">
					<div class="col s2 offset-s1 center">
						<div id="circulo">2</div>
					</div>
					<div class="col s9">
						<span style="font-size: 32px;">Aplique los <b>Pasos hacia Accountability</b></span>
					</div>
				</div>
			<!--div id="test2" class="col s12"-->
				<div class="row">
					<div class="input-field col s10">
						<textarea id="txa2" name="txa2" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
						<label for="txa2">Brecha en Accountability (circulando en Panel 1):</label>
					</div>
					<div class="col s2">
						<span class="blue-text">
							<p><b>Pregúntese esto para mejorar su uso de la Herramienta VARH</b></p>
						</span>
					</div>	
				</div>	
				<div class="row">					
					<div class="input-field col s10">
						<textarea id="txa3" name="txa3" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
						<label for="txa3">1.-¿Cuál es la realidad que yo (nosotros) necesito cambiar más?</label>
					</div>		
					<div class="col s2">
						<span class="teal-text">
							<p><b>VERLO</b></p>
							<b>¿Qué cosa no ésta funcionando?</b>
							<b>¿Cuáles son las "cosas dificiles" que se necesitan oír?</b>
							<b>¿A quién debo (debemos) pedirle retroalimentación?</b>
						</span>
					</div>	
				</div>
				<div class="row">
					<div class="input-field col s10">
						<textarea id="txa4" name="txa4" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
						<label for="txa4">2.-¿Cómo contribuimos al problema y/o solución?</label>
					</div>		
					<div class="col s2">
						<span class="black-text">
							<p><b>ADUEÑARSELO</b></p>
							<b>¿Quiénes deben participar?</b>
							<b>¿Cómo se avanza para comprar/invertir?</b>
							<b>¿A quién se debe ofrecer retroalimentación?</b>
						</span>
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s10">
						<textarea id="txa5" name="txa5" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
						<label for="txa5">3.-¿Qué más puedo yo (nosotrs) hacer?</label>
					</div>		
					<div class="col s2">
						<span class="green-text">
							<p><b>RESOLVERLO</b></p>
							<b>¿Qué paso extra se pueden tomar?</b>
							<b>¿Qué se da por sentado está fuera de nuestro control que podría no estarlo?</b>
							<b>¿Quién más podría ayudarnos a resolver el problema?</b>
						</span>
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s10">
						<textarea id="txa6" name="txa6" class="materialize-textarea" maxlength="255" data-length="255" required></textarea>
						<label for="txa6">4.-¿Qué somos (accountability) de hacer, para Cuándo?</label>
					</div>		
					<div class="col s2">
						<span class="purple-text">
							<p><b>HACERLO</b></p>
							<b>¿Cómo se jecutara y cerrara la brecha?</b>
							<b>¿Cómo nos mantendremos Arriba de la línea en caso de enfrentar obstáculos?</b>
							<b>¿Cómo se puede informar el progreso de una manera transparente?</b>
						</span>
					</div>																								
				</div>
			<!--/div-->	
				<div class="row">
					<div class="col s2 offset-s1 center">
						<div id="circulo">3</div>
					</div>
					<div class="col s9">
						<span style="font-size: 32px;">Haga su su <b>Plan de Accountability</b></span>
					</div>
				</div>
			<!--div id="test3" class="col s12"-->
				<div class="row">
					<div class="input-field col s2 offset-s10">
					  <input id="fecha" name="fecha" type="date" class="datepicker" required>
					  <label for="fecha">Fecha:</label>
					</div>		
					<div class="input-field col s6">
					  <input id="nombre" name="nombre" type="text" class="validate" maxlength="255" data-length="255" required>
					  <label for="nombre">Nombre: </label>
					</div>	
					<div class="input-field col s6">
					  <input id="equipo" name="equipo" type="text" class="validate" maxlength="255" data-length="255" required>
					  <label for="equipo">Equipo: </label>
					</div>
					<div class="input-field col s12">
						<textarea id="txa7" name="txa7" class="materialize-textarea" maxlength="255" data-length="255" maxlength="255" data-length="255" required></textarea>
						<label for="txa7">Brecha de Accountability</label>
					</div>	
					<div class="col s12"><span class="black-text"><p><b>¿Qué somos responsables de hacer, para cuándo?</b></p></span></div>	
					<div class="col s12">
						<table id="lista" class="row-border order-column compact" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>NOMBRE</th>
									<th>QUÉ</th>
									<th>PARA CÚANDO</th>    
									<th>QUITAR</th>                                          
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
			<!--/div-->			
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
<script type="text/javascript">
$(document).ready(function()
{
	var id;

	$(".button-collapse").sideNav();
	$('input#input_text, textarea#textarea1').characterCounter();

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
	      { width: "3%", targets: 0 },
	      { width: "10%", targets: 1 },
	      { width: "3%", targets: 2 },
	      { width: "1%", targets: 3, "className": "dt-body-center" }
	    ],
	    fixedColumns: true,  	
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
        "responsive": true,
        "bAutoWidth": false,   
        "autoWidth":false,

    });     	

    var counter = 1;
 
    $('.addRow').on( 'click', function () {
        t.row.add( [
            "<input id='nombre" + counter + "' name='nombre" + counter + "' type='text' class='brechas browser-default' size='20' maxlength='255' data-length='255'>",
            "<input id='que" + counter + "' name='que" + counter + "' type='text' class='brechas browser-default' size='83' maxlength='255' data-length='255'>",
            //"<input id='cuando" + counter + "' name='cuando" + counter + "' type='text' class='brechas browser-default' size='20' maxlength='255' data-length='255'>",
            "<input id='cuando" + counter + "' name='cuando" + counter + "' type='date' class='datepicker brechas browser-default' required>",
            "<a class='remove' href='#!'><i class='material-icons'>remove</i></a>"
        ] ).draw( false );
 
        counter++;
    });
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

var id_cuestionario = 0;
id_cuestionario = getParameterByName('id');
if(id_cuestionario > 0)
{
	$.post('php/consultarxid.php',{id_cuestionario:id_cuestionario},
		function(result){
			if(result.data.length > 0){
				$("#txt1").val(result.data[0].txt1).siblings().addClass("active");
				$("#txt2").val(result.data[0].txt2).siblings().addClass("active");
				$("#txt3").val(result.data[0].txt3).siblings().addClass("active");
				$("#txt4").val(result.data[0].txt4).siblings().addClass("active");
				$("#txt5").val(result.data[0].txt5).siblings().addClass("active");
				$("#txt6").val(result.data[0].txt6).siblings().addClass("active");
				$("#txa1").val(result.data[0].txa1).siblings().addClass("active");
				$("#txa2").val(result.data[0].txa2).siblings().addClass("active");
				$("#txa3").val(result.data[0].txa3).siblings().addClass("active");
				$("#txa4").val(result.data[0].txa4).siblings().addClass("active");
				$("#txa5").val(result.data[0].txa5).siblings().addClass("active");
				$("#txa6").val(result.data[0].txa6).siblings().addClass("active");
				$("#fecha").val(result.data[0].fecha).siblings().addClass("active");
				$("#nombre").val(result.data[0].nombre).siblings().addClass("active");
				$("#equipo").val(result.data[0].equipo).siblings().addClass("active");
				$("#ta7").val(result.data[0].brecha).siblings().addClass("active");
	    	}
	    }
	);
}


});

function getParameterByName(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	  results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

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