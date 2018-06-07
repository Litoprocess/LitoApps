$(document).ready(function()
{

if(window.location.pathname == '/litoapps/liberacionPT/liberacion.php')
{
  $("#liberacion").addClass("active");
} 

	$(".button-collapse").sideNav();  	
	$('#inspeccion').material_select();	

	var folio, orden, tamlote, rechazado, aceptado, acumulado, tabla, exist, status,
	cantidad=0,
	muestraOk=0,
	muestraRechazada=0,
	suma,
	observaciones="Sin Observaciones";
	var file;

	getFolio();
	$("#noorden").focus();
	$("#muestraOk").val(0);
	$("#muestraRechazada").val(0);

	$("#noorden").change(function()
	{	
		orden=$("#noorden").val();
		$.post('php/obtDatosMetrics.php', {orden:orden},
			function(result)
			{		
				if(result.data.length>0)
				{
					Materialize.toast('Consulta exitosa', 800,'green darken-4',function()
					{
						acumulado = result.data[0].acumulado;
						cantidad = result.data[0].cantidad;
						$("#trabajo").val(result.data[0].trabajo).siblings().addClass( "active" );
						$("#fecha").val(result.data[0].fecha).siblings().addClass( "active" );
						$("#cantidad").val(number_format(cantidad)).siblings().addClass("active");
						$("#acumulado").val(number_format(acumulado)).siblings().addClass( "active" );
						cleanTamano();					

						if (acumulado >= cantidad) 
						{
							$("#estatus").html("<p style='color:green'>COMPLETADO</p>");							
							$("#inspeccion").attr('disabled', true);
							$("#tamlote").attr('disabled', true);
							$("#muestraOk").attr('disabled', true);
							$("#muestraRechazada").attr('disabled', true);	
							$("#observaciones").attr('disabled', true);													
						} else {
							$("#estatus").html("");
							$("#inspeccion").attr('disabled', false);
						}
					});
				} else 
				{
					Materialize.toast('Algo salio mal', 800, 'red darken-4',function(){
						cleanData();
						getFolio();
					});				
				}
			},'json');
	});

	$("#inspeccion").change(function()
	{
		tabla = $("#inspeccion").val();
		cleanTamano();
		$("#tamlote").prop('disabled', false);
		$("#tamlote").focus();		
	});

	$("#tamlote").change(function()
	{		
		tamlote = $("#tamlote").val();
		if ($("#tamlote").val() < 2)
		{
			Materialize.toast('Tamaño de muestra invalido', 1000,'red darken-4');
		} else 
		{
			var validacion = parseFloat(tamlote) + parseFloat(acumulado);
			if( validacion >= cantidad ) 
			{
				Materialize.toast('Se esta rebasando la cantidad', 1000,'orange darken-4');
				obtInspeccion();
				$("#muestraOk").prop('disabled', false);
				$("#observaciones").prop('disabled', false);
				$("#muestraRechazada").prop('disabled', false);
				$("#muestraoK").focus();											
			} else 
			{			
				obtInspeccion();
				$("#muestraOk").prop('disabled', false);
				$("#observaciones").prop('disabled', false);				
				$("#muestraRechazada").prop('disabled', false);
				$("#muestraOk").focus();										
			}							
		}
	});											

	$("#muestraOk").keyup(function()
	{
		muestraOk = $("#muestraOk").val();
		muestraRechazada = $("#muestraRechazada").val();

		if(muestraOk != "")
		{
			suma = parseInt(muestraOk) + parseInt(muestraRechazada);
			$("#suma").val(suma).siblings().addClass('active');                  
		} 

		if( muestraOk == 0 && muestraRechazada == 0 )
		{
			$("#ceros").html("<p style='color:red'>No puedes reportar en ceros</p>");
			$("#estatus").html("<p style='color:red'><b>RECHAZADO</b></p>");
			$("#file").html("<div class='btn grey'>\n\
				<span>Imagen</span>\n\
				<input type='file' id='file' name='file' accept='image/png, .jpeg, .jpg, image/gif'>\n\
				</div>\n\
				<div class='file-path-wrapper'>\n\
				<input class='file-path validate' type='text'>\n\
				</div>");
			$("input[name='file']").on("change", function(){
				var formData = new FormData($("#frm-liberacion")[0]);				
				var ruta = "php/ajax-imagen.php";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos)
					{					                    
						file = datos;
						var src = datos.split('/'); //Corta una cadena separada por el identificador / y guardando las partes en un arreglo.
						$("#respuesta").html("<img src=\'imagenes/" + src[1] + "' width='100' height='100'>");					                
					}
				});
			});	
		} else 
		if(muestraRechazada >= rechazado) 
		{
			$("#ceros").html("");
			$("#estatus").html("<p style='color:red'><b>RECHAZADO</b></p>");
			$("#file").html("<div class='btn grey'>\n\
				<span>Imagen</span>\n\
				<input type='file' id='file' name='file' accept='image/png, .jpeg, .jpg, image/gif'>\n\
				</div>\n\
				<div class='file-path-wrapper'>\n\
				<input class='file-path validate' type='text'>\n\
				</div>");
			$("input[name='file']").on("change", function(){
				var formData = new FormData($("#frm-liberacion")[0]);				
				var ruta = "php/ajax-imagen.php";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos)
					{					                    
						file = datos;
						var src = datos.split('/'); //Corta una cadena separada por el identificador / y guardando las partes en un arreglo.
						$("#respuesta").html("<img src=\'imagenes/" + src[1] + "' width='100' height='100'>");					                
					}
				});
			});						      										
		} else
		{
			$("#ceros").html("");
			$("#estatus").html("<p style='color:green'><b>ACEPTADO</b></p>");
			$("#file").html("");			
		}     

	});

	$("#muestraRechazada").keyup(function()
	{
		muestraRechazada = $("#muestraRechazada").val();
		muestraOk = $("#muestraOk").val();					

		if(muestraRechazada != "")
		{
			suma = parseInt(muestraRechazada) + parseInt(muestraOk);
			$("#suma").val(suma).siblings().addClass('active');         
		}

		if( muestraOk == 0 && muestraRechazada == 0 )
		{
			$("#ceros").html("<p style='color:red'>No puedes reportar en ceros</p>");
			$("#estatus").html("<p style='color:red'><b>RECHAZADO</b></p>");
			$("#file").html("<div class='btn grey'>\n\
				<span>Imagen</span>\n\
				<input type='file' id='file' name='file' accept='image/png, .jpeg, .jpg, image/gif'>\n\
				</div>\n\
				<div class='file-path-wrapper'>\n\
				<input class='file-path validate' type='text'>\n\
				</div>");
			$("input[name='file']").on("change", function(){
				var formData = new FormData($("#frm-liberacion")[0]);				
				var ruta = "php/ajax-imagen.php";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos)
					{					                    
						file = datos;
						var src = datos.split('/'); //Corta una cadena separada por el identificador / y guardando las partes en un arreglo.
						$("#respuesta").html("<img src=\'imagenes/" + src[1] + "' width='100' height='100'>");					                
					}
				});
			});	
		} else 
		if(muestraRechazada >= rechazado) 
		{
			$("#ceros").html("");
			$("#estatus").html("<p style='color:red'><b>RECHAZADO</b></p>");
			$("#file").html("<div class='btn grey'>\n\
				<span>Imagen</span>\n\
				<input type='file' id='file' name='file' accept='image/png, .jpeg, .jpg, image/gif'>\n\
				</div>\n\
				<div class='file-path-wrapper'>\n\
				<input class='file-path validate' type='text'>\n\
				</div>");
			$("input[name='file']").on("change", function(){
				var formData = new FormData($("#frm-liberacion")[0]);				
				var ruta = "php/ajax-imagen.php";
				$.ajax({
					url: ruta,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos)
					{					                    
						file = datos;
						var src = datos.split('/'); //Corta una cadena separada por el identificador / y guardando las partes en un arreglo.
						$("#respuesta").html("<img src=\'imagenes/" + src[1] + "' width='100' height='100'>");					                
					}
				});
			});						      										
		} else
		{
			$("#ceros").html("");
			$("#estatus").html("<p style='color:green'><b>ACEPTADO</b></p>");
			$("#file").html("");			
		}

	});		

$("#observaciones").change(function()
{
	observaciones = $("#observaciones").val();	
});

$("#btn-guardar").click(function(event)
{
	if( ($("#noorden").val() === "" && $("#inspeccion").val() === "none" && $("#tamlote").val() === "" && $("#muestraOk").val() === 0 && $("#muestraRechazada").val() === 0) ||
		($("#noorden").val() === "" || $("#inspeccion").val() === "none" || $("#tamlote").val() === "" || ($("#muestraOk").val() === "" && $("#muestraRechazada").val() === "") || ($("#muestraOk").val() === "0" && $("#muestraRechazada").val() === "0") ) ) 
	{		
		Materialize.toast('Completa todos los campos', 1000,'red darken-4');
	} else 
	{			
		if(muestraRechazada>=rechazado)
		{
			status="RECHAZADO";
			sendMail();
			insertRegistro();
			Materialize.toast('Correo Enviado', 1000,'green darken-4');												
		} else 
		{
			status="ACEPTADO";
			insertRegistro();
			Materialize.toast('Se registro', 1000,'green darken-4');		
		}	
	}
});

/*-------------------------------------------FUNCIONES-----------------------------------------------*/
function getFolio()
{
	$.post('php/obtFolio.php',
		function(result)
		{		
			if(result.data.length>0){
				folio =result.data[0].folio + 1;
				$("#folio").val(folio);
			} else 
			{
				folio = 1;
				$("#folio").val(folio)
			}
		},'json');	
}

function existFolio()
{
	$.post('php/existe.php', {folio:folio},
		function(result)
		{
			if(result.data.length>0)
			{
				exist = result.data[0].existe;
				$("#folio").val(folio);
			} else
			{
				Materialize.toast('Algo salio mal', 4000,'red darken-4',function(){
					cleanData();
					getFolio();
				});
			}		
		},'json');	
}

function cleanData()
{
	$("#folio").val("");
	$("#noorden").val("");
	$("#trabajo").val("");
	$("#fecha").val("");
	$("#cantidad").val("");
	$("#acumulado").val("");		
	$("#nivel").val("");
	$('#inspeccion > option[value="none"]').attr('selected', 'selected');
	$("#tamuestra").val("");
	$("#aceptado").val("");
	$("#rechazado").val("");
	$("#tamlote").val("");
	$("#muestraOk").val("");
	$("#muestraRechazada").val("");	
	$("#suma").val("");
	$("#observaciones").val("");
	$("#estatus").html("");
	$("#mail").html("");
	$("#alert").html("");	
}

function cleanTamano()
{
	$("#nivel").val("");
	$("#tamuestra").val("");
	$("#aceptado").val("");
	$("#rechazado").val("");
	$("#tamlote").val("");
	$("#muestraRechazada").val(0);
	$("#muestraOk").val(0);
	$("#suma").val(0);
	$("#estatus").html("");
}

function insertRegistro()
{
	$.post('php/registro.php', {orden:orden,suma:suma,observaciones:observaciones,status:status,muestraOk:muestraOk,
		muestraRechazada:muestraRechazada,tabla:tabla,tamlote:tamlote},
		function(result)
		{			
			cleanData();
			cleanTamano();
			$("#file").html("");
			$("#respuesta").html("");
			getFolio();	
		},'json');

}

function sendMail()
{
	$.post('php/enviar_correo/correo.php', {orden:orden,tamlote:tamlote,tabla:tabla,muestraRechazada:muestraRechazada,
		observaciones:observaciones,rechazado:rechazado,file:file},);
}

function obtInspeccion(){
	$.post('php/obtInspeccion.php', {tamlote:tamlote,tabla:tabla},
		function(result)
		{						
			if(result.data.length>0)
			{
				Materialize.toast('Consulta  exitosa', 800,'green darken-4',function()
				{
					aceptado = result.data[0].aceptado;
					rechazado = result.data[0].rechazado;													
					$("#nivel").val(result.data[0].nivel).siblings().addClass( "active" );
					$("#tamuestra").val(result.data[0].tamano).siblings().addClass( "active" );
					$("#aceptado").val(result.data[0].aceptado).siblings().addClass( "active" );
					$("#rechazado").val(result.data[0].rechazado).siblings().addClass( "active" );
				});
			} else 
			{
				Materialize.toast('Algo salio mal', 800,'red darken-4',function(){
					cleanData();
					getFolio();
				});
			}
		},'json');	
}

function number_format(amount, decimals) {

amount += ''; // por si pasan un numero en vez de un string
amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

decimals = decimals || 0; // por si la variable no fue fue pasada

// si no es un numero o es igual a cero retorno el mismo cero
if (isNaN(amount) || amount === 0) 
	return parseFloat(0).toFixed(decimals);

// si es mayor o menor que cero retorno el valor formateado como numero
amount = '' + amount.toFixed(decimals);

var amount_parts = amount.split('.'),
regexp = /(\d+)(\d{3})/;

while (regexp.test(amount_parts[0]))
	amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

return amount_parts.join('.');
}

});