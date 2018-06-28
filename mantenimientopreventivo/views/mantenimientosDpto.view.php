<?php 
include 'php/conexionMetrics.php';
require 'views/head.php'; ?>
<style>
tfoot input 
{
	width: 100%;
	padding: 3px;
	box-sizing: border-box;
}	
.row .col.offset-s10 {
    margin-left: 95%;
}
[type="checkbox"] + label:before, [type="checkbox"]:not(.filled-in) + label:after {
    width: 16px;
    height: 16px;
    }
</style>
<main>
	<div class="row">
		<div class="offset-s10 col s2">
			<a id="excel-mantto" href="#!"><img src="icon/excel2.png" width="30" class="responsive-img" /></a>
		</div>	

<!--//// POR DEPARTAMENTO///-->
	<div class="row">
		<div class="offset-s4 col s2">        	
			<label for="SearchDpto">DEPARTAMENTO</label>
			<select  id= dpto name= dpto class="browser-default" required>		
			<OPTION  value= 'TODOS'>TODOS</OPTION>		
			<?php 


	$sql = "SELECT DISTINCT Departamento FROM MaquinasMetrics ORDER BY Departamento ASC";

	$stmt = sqlsrv_query($conn,$sql);

	$option = "";
	while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){

	$option .= "<option value='".$row['Departamento']."'>".$row['Departamento']."</option>";
}
echo "$option";

?>			
			</select>
		</div>				
	</div>


<!--//// FIN POR DEPARTAMENTO///-->

		<div class="col s12">
			<table id="tblReporteMantto" class="hover row-border compact" cellspacing="0" width="100%" style="font-size:70%;">
				<thead>
					<tr>
						<th id="id">Id</th>
						<th id="detalle">DETALLE</th>
						<th id="maquina">MAQUINA</th>
						<th >DEPARTAMENTO</th>
						<th id="fecha">FECHA_INICIO</th>
						<th id="duracion">DURACIÓN(días)</th>    
						<th id="tipo">TIPO</th>                              
						<th id="estatus">ESTATUS</th>
						
						
					</tr>
				</thead>
				<tbody>
					<!--Registrs desde BD-->    
				</tbody>
			</table>				
		</div>
	</div>		
</main>
</body>
</html>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script src='js/dataTables.rowGroup.min.js'></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script>
$(document).ready(function()
{
	var dpto="TODOS";
	//alert (dpto);

	// BUSCAR X DEPTO.
	$("#dpto").change(function()
	{

		dpto=$("#dpto").val()
		//alert (dpto);
		buscarDpto(dpto)
$( ".buttons-excel" ).hide(); 
	});

	//alert (dpto);




	//OBTENER FECHA PARA COLOCARLA EN LA DESCRIPCION DEL EXCEL CUANDO SE IMPORTE
  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();

  var output =  (day<10 ? '0' : '') + day + '-' +
  (month<10 ? '0' : '') + month + '-' +
  d.getFullYear();

	//CREAR LOS INPUTS PARA REALIZAR LA BUSQUEDA POR COLUMNA
	$('#detalle').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column1_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column1_search"></label>');
	} );

	$('#maquina').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column2_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column2_search"></label>');
	} );        

	$('#fecha').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column3_search" type="text" onfocus="' + "(this.type='date')" + '" onblur="' + "(this.type='text')" +'" class="browser-default" placeholder="'+title+'" /><label for="column3_search"></label>');
	} );

	$('#tipo').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column5_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column5_search"></label>');
	} );     

	$('#estatus').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column6_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column6_search"></label>');
	} );	           

	
function buscarDpto(dpto)
{
	$( ".buttons-excel" ).hide(); 
	//alert (dpto);
	var table = $("#tblReporteMantto").DataTable(
	{ 
    
    destroy: true, 

		ajax:
		{
			url: 'php/obtmantenimientosDpto.php',
			data: {dpto:dpto},
			type: 'POST'
			
		},
        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'excelHtml5',
          title: 'ReporteMantenimiento' + output 
        },
        ],		
		"columns":
		[
		{data:"id"},
		{data:"detalle"},
		{data:"maquina"},
		{data:"departamento"},
		{data:"fecha_inicio"},
		{data:"duracion","width": "5px"},
		{data:"tipo"},
		{data:"estatus"}
	
		
		],
		"columnDefs": 
		[
		{ "orderable": false, "targets": "_all" }
		],	                   
		"language": 
		{    
			zeroRecords: "No hay registros",
			sInfo: "_END_ de _TOTAL_ registros",
			sInfoEmpty: "0 de 0 registros",
			sInfoFiltered: "(de _MAX_ registros en total)",                       
			search: "Buscar:"
		},
		"info": false,
		"searching": true,
		"scrollY":        '67vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging":         false,
		"responsive": true,
		"order": []   
		///// AGURPAR POR FILAS: DPTO///
		,"rowGroup": {dataSrc: "departamento"}


	}); 

	}

	
//INICIALIZAR LA TABLA

	
	var table = $("#tblReporteMantto").DataTable(
	{ 
    

		ajax:
		{
			url: 'php/obtmantenimientosDpto.php',
			data: {dpto:dpto},
			type: 'POST'
			
		},
        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'excelHtml5',
          title: 'ReporteMantenimiento' + output 
        },
        ],		
		"columns":
		[
		{data:"id"},
		{data:"detalle"},
		{data:"maquina"},
		{data:"departamento"},
		{data:"fecha_inicio"},
		{data:"duracion","width": "5px"},
		{data:"tipo"},
		{data:"estatus"}
	
		
		],
		"columnDefs": 
		[
		{ "orderable": false, "targets": "_all" }
		],	                   
		"language": 
		{    
			zeroRecords: "No hay registros",
			sInfo: "_END_ de _TOTAL_ registros",
			sInfoEmpty: "0 de 0 registros",
			sInfoFiltered: "(de _MAX_ registros en total)",                       
			search: "Buscar:"
		},
		"info": false,
		"searching": true,
		"scrollY":        '67vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging":         false,
		"responsive": true,
		"order": []   
		///// AGURPAR POR FILAS: DPTO///
		,"rowGroup": {dataSrc: "departamento"}


	}); 

	

$( ".buttons-excel" ).hide(); 
$( "#excel-mantto" ).on( "click", function() {
  $( ".buttons-excel" ).trigger( "click" );
});	

// OCULTAR INPUT DE BUSQUEDA GENERAL
$("#tblReporteMantto_filter").hide();	

//BUSCAR EL VALOR DE LOS INPUTS POR COLUMNA
$('#column1_search').on( 'keyup', function () {
	table
	.columns( 1 )
	.search( this.value )
	.draw();
} ); 

$('#column2_search').on( 'keyup', function () {
	table
	.columns( 2 )
	.search( this.value )
	.draw();
} ); 

$('#column3_search').change(function () {
	if(this.value == "")
	{
		table
		.columns( 3 )
		.search( "" )
		.draw();
	}
	else
	{
		var date = new Date(this.value);
		var year = date.getFullYear();

		var month = (1 + date.getMonth()).toString();
		month = month.length > 1 ? month : '0' + month;

		var day = (1 + date.getDate()).toString();
		day = day.length > 1 ? day : '0' + day;

		date_format = day + '-' + month + '-' + year;

		table
		.columns( 3 )
		.search( date_format )
		.draw();			
	}
} );   

$('#column4_search').on( 'keyup', function () {
	table
	.columns( 4 )
	.search( this.value )
	.draw();
} ); 

$('#column5_search').on( 'keyup', function () {
	table
	.columns( 5 )
	.search( this.value )
	.draw();
} );  

	// ACCION DEL INPUT CHECK AL DAR CLICK
	$("#tblReporteMantto tbody").on("click", "input[type='checkbox'].cb_cumplido", function()
	{
		if(this.checked)
		{  
			var y = $(this).attr("id");
			$("#"+y).change(function()
			{ 
				data = table.row( $(this).parents("tr") ).data();
				id_mtto = data.id;

				$.post('php/checkmtto.php', {id_mtto:id_mtto,estatus:'CUMPLIDO'},
					function(result)
					{
						Materialize.toast('Se registro', 1200,'green darken-4');
						table.ajax.reload();
					},
					'json'
					);
			}); 
		}
		else
		{
			var y = $(this).attr("id");
			$("#"+y).change(function()
			{ 
				data = table.row( $(this).parents("tr") ).data();
				id_mtto = data.id;

				$.post('php/checkmtto.php', {id_mtto:id_mtto,estatus:'PROGRAMADO'},
					function(result)
					{
						Materialize.toast('Se registro', 1200,'green darken-4');
						table.ajax.reload();
					},
					'json'
					);
			}); 
		}
	});

}); 	
</script>