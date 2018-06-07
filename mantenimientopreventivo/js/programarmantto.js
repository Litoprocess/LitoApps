$(document).ready(function()
{
	var dia, now, idoperador, maquina="TODO", secuencia, calendar, formDta="",ruta, manual, data, IdEvento=0;

	$('select').material_select();

	$('#detalle').trigger('autoresize');

	$('.modal').modal(
		{
			dismissible: false
		}
	);

	$('.tap-target').tapTarget('open');

	function welcome()
	{
		$('.tap-target').tapTarget('close');
	}

  	setInterval(welcome, 3000);	


	calendario(maquina); //FUNCION PARA CARGAR EL CALENDARIO DE ACUERDO A LA MAQUINA SELECCIONADA


	$.ajax({//LLENAR SELECT DE MAQUINA
		type: "GET",
		url: 'php/obtMaquinas.php',
		success: function(data){
			$("#maquina").html("<option value='TODO' selected>TODO</option>");
			$("#maquina").append(data);     
		},
		error: function(data) {
			alert('error');
		}
	});

	obtenerComponente(); // LLENAR SELECT DE COMPONENTES	

	$("#maquina").change(function() 
	{
		$("#componente").html("");
		calendar.fullCalendar('destroy');
		maquina = $("#maquina").val();
		calendario(maquina);

		obtenerComponente(); // LLENAR SELECT DE COMPONENTES

	});  

$("#btn-programar").click(function(){
	if( $("#maquina").val() == "TODO" )
	{
		$("#modal3").modal("open");
	}
	else
	{
		limpiar();
		now = moment().format('YYYY-MM-DD');
		$("#fecha").html(now);
		$("#modal1").modal('open');
	}
});    

	$("input[name='file']").on("change", function()
	{
		formData = new FormData($("#agregarEvento")[0]);
		ruta = "php/ajax-subirpdf.php";

		$.ajax({
			url: ruta,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function(datos) 
			{
				var file = datos;
				var src = datos.split('/');
				manual = src[6]; 
			} 		
		});
	});	

	$("#agregarEvento").submit(function(event)
	{
		data = $("#agregarEvento").serialize();
		console.log(data);
  		event.preventDefault();

  		if( IdEvento != 0 )
  		{
  			$.post('php/updateInstructivo.php',{secuencia:$("#secuencia").val(),manual:manual},
  				function(result)
  				{
  					Materialize.toast('Se guardo instructivo', 1200,'green darken-4');
  					$('#calendar').fullCalendar( 'refetchEvents' );
  					$("#modal1").modal("close");
  				},'json');
  		}
  		else
  		{
			if( $("#file").val() == "" )
			{
				$("#modal4").modal('open');
			}
			else
			{
				$.post('php/obtSecuencia.php',
					function(result)
					{		
						if( result.data.length > 0)
						{
							secuencia = result.data[0].secuencia + 1;	
							programar(data);		
						} 
						else 
						{
							secuencia = 1;
							programar(data);
						}
					},'json'
				);
			}
		}
	});

	$("#btn4-aceptar").click(function(){
		$("#modal4").modal('close');
		manual = "";
		$.post('php/obtSecuencia.php',
			function(result)
			{		
				if( result.data.length > 0)
				{
					secuencia = result.data[0].secuencia + 1;	
					programar(data);		
				} 
				else 
				{
					secuencia = 1;
					programar(data);
				}
			},'json'
		);		
	});

	$("#btn4-cancelar").click(function(){
		$("#modal4").modal('close');
	});

	function programar(data)
	{	
		fechainicio = moment($("#fechainicio").val()).format('MM-DD-YYYY');

		var hoy = new Date( moment($("#fechainicio").val()).format('YYYY-MM-DD') ); //Obtener dia y mes de la fecha seleccionada
		var dd = hoy.getDate()+1;
		var mm = hoy.getMonth()+1;
		
		const diff_day = moment("12-31").diff(moment(mm+"-"+dd), 'days'); //Calcular los dias hasta el 31 de diciembre
		
		const diff_month = moment("12-31").diff(moment(mm+"-"+dd), 'month'); //Calcular los meses hasta el 31 de diciembre	

		switch($('input:radio[name=group1]:checked').val()) 
		{
			case 'unico':

			dia= moment(fechainicio).add(d, 'days').format('YYYY-MM-DD');	
			if( diaSemana(dia) == "Saturday" )
			{			
				d++;								
			}				
			else if( diaSemana(dia) == "Sunday" )
			{
				d = d;
			}
			else
			{
				data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia + "&manual=" + manual;						
				$.post('php/addevento.php', data,
					function(result)
					{
						if(result.validacion == true)
						{
							$("#modal1").modal('close');
							$('#calendar').fullCalendar( 'refetchEvents' );							
						}
					},'json'
				);											
			}		
			break;			
			case 'diario':		    	
			for(var d=0; d<=diff_day; d++)
			{			
				dia= moment(fechainicio).add(d, 'days').format('YYYY-MM-DD');	
				if( diaSemana(dia) == "Saturday" )
				{			
					d++;								
				}				
				else if( diaSemana(dia) == "Sunday" )
				{
					d = d;
				}
				else
				{
					data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;						
					$.post('php/addevento.php', data,
						function(result)
						{
							$("#modal1").modal('close');
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);							
						},'json'
					);											
				}		
			}
			break;
			case 'semanal':
			for(var s=0; s<diff_day; s = s + 7)
			{
				dia= moment(fechainicio).add(s, 'days').format('YYYY-MM-DD');
				if( diaSemana(dia) == "Saturday" )
				{			
					s++;								
				}				
				else if( diaSemana(dia) == "Sunday" )
				{
					s = s;
				}
				else
				{
					data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;						
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);					
				}
			}
			break;
			case 'mensual':
			for(var m=0; m<=diff_month; m++)
			{
				dia= moment(fechainicio).add(m, 'month').format('YYYY-MM-DD');
				if( diaSemana(dia) == "Saturday" )
				{		
					dia2= moment(dia).add(2, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);								
				}				
				else if( diaSemana(dia) == "Sunday" )
				{
					dia2= moment(dia).add(1, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);
				}
				else
				{
					data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);					
				}		
			}		        
			break;
			case 'semestral':
			for(var s=0; s<=diff_month; s = s + 6)
			{
				dia= moment(fechainicio).add(s, 'month').format('YYYY-MM-DD');
				if( diaSemana(dia) == "Saturday" )
				{		
					dia2= moment(dia).add(2, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);								
				}				
				else if( diaSemana(dia) == "Sunday" )
				{
					dia2= moment(dia).add(1, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);
				}
				else
				{
					data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);					
				}		
			}		        
			break;
			case 'anual':
			for(var y=0; y<=1; y++)
			{
				dia= moment(fechainicio).add(y, 'year').format('YYYY-MM-DD');
				if( diaSemana(dia) == "Saturday" )
				{		
					dia2= moment(dia).add(2, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);								
				}				
				else if( diaSemana(dia) == "Sunday" )
				{
					dia2= moment(dia).add(1, 'day').format('YYYY-MM-DD');	
					data += "&dia=" + dia2 + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);
				}
				else
				{
					data += "&dia=" + dia + "&estatus=programado" + "&maquina=" + maquina + "&secuencia=" + secuencia  + "&manual=" + manual;							
					$.post('php/addevento.php', data,
						function(result)
						{
							$('#calendar').fullCalendar( 'refetchEvents' );
							$("#modal1").modal('close');
							$("#calendario").hide();
							$("#preloader").show();
							setTimeout(function(){location.reload();},300);
						},'json'
					);					
				}		
			}		        
			break;
		}			
	}

	$("#eliminarsecuencia").click(function()
	{
		if( $("#eliminarsecuencia").prop('checked') )
		{
			$("#modal2").modal('open');
		}
	});

	$("#btn2-aceptar").click(function()
	{
		secuencia = $("#secuencia").val();
		fechainicio = $("#fecha").html();

		$.post('php/deletesecuencia.php', {secuencia:secuencia,fechainicio:fechainicio},		
			function(result)
			{
				if(result.validacion == true)
				{
					$("#modal2").modal("close");
					$("#modal1").modal("close");
					$('#calendar').fullCalendar( 'refetchEvents' );
				}
			},'json'
		);	
	});

	$("#btn3-aceptar").click(function()
	{
		$("#modal3").modal("close");
		$('#calendar').fullCalendar( 'refetchEvents' );
	});

	$("#btn2-cancelar").click(function()
	{
		$("#modal2").modal("close");
		$('#calendar').fullCalendar( 'refetchEvents' );
	});

	$("#btn3-cancelar").click(function()
	{
		$("#modal3").modal("close");
		$('#calendar').fullCalendar( 'refetchEvents' );
	});

	$("#btn1-cancelar").click(function()
	{
		$("#modal1").modal("close");
		$('#calendar').fullCalendar( 'refetchEvents' );
	});

	function calendario(maquina)
	{
		calendar = $('#calendar').fullCalendar(
		{
			lang: 'es-us',
			defaultView: 'month',

			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
			header: 
			{
				left: 'prev,next myCustomButton',
				right: 'title'
			},
			editable: true,
		    eventLimit: true, // allow "more" link when too many events
		    selectable: true,
		    selectHelper: true,    
		    events: 
		    {
		    	url: 'php/example.php',
		    	type: 'POST',
		    	data: {maquina:maquina},
		    	error: function() 
		    	{
		    		$('#script-warning').show();
		    	}
		    },         
		    dayClick: function(date, jsEvent, view) 
		    {
		    	dia = date.format('DD-MM-YYYY');
		    	$("#titulo_evento").html('Evento único');
		    	$("#fecha").html(now);
		    	$("input[name='group1']").attr('disabled',true);
		    	$("#fechainicio").val(dia);
		    },  
		    eventClick: function(event, element) 
		    {
		    	IdEvento = event.id; //obtener el ID del evento seleccionado
		    	$("#secuence").show();
		    	$.post('php/consultarEvento.php',{IdEvento: IdEvento},
		    		function(result)
		    		{
		    			$("#titulo_evento").html("Evento");
		    			$("#"+result.data[0].tipoOp).prop('checked',true);
		    			$("input[name='group2']").attr('disabled',true);				
		    			$("#fecha").html(event.start.format('DD-MM-YYYY'));
		    			$("#titulo").val(result.data[0].titulo).siblings().addClass('active');
		    			$("#componente option[value='"+ result.data[0].componente +"']").attr("selected",true);
		    			$("#componente").attr("disabled",true);
						$("#material").val(result.data[0].material).siblings().addClass('active');
						$("#detalle").val(result.data[0].detalle).siblings().addClass('active');
						$("#"+result.data[0].tipo).prop('checked',true);
						$("input[name='group1']").attr('disabled',true);
						$("#fechainicio").val(result.data[0].fecha_inicio);
						$("#duracion").val(result.data[0].duracion).siblings().addClass('active');	
						$("#secuencia").val(result.data[0].secuencia);
						$("#manual").hide();
						if(result.data[0].manual != "")
						{	
							$("#iconmanual").html('<a href=\"manuales/' + result.data[0].manual + '\" target="_blank"><i class="material-icons">picture_as_pdf</i> ' + result.data[0].manual + '</a>');
							$("#iconmanual").show();
							$("button[type='submit']").hide();
						}
						else
						{							
							$("#iconmanual").hide();
							$("#manual").show();
							$("button[type='submit']").show();
						}											
						$("#modal1").modal('open');
					},'json'
				);
			}
		});  	
	}

	function obtenerComponente()
	{
		$.ajax({ //LLENAR SELECT DE COMPONENTE DE ACUERO A LA MAQUINA SELECCIONADA
			type: "POST",
			url: 'php/obtComponente.php', 
			data: {maquina:maquina},
			success: function(data){
				$("#componente").html("<option value='0' selected disabled>Selecciona una opcion</option>");
				$("#componente").append(data);     
			},
			error: function(data) {
				alert('error');
			}
		});		
	}

	function diaSemana(fecha){
		var dias=["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		var dt = new Date(fecha);
		return dias[dt.getUTCDay()];  
	}

	function limpiar()
	{
		$('textarea').val("");
		$("input[type=text]").val("");
		$("input[name=group1").attr("disabled", false);
		$("input[name=group2").attr("disabled", false);
		$("#secuence").hide();
		$("#fechainicio").val("");
		$("button[type='submit']").show();
		$("#duracion").val("1");
		$("#manual").show();
		$("#iconmanual").hide();
		$("#componente").attr("disabled",false);
	}
});