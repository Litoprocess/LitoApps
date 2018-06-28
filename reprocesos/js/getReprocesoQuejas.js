$(document).ready(function(){

if(window.location.pathname == '/litoapps/reprocesos/reprocesosQuejas.php')
{
  $("#repProd").addClass("active");
  $("#repCali").removeClass("active");
  $("#consRep").removeClass("active");
  $("#titulo").html("Quejas Clientes");
} 

$('.button-collapse').sideNav();	

	var orden, tipoRegistro, trabajo, nomCliente, fechOrden, cantidadSol, departamento, importe, nota, reproceso;

	$("#orden").change(function(){
		orden = $("#orden").val();
		$.post('php/getReprocesoQuejas.php', {orden:orden},
			function(result){
				if(result.data.length>0)
				{

					Materialize.toast('Consulta exitosa', 800, 'green darken-4', function(){
						$("#TipoRegistro").val(result.data[0].tipoRegistro);
						$("#trabajo").val(result.data[0].nombreTrabajo).siblings().addClass("active");
						$("#cliente").val(result.data[0].nombreCliente).siblings().addClass("active");
						$("#Departamentos").val(result.data[0].departamento).siblings().addClass("active");
						//$("#fRegistro").val(result.data[0].fechaOrden).siblings().addClass("active");
						$("#cantidad").val(result.data[0].cantidad).siblings().addClass("active");
						$("#importCot").val(result.data[0].importe).siblings().addClass("active");
						$("#Reproceso").val(result.data[0].reproceso).siblings().addClass("active");
						$("#notas").val(result.data[0].nota).siblings().addClass("active");
					});
				} else {
					Materialize.toast("La orden no existe", 1200, 'red darken-4');
				}

			},'json');
	});

//----------------------- G U A R D A R ------------------------
	$("#guardar").click(function(){
		orden = $("#orden").val();
		tipoRegistro = $("#TipoRegistro").val();
		fechOrden = $("#fRegistro").val();	
		departamento = $("#Departamentos").val();
		importe = $("#importCot").val();
		nota = $("#notas").val();
		reproceso= $("#Reproceso").val();
		//trabajo = $("#trabajo").val();
		//nomCliente = $("#cliente").val();

		$.post('php/updateReprocesoQuejas.php', {orden:orden, tipoRegistro:tipoRegistro, departamento:departamento, importe:importe,
			nota:nota, fechOrden:fechOrden, reproceso:reproceso},
			function(form){
				if(form.validation == 'true')
				{			
					Materialize.toast("Se registro", 800, 'green darken-4', function(){
						limpiarDatos();
					});
				} else {				
					Materialize.toast("Algo salio mal", 800, 'red darken-4');				
				}
			},'json');
	});

	$("#limpiar").click(function(){
		limpiarDatos();
	});

 $("#TipoRegistro").change(function()
    {
    	$.dpto();
    });

//--------------- FUNCIONES ---------------

function limpiarDatos()
{
	$("#orden").val("");
	$("#TipoRegistro").val("0");
	$("#trabajo").val("");
	$("#cliente").val("");
	//$("#fRegistro").val("");
	$("#cantidad").val("");
	$("#error").val("0");
	$("#importCot").val("");
	$("#notas").val("");	
}
$.dpto=function ()
{
	if ($("#TipoRegistro").val() == "FELICITACION")
	{
		$("#Departamentos").val("LITOPROCESS");

		$("#importCot").val("0");
		$("#Reproceso").val("no");

	}
	else
	{
		$("#Departamentos").val("0");
		$("#importCot").val("");
		$("#Reproceso").val("0");

	}
	
	
}

});