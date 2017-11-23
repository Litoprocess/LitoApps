$(document).ready(function(){
$('.button-collapse').sideNav();	

	var orden, tipoRegistro, trabajo, nomCliente, fechOrden, cantidadSol, departamento, importe, nota;

	$("#orden").change(function(){
		orden = $("#orden").val();
		$.post('php/getReprocesoProduccion.php', {orden:orden},
			function(result){
				if(result.data.length>0)
				{
					Materialize.toast('Consulta exitosa', 800, 'green darken-4', function(){
						$("#TipoRegistro").val(result.data[0].tipoRegistro);
						$("#trabajo").val(result.data[0].nombreTrabajo).siblings().addClass("active");
						$("#cliente").val(result.data[0].nombreCliente).siblings().addClass("active");
						$("#fRegistro").val(result.data[0].fechaOrden).siblings().addClass("active");
						$("#cantidad").val(result.data[0].cantidad).siblings().addClass("active");
						$("#error").val(result.data[0].departamento).siblings().addClass("active");
						$("#importCot").val(result.data[0].importe).siblings().addClass("active");
						$("#notas").val(result.data[0].nota).siblings().addClass("active");
					});
				} else {
					Materialize.toast("La orden no existe", 1200, 'red darken-4');
				}

			},'json');
	});


	$("#guardar").click(function(){
		orden = $("#orden").val();
		tipoRegistro = $("#TipoRegistro").val();
		trabajo = $("#trabajo").val();
		nomCliente = $("#cliente").val();
		fechOrden = $("#fRegistro").val();	
		cantidadSol = $("#cantidad").val();
		departamento = $("#error").val();
		importe = $("#importCot").val();
		nota = $("#notas").val();

		$.post('php/updateReprocesoProduccion.php', {orden:orden, tipoRegistro:tipoRegistro, cantidadSol:cantidadSol, departamento:departamento, importe:importe,
			nota:nota, trabajo:trabajo, nomCliente:nomCliente, fechOrden:fechOrden},
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

//--------------- FUNCIONES ---------------

function limpiarDatos()
{
	$("#orden").val("");
	$("#TipoRegistro").val("0");
	$("#trabajo").val("");
	$("#cliente").val("");
	$("#fRegistro").val("");
	$("#cantidad").val("");
	$("#error").val("0");
	$("#importCot").val("");
	$("#notas").val("");	
}

});