$(document).ready(function(){
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
					$("#cantidad").val(result.data[0].cantidad).siblings().addClass( "active" );
					$("#acumulado").val(result.data[0].acumulado).siblings().addClass( "active" );
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
		if ($("#tamlote").val() < 2) // || $("#tamlote").val() > cantidad
		{
			Materialize.toast('Tamaño de muestra invalido', 1000,'red darken-4');
		} else 
		{
			var validacion = parseFloat(tamlote) + parseFloat(acumulado);
			if( validacion > cantidad ) 
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
			
		
	$("#muestraOk").change(function()
	{
		muestraOk = $("#muestraOk").val();
		/*if($("#muestraRechazada").val() === "")
		{
		$("#muestraRechazada").val(0);
		} else {
		muestraRechazada = $("#muestraRechazada").val();				
		}*/
			if(muestraRechazada >= rechazado) 
			{
				$("#estatus").html("<p style='color:red'>RECHAZADO</p>");												
			} else 
			{
				$("#estatus").html("<p style='color:green'>ACEPTADO</p>");			
			}			
	});


		$("#muestraRechazada").change(function()
		{
			muestraRechazada = $("#muestraRechazada").val();					
			/*if($("#muestraOk").val() === "")
			{
			$("#muestraOk").val(0);
			} else {
			muestraOk = $("#muestraOk").val();				
			}*/		
					if(muestraRechazada >= rechazado) 
					{
						$("#estatus").html("<p style='color:red'>RECHAZADO</p>");
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
					                    $("#respuesta").html("<img src='imagenes/" + src[6] + "' width='100' height='100'>");					                }
					            });
					        });						      										
					} else 
					{
						$("#estatus").html("<p style='color:green'>ACEPTADO</p>");
						$("#file").html("");			
					}

			});		

$('.amt').keyup(function()
{
suma = 0;
  $(".amt").each(
    function(index, value) 
    {
      if ( $.isNumeric( $(this).val() ) )
      {
      suma = suma + eval($(this).val());
      //console.log(suma);
      }
    }
  );
      $("#suma").val(suma);
});

$("#observaciones").change(function()
{
	observaciones = $("#observaciones").val();	
});

$("#btn-guardar").click(function(event)
{
	if( ($("#noorden").val() === "") && ($("#inspeccion").val() === "none") && ($("#tamlote").val() === "") && ($("#muestraOk").val() === "") && ($("#muestraRechazada").val() === "") || ($("#noorden").val() === "") || ($("#inspeccion").val() === "none") || ($("#tamlote").val() === "") || ($("#muestraOk").val() === "") || ($("#muestraRechazada").val() === "") ) 
	{		
		Materialize.toast('Completa todos los campos', 1000,'red darken-4');
	} else 
	{			
		if(muestraRechazada>=rechazado)
		{
			status="RECHAZADO";
			//alert("Se registro correctamente");
			Materialize.toast('Se registro', 1000,'green darken-4');
			sendMail();
			insertRegistro();												
		} else 
		{
			status="ACEPTADO";
			Materialize.toast('Se registro', 1000,'green darken-4');
			insertRegistro();					
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

});