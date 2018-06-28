$(document).ready(function(){
 var id_actividad = 0, nombre_actividad = "", fechafin = 0, fechinicio = 0,fechfin = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;

	var table = $('#RegistroActividades').DataTable(
	{
		"searching": true,
		"scrollY": '80vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging": false,		
		"order": [[0, "desc" ]],
		"ordering": false,				
		"ajax": 
		{
			"method":"POST",
			"url": "php/registrosActividades.php"
		},
		"columns":
		[         
			{"data":"id"},
			{"data":"id_empleado"},
			{"data":"actividad",width: "50%"},
			{"data":"fechainicio", width: "50%"},
			{"data":"fechafin", width: "50%"},
			{"data":"cantidad"},
			{"data":"op"},
			{"data":"tiempo"},
			{"data":"otra_actividad"},
			{"data":"tipo_actividad"},    
			{"data":"tipo_maquina"}
		],
		"columnDefs": 
		[
		{"className": "dt-center", "targets": [0,1,2,3,4,5,6,7,8,9,10] },
			{
			"targets": [ 0 ],
			"visible": false,
			"searchable": true
			}
		],
		"language": 
		{
			sLoadingRecords: "Cargando...",        
			zeroRecords: "No hay registros",
			sInfo: "_END_ de _TOTAL_ registros",
			sInfoEmpty: "0 de 0 registros",
			sInfoFiltered: "(de _MAX_ registros en total)",                       
			search: "Buscar:"
		}  
	});

	$.post("php/consultaMaquina.php",
	 	function(data)
	 	{
	 		for(var i=0;i<data.rows.length;i++)
	 		{
	 			$("#costos").append("<option value='"+data.rows[i].id+"'>"+data.rows[i].maquina+"</option");
	 		}
	 	},'json'
	);

	$("#noEmpleado").change(function()
	{
		noempleado = $("#noEmpleado").val()
		$.post(
			'php/validarEmpleado.php',
			{
				noempleado : noempleado
			},
			function(result)
			{
				if(result.validacion)/*typeof result.validacion !== "undefined" &&*/
				{
					$("#guardaActividad").show();
					$("#prov").text(result.NombreP);
					$("#valorNombre").val(result.validacion);
					if(result.prov=="LITO")
					{
						$("#lito").prop("checked", true);
						$("#prov").html("<b>Proveedor: LITO</b>");
					}
					else
					{
						$("#maq").prop("checked", true);
						$("#prov").html("<b>Proveedor:<br>"+result.NombreP+"</b>");
					}				
				}
				else
				{
					$("#guardaActividad").hide();
					$("#valorNombre").val("No.Empleado no existe");
					$("#noEmpleado").focus();
					$("#lito").prop("checked", false);
					$("#maq").prop("checked", false);
					$("#prov").html("");				
				}
			},'json'
		);
	});

	$("#op").change(function()
	{
		orden = $("#op").val();
		$.post(
			'php/validarOrden.php',
			{
				orden:orden
			},
			function(result)
			{
				if(result.validacion === 'true')/*typeof result.NumOrden !== 'undefined'*/ 
				{
					$("#guardaActividad").show();
					$("#valorOrden").val(result.trabajo).siblings().addClass('active');
				}
				else
				{
					$("#valorOrden").val("orden cerrada").siblings().addClass('active');
					$("input[type='text']").prop("disabled",true);
					$("input[type='datetime-local']").prop("disabled",true);
					$("select").prop("disabled",true);
				}
			},'json'
		);
	});

	$("#hrinicio").change(function()
	{
		if( $("#fechaInicio").val() != "" )
		{
			if( $("#hrinicio").val().length == 4 )
			{		
				var hrs = $("#hrinicio").val().substr(0,2);
				var mins= $("#hrinicio").val().substr(2,4);
				$("#hrinicio").val(hrs + ":" + mins);

				if( hrs <= 24 && mins <= 59)
				{
					fechinicio = $("#fechaInicio").val() + " " + hrs + ":" + mins;
				}
				else
				{
					alert( "Ingresa una hora valida" );
					$("#hrinicio").val("");
				}

			}
			else
			{
				alert("Ingresa una Hora valida");
				$("#hrinicio").val("");
			}
		}
		else
		{
			alert( "Ingresa una fecha" );
		}
	});

	$("#hrfin").change(function()
	{
		if( $("#fechaFin").val() != "" )
		{
			if( $("#hrfin").val().length == 4 )
			{		
				var hrs = $("#hrfin").val().substr(0,2);
				var mins= $("#hrfin").val().substr(2,4);
				$("#hrfin").val(hrs + ":" + mins);

				if( hrs <= 24 && mins <= 59)
				{
					fechfin = $("#fechaFin").val() + " " + hrs + ":" + mins;
					console.log(fechfin);
				}
				else
				{
					alert( "Ingresa una hora valida" );
					$("#hrfin").val("");
				}
				
			}
			else
			{
				alert("Ingresa una Hora valida");
				$("#hrfin").val("");
			}
		}
		else
		{
			alert( "Ingresa una fecha" );
		}
	});

	$('#RegistroActividades tbody').on( 'click', 'tr', function () 
	{
		limpiar();

		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}

		var data = table.row( this ).data();

	  	id = data.id;
	  	noempleado = data.id_empleado;
	  	orden = data.op;
	  	tiempo = data.tiempo;

	  	$("#noEmpleado").val(noempleado).siblings().addClass('active');
	  	$("#noEmpleado").prop("readonly",true);
	  	$("#op").val(orden).siblings().addClass('active');
	  	$("#op").prop("readonly",true);
		
		$.post(
			'php/validarEmpleado.php',
			{
				noempleado : noempleado
			},
			function(result)
			{
				if(result.validacion)/*typeof result.validacion !== "undefined" &&*/
				{
					$("#guardaActividad").show();
					$("#prov").html(result.NombreP);
					$("#valorNombre").val(result.validacion).siblings().addClass('active');
					$("#valorNombre").prop("readonly",true);
					if(result.prov == "LITO")
					{
						$("#lito").prop("checked", true);
						$("#prov").html("<b>Proveedor: LITO</b>");
					}
					else
					{
						$("#maq").prop("checked", true);
						$("#prov").html("<b>Proveedor:<br>"+result.NombreP+"</b>");
					}				
				}
			},'json'
		);

		$.post(
			'php/validarOrden.php',
			{
				orden:orden
			},
			function(result)
			{
				if(result.validacion === 'true')//typeof result.NumOrden !== "undefined" && result.NumOrden
				{
					$("#guardaActividad").show();
					$("#valorOrden").val(result.trabajo).siblings().addClass('active');
					$("#valorOrden").prop("readonly",true);
				
				}
			},'json'
		);

		$.post(
			'php/consultarRegistro.php',
			{
				id:id
			},
			function(result)
			{
				accion = 1;
				id_actividad = result.data[0].Actividad;
				
				var dateinicio = new Date(result.data[0].FechaInicio);
				var diainicio = dateinicio.getDate();
				var mesinicio = dateinicio.getMonth()+1;			
				var anoinicio = dateinicio.getFullYear();
				var horasinicio = dateinicio.getHours();
				var minutosinicio = dateinicio.getMinutes();
				mesinicio = ( mesinicio < 10 ) ? "0"+mesinicio : mesinicio;
				diainicio = ( diainicio < 10 ) ? "0"+diainicio : diainicio;
				horasinicio = ( horasinicio < 10 ) ? "0"+horasinicio : horasinicio;
				minutosinicio = ( minutosinicio < 10 ) ? "0"+minutosinicio : minutosinicio;			
				fechinicio = anoinicio + "-" + mesinicio + "-" + diainicio + " " + horasinicio + ":" + minutosinicio;
				$("input[id='fechaInicio']").val(anoinicio + "-" + mesinicio + "-" + diainicio ).siblings().addClass('active');
				$("#hrinicio").val(horasinicio + ":" + minutosinicio).siblings().addClass('active');

				var datefin = new Date(result.data[0].FechaFin);
				var diafin = datefin.getDate();
				var mesfin = datefin.getMonth()+1;			
				var anofin = datefin.getFullYear();
				var horasfin = datefin.getHours();
				var minutosfin = datefin.getMinutes();
				mesfin = ( mesfin <10 ) ? "0"+mesfin : mesfin;
				diafin = ( diafin <10 ) ? "0"+diafin : diafin;
				horasfin = ( horasfin < 10 ) ? "0"+horasfin : horasfin;
				minutosfin = ( minutosfin < 10 ) ? "0"+minutosfin : minutosfin;	
				fechfin = anofin + "-" + mesfin + "-" + diafin + " " + horasfin + ":" + minutosfin;			
				$("input[id='fechaFin']").val(anofin + "-" + mesfin + "-" + diafin ).siblings().addClass('active');
				$("#hrfin").val(horasfin + ":" + minutosfin).siblings().addClass('active');

				$("#repo").val(result.data[0].Cantidad).siblings().addClass('active');			
				$("#otro").val(result.data[0].Otra_Actividad).siblings().addClass('active');

				if( result.data[0].Tipo_Maquina != "")
				{	
					$('select[name="costos"]>option').removeAttr("selected");
					$('select[name="costos"]>option[value=' + result.data[0].Tipo_Maquina + ']').attr("selected", true);
					$("#costos").val(result.data[0].Tipo_Maquina);			
				}
				else
				{
					$('select[name="costos"]>option').removeAttr("selected");
					$('select[name="costos"]>option[value="0"]').attr("selected", true);
					$("#costos").val("0");
				}
					if ( $("#"+result.data[0].Actividad).hasClass('selected') ) 
					{
						$("#"+result.data[0].Actividad).removeClass('selected');
					}
					else 
					{
						table2.$('td.selected').removeClass('selected');
						$("#"+result.data[0].Actividad).addClass('selected');
					}			
			},'json'
		);	
	});

	//Filtrado
	table.search( "2018" ).draw();

	//Llenar tabla de actividades
	$.post('php/actividades.php',
		function(result)
		{
			for(var i in result.data) {
			  $("#"+i).html(result.data[i].actividad);
			}	
		},'json'
	);

	table2 = $('#actividades').DataTable(
	{
		"searching" : false,
		"paging" : false,
		"bInfo" : false,
		"ordering" : false,     
		fixedHeader: 
		{
	        header: false,
	        footer: false
	    }
	});	

	$('#actividades tbody').on( 'click', 'td', function () 
	{
		if ( $(this).hasClass('selected') ) 
		{
			$(this).removeClass('selected');
		}
		else 
		{
			table2.$('td.selected').removeClass('selected');
			$(this).addClass('selected');
		}
		    nombre_actividad = $(this).text();
			id_actividad = $(this).attr('id');
	});

	$("#cancelar").click(function()
	{
		limpiar();
	});


	$("#registraActividad").submit(function()
	{
		var datosActividad = $(this).serialize()+"&tiempo="+tiempo+"&accion="+accion+"&id="+id+"&elijeAct="+id_actividad+"&fechInicio="+fechinicio+"&fechFin="+fechfin;
		event.preventDefault();

		if( $("#op").val() == "" && $("#costos").val() == 0 )
		{			
			alert("Ingresa una OP o Selecciona una Máquina");
		}
		else
		{
			if(id_actividad === "")
			{
				Materialize.toast("Elige una actividad", 500, 'red darken-4');
			}
			else
			{
				var f1 = new Date($("#fechaSistema").val()).getTime();
				var f2 = new Date($("#fechaInicio").val()).getTime();			
				var dif = f1 - f2;
				var difdias = Math.floor(dif / (1000 * 60 * 60 * 24));
				if(difdias > 15)
				{
					Materialize.toast("Fecha fuera de rango", 500, 'red darken-4');
				}
				else
				{
					$.post("php/registrarActividad.php",datosActividad,
						function(result){

							if(result.validacion == "true")
							{
								table.ajax.reload();
								if(accion == 0)
								{
									Materialize.toast("Se guardo", 500, 'green darken-4');
									limpiar();
								}
								else
								{
									Materialize.toast("Se Actualizo", 500, 'green darken-4');
									limpiar();
								}							
							}
						},'json'
					);
				}					
			}						
		}
	});

	$("#borrar").click(function(){
		if(id !=0)
		{
			$.post("php/borrar.php",{id:id},
				function(data)
				{
					Materialize.toast("Se elimino", 500, 'green darken-4');
					limpiar();
					table.ajax.reload();
				},'json'
			);
		}
		else
		{
			Materialize.toast("Selecciona un registro", 500, 'red darken-4');
		}
	});

	function limpiar()
	{
		$("input[type=text]").val("");
		$("input[type='text']").prop("disabled",false);
		$("input[type=datetime-local]").val("");
		$("input[type=datetime-local]").prop("disabled",false);
		$("select").prop("disabled",false);	

		$('select[name="costos"]>option').removeAttr("selected");
		$('select[name="costos"]>option[value="0"]').attr("selected", true);
		$("#prov").html("");

		table.$('tr.selected').removeClass('selected');
		table2.$('td.selected').removeClass('selected');

		$('#op').prop("readonly",false);
		$('#valorOrden').prop("readonly",false);

		id_actividad = 0, nombre_actividad = "", fechafin = 0, fechainicio = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;

		$("#lito").prop("checked", false);
		$("#maq").prop("checked", false);	

		id_actividad = 0, nombre_actividad = "", fechafin = 0, fechainicio = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;			
	}

});