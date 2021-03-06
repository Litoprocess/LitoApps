$(document).ready(function(){

if(window.location.pathname == '/litoapps/muestreoBD/lcpersonal.php')
{
  $("#bitacora").removeClass("active");
  $("#lcp").addClass("active");
  $("#lcn").removeClass("active");
} 

$(".button-collapse").sideNav();

//FOCUS EN EL INPUT DE TELEFONO
$("#telefono").focus();

//CONTADOR DE CARACTERES
$('input#telefono').characterCounter();

$('#modal1').modal();

//TRAER CAMPOS DE LA BASE DE DATOS
var estado;
var code;
var comentario;
$( "#telefono" ).change(function() {
	code = $("#telefono").val();
	$.post('php/obtenerLcPersonal.php', {code:code},
		function(result){		

			if(result.opcion.length>0){
				Materialize.toast('Consulta exitosa', 1200,'green darken-4',function(){

					estado="Correcto";
					$("#nombre").val(result.opcion[0].nombre);
					$("#dir1").val(result.opcion[0].dir1);
					$("#dir2").val(result.opcion[0].dir2);
					$("#dir3").val(result.opcion[0].dir3);
					$("#ciudad").val(result.opcion[0].ciudad);
					$("#cp").val(result.opcion[0].cp);
					$("#estado").val(result.opcion[0].estado);
					$("#municipio").val(result.opcion[0].municipio);
					$("#fact_mensual").val(result.opcion[0].fact_mensual);
					$("#pago_mensual").val(result.opcion[0].pago_mensual);	
					Materialize.updateTextFields();						
				})

			} else {
				Materialize.toast('El registro no existe', 1200,'red darken-4',function(){
					$("#telefono").val("");
					$("#telefono").focus();
				})
			}

		},'json');

});

$("#error").click(function(){
 $("#modal1").modal('open');
});

//BOTON CORRECTO

$("#btn-correcto").click(function( event ) {
  //alert( "Handler for .submit() called." );
  //event.preventDefault();
  estado="CORRECTO";
  //var datosMuestra = $(this).serialize();
  code = $("#telefono").val();
  comentario = "";
  $.post('php/bitacoraLcPersonal.php', {code:code,estado:estado,comentario:comentario},
  	function(result){
  		Materialize.toast('Muestra guardada', 1200,'green darken-4',function(){
  			$("#telefono").val("");
  			$("#nombre").val("");
  			$("#dir1").val("");
  			$("#dir2").val("");
  			$("#dir3").val("");
  			$("#ciudad").val("");
  			$("#cp").val("");
  			$("#estado").val("");
  			$("#municipio").val("");
  			$("#fact_mensual").val("");
  			$("#pago_mensual").val("");
  			$("#telefono").focus();
  		})  		
  	},'json');
  return false;

});

//BOTON ERROR
$("#btn-erroneo").click(function( event ) {
	estado="ERROR";
	code = $("#telefono").val();
	comentario = $("#comentario").val();
	$.post('php/bitacoraLcPersonal.php', {code:code,estado:estado,comentario:comentario},
		function(result){
			Materialize.toast('Muestra guardada', 1200,'green darken-4',function(){
				$("#telefono").val("");
				$("#nombre").val("");
				$("#dir1").val("");
				$("#dir2").val("");
				$("#dir3").val("");
				$("#ciudad").val("");
				$("#cp").val("");
				$("#estado").val("");
				$("#municipio").val("");
				$("#fact_mensual").val("");
				$("#pago_mensual").val("");
				$("#comentario").val("");
				$("#telefono").focus();
				$("#modal1").modal('close');
			})

		},'json');
	return false;

});

//MENU CERRAR SESION 
$("#dropdown-button").dropdown();

});