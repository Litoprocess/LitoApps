$(document).ready(function(){

	$('select').material_select();

	$('#extension').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column0_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column0_search"></label>');
	} );	

	$('#nombre').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column1_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column1_search"></label>');
	} );		

	$('#departamento').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column2_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column2_search"></label>');
	} );	

	$('#puesto').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column3_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column3_search"></label>');
	} );	

	$('#correo').each( function () 
	{
		var title = $(this).text();
		$(this).html( '<input id="column4_search" type="text" class="browser-default" placeholder="'+title+'" /><label for="column4_search"></label>');
	} );		

	var table = $("#directorio").DataTable(
	{            		
		ajax:
		{
			url: 'php/consultardirectorio.php'
		},	
		"columns":
		[
		{data : "extension"},
		{data : "nombre"},
		{data : "departamento"},
		{data : "puesto"},
		{data : "correo"}
		],
		"columnDefs": 
		[
		{"className": "dt-center", "targets": 0},
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
		//"scrollY":        '67vh',
		//"scrollX": true,
		//"scrollCollapse": true,
		"paging":         false,
		"responsive": true,
		"order": []          
    }); 

	// OCULTAR INPUT DE BUSQUEDA GENERAL
	$("#directorio_filter").hide();    

	$('#column0_search').on( 'keyup', function () {
		table
		.columns( 0 )
		.search( this.value )
		.draw();
	} );       

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


	$('#column3_search').on( 'keyup', function () {
		table
		.columns( 3 )
		.search( this.value )
		.draw();
	} );   

	$('#column4_search').on( 'keyup', function () {
		table
		.columns( 4 )
		.search( this.value )
		.draw();
	} );       



});