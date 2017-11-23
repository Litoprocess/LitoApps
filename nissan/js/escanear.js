$(document).ready(function(){

	var guia, sku, estatus;

	$("#guia").focus();
	$("#guia").change(function(){
		guia = $("#guia").val();
		$("#sku").focus();
	});

	$("#sku").change(function(){
		sku = $("#sku").val();
		$.post('php/escanear.php', {guia:guia,sku:sku},
			function(result){
				if(result.validacion == 'false')
				{
					estatus = 'Error';					
					$("#alerta").html("<style>\n\
						div .alerta {\n\
							width: 980px;\n\
							height: 380px;\n\
							background: #d50000;\n\
							color: #ffffff;\n\
						}\n\
						h1 {\n\
							margin: 50px;\n\
							padding: 20px;\n\
							font-size: 208px;\n\
						}\n\
						</style><h1>¡ALERTA!</h1>\n\
						<h4>La Guia: <b>" + guia + "</b> no corresponde al Sku ingresado</h4>\n\
						<audio src='audio/error2.wav' autoplay loop>");
						$("#btnalerta").html("<a id='btnAceptar' class='offset-s4 col s4 waves-effect waves-light red accent-4 btn-large'>Aceptar</a>");
						$("#btnAceptar").click(function(){
							$.post('php/regBitacora.php', {guia:guia,sku:sku,estatus:estatus},
								function(result){
									$("#alerta").html("");
									$("#guia").val("");
									$("#sku").val("");
									$("#btnalerta").html("");					
									$("#guia").focus();													
								});					
						});					
				} else {
					estatus = 'Correcto';
					$.post('php/regBitacora.php', {guia:guia,sku:sku,estatus:estatus});							
					Materialize.toast('Correcto', 500,'green darken-4');					
					$("#alerta").html("");
					$("#guia").val("");
					$("#sku").val("");
					$("#btnalerta").html("");					
					$("#guia").focus();					
				}				
			},'json');		
	});
});

