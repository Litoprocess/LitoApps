$(document).ready(function(){
 var id_actividad = 0, nombre_actividad = "", fechafin = 0, fechainicio = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;

 	var table = $('#RegistroActividades').DataTable({
      	"searching": true,
		"scrollY": '80vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging": false,		
		"order": [[0, "desc" ]],
		"ordering": false,				
    /*dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Exportar a Excel'

    }
    ],*/
   	"ajax": {
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
    "columnDefs": [
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
			noempleado:noempleado
		},
		function(result)
		{
			if(/*typeof result.validacion !== "undefined" &&*/ result.validacion)
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

$("#fechInicio").change(function(){
	fechainicio = $(this).val();
	var dateinicio = new Date(fechainicio);
	diainicio = dateinicio.getDay();
	mesinicio = dateinicio.getMonth();
	anoinicio = dateinicio.getFullYear();	
	horasinicio = dateinicio.getHours();
	minutosinicio = dateinicio.getMinutes();

	if(horasinicio>24 || minutosinicio>60){
		Materialize.toast("Hora invalida", 500, 'red darken-4');
		}else{

		}	

	fechafin = $("#fechFin").val();
	var datefin = new Date(fechafin);
	diafin = datefin.getDay();
	mesfin = datefin.getMonth();
	anofin = datefin.getFullYear();	
	horasfin = datefin.getHours();
	minutosfin = datefin.getMinutes();

	var datelocal = new Date();
	dialocal = datelocal.getDay();
	meslocal = datelocal.getMonth();
	anolocal = datelocal.getFullYear();
	horaslocal = datelocal.getHours();
	minutoslocal = datelocal.getMinutes();

	hora = dialocal + '-' + meslocal + '-' + anolocal + ' ' + ('0' + (horasinicio)).slice(-2) + ':' + ('0' + (minutosinicio)).slice(-2);
	hora2 = dialocal + '-' + meslocal + '-' + anolocal + ' ' + ('0' + (horasfin)).slice(-2) + ':' + ('0' + (minutosfin)).slice(-2);


	  // convertimos valores de cada tiempo en milisegundos
	  var msecPerMinute = 1000 * 60;
	  var msecPerHour = msecPerMinute * 60;
	  var msecPerDay = msecPerHour * 24;

	  // Convertimos hora de llegada a milisegundos
	  var date = new Date(hora);
	  var dateMsec = date.getTime();

	  // Convertimos hora actual a milisegundos
	  var date2 = new Date(hora2);
	  var dateMsec2 = date2.getTime();

	  // Restamos los 2 tiempos
	  var interval = dateMsec2 - dateMsec;
	  var days = Math.floor(interval / msecPerDay );
	  interval = interval - (days * msecPerDay );

	  var hours = Math.floor(interval / msecPerHour );
	  interval = interval - (hours * msecPerHour );

	  var minutes = Math.floor(interval / msecPerMinute );
	  interval = interval - (minutes * msecPerMinute );

	  var seconds = Math.floor(interval / 1000 );
	  if(minutes<10){
	  	cero="0";
	  }else{
	  	cero="";
	  }
	  if(hours<10){
	  	ceroh="0";
	  }else{
	  	ceroh="";
	  }
	 
	  tiempo = ceroh+hours +":"+cero+minutes;
	  //alert(tiempo);	

});

$("#fechFin").change(function(){
	fechafin = $(this).val();
	var dateinicio = new Date(fechafin);
	dialocal = dateinicio.getDay();
	meslocal = dateinicio.getMonth();
	anolocal = dateinicio.getFullYear();	
	horasinicio = dateinicio.getHours();
	minutosinicio = dateinicio.getMinutes();

	if(horasinicio>24 || minutosinicio>60){
		Materialize.toast("Hora invalida", 500, 'red darken-4');
		}else{

		}	

	fechainicio = $("#fechInicio").val();
	var dateinicio = new Date(fechainicio);
	dialocal = dateinicio.getDay();
	meslocal = dateinicio.getMonth();
	anolocal = dateinicio.getFullYear();	
	horasfin = dateinicio.getHours();
	minutosfin = dateinicio.getMinutes();

	var datelocal = new Date();
	dialocal = datelocal.getDay();
	meslocal = datelocal.getMonth();
	anolocal = datelocal.getFullYear();
	horaslocal = datelocal.getHours();
	minutoslocal = datelocal.getMinutes();

	hora = dialocal + '-' + meslocal + '-' + anolocal + ' ' + horasinicio + ':' + minutosinicio;
	hora2 = dialocal + '-' + meslocal + '-' + anolocal + ' ' + horasfin + ':' + minutosfin;

	  // convertimos valores de cada tiempo en milisegundos
	  var msecPerMinute = 1000 * 60;
	  var msecPerHour = msecPerMinute * 60;
	  var msecPerDay = msecPerHour * 24;

	  // Convertimos hora de llegada a milisegundos
	  var date = new Date(hora);
	  var dateMsec = date.getTime();

	  // Convertimos hora actual a milisegundos
	  var date2 = new Date(hora2);
	  var dateMsec2 = date2.getTime();

	  // Restamos los 2 tiempos
	  var interval = dateMsec2 - dateMsec;
	  var days = Math.floor(interval / msecPerDay );
	  interval = interval - (days * msecPerDay );

	  var hours = Math.floor(interval / msecPerHour );
	  interval = interval - (hours * msecPerHour );

	  var minutes = Math.floor(interval / msecPerMinute );
	  interval = interval - (minutes * msecPerMinute );

	  var seconds = Math.floor(interval / 1000 );
	  if(minutes<10){
	  	cero="0";
	  }else{
	  	cero="";
	  }
	  if(hours<10){
	  	ceroh="0";
	  }else{
	  	ceroh="";
	  }
	 
	  tiempo = ceroh+hours +":"+cero+minutes;
	  //alert(tiempo);	
});


$('#RegistroActividades tbody').on( 'click', 'tr', function () {
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
	$.post(
		'php/validarEmpleado.php',
		{
			noempleado:noempleado
		},
		function(result)
		{
			if(/*typeof result.validacion !== "undefined" &&*/ result.validacion)
			{
				$("#guardaActividad").show();
				$("#prov").html(result.NombreP);
				$("#valorNombre").val(result.validacion).siblings().addClass('active');
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
				$("#valorNombre").val("No.Empleado no existe").siblings().addClass('active');
				$("#noEmpleado").focus();
				$("#lito").prop("checked", false);
				$("#maq").prop("checked", false);
				$("#prov").html("");				
			}
		},'json'
	);

if( orden == "undefined" || orden == "")
{
	$("#op").val("");
	$('#valorOrden').val("");	
}
else
{
	$("#op").val(orden).siblings().addClass('active');

	$.post(
		'php/validarOrden.php',
		{
			orden:orden
		},
		function(result)
		{
			if(result.validacion === 'true')/*typeof result.NumOrden !== "undefined" && result.NumOrden*/
			{
				$("#guardaActividad").show();
				$("#valorOrden").val(result.trabajo).siblings().addClass('active');
			}
			else
			{
				$("#valorOrden").val("");
				//$("input[type='text']").prop("disabled",true);
				//$("input[type='datetime-local']").prop("disabled",true);
				//$("select").prop("disabled",true);
			}
		},'json'
	);
}

	$.post(
		'php/consultarRegistro.php',
		{
			id:id
		},
		function(result)
		{
			accion = 1;
			$("input[id='fechInicio']").val(result.data[0].FechaInicio);
			$("#repo").val(result.data[0].Cantidad).siblings().addClass('active');
			$("input[id='fechFin']").val(result.data[0].FechaFin);
			$("#otro").val(result.data[0].Otra_Actividad).siblings().addClass('active');

			if( result.data[0].Tipo_Maquina != "")
			{	
				$('select[name="costos"]>option').removeAttr("selected");
				$('select[name="costos"]>option[value=' + result.data[0].Tipo_Maquina + ']').attr("selected", true);
				$("#costos").val(result.data[0].Tipo_Maquina);
				$('#op').attr("disabled", true);
				$('#valorOrden').attr("disabled", true);				
			}
			else
			{
				$('select[name="costos"]>option').removeAttr("selected");
				$('select[name="costos"]>option[value="0"]').attr("selected", true);
				$("#costos").val("0");
				$('#op').attr("disabled", false);
				$('#valorOrden').attr("disabled", false);
			}
			//$("select[name='costos']").val(result.data[0].Tipo_Maquina);
				if ( $("#"+result.data[0].Actividad).hasClass('selected') ) {
				$("#"+result.data[0].Actividad).removeClass('selected');
				}
				else {
					table2.$('td.selected').removeClass('selected');
					$("#"+result.data[0].Actividad).addClass('selected');
				}
			//$("#actividades td:contains(" + actividad + ")").addClass('selected');
			id_actividad = result.data[0].Actividad;
		},'json'
	);	
});

//Filtrado
table.search( "2018" ).draw();

$.post('php/actividades.php',
	function(result)
	{
		for(var i in result.data) {
		  $("#"+i).html(result.data[i].actividad);
		}	
	},'json'
	);

table2 = $('#actividades').DataTable({
      "searching": false,
      "paging":         false,
      "bInfo": false,
      "ordering": false,     
fixedHeader: {
            header: false,
            footer: false
        }
});	

/*$(".desmarcado td").on("click", function(){
    var nombre_actividad = $(this).text();
	var id_actividad = $(this).attr('id');
	//$("#"+id_actividad).css({"background":"#ffff00"});
});*/

$('#actividades tbody').on( 'click', 'td', function () {
	if ( $(this).hasClass('selected') ) {
	$(this).removeClass('selected');
	}
	else 
	{
		table2.$('td.selected').removeClass('selected');
		$(this).addClass('selected');
	}
    nombre_actividad = $(this).text();
	id_actividad = $(this).attr('id');
} );

$("#cancelar").click(function(){
	limpiar();
});

$("#registraActividad").submit(function()
{
	var datosActividad=$(this).serialize()+"&tiempo="+tiempo+"&accion="+accion+"&id="+id+"&elijeAct="+id_actividad;
	console.log(datosActividad);
	if(id_actividad == "")
	{
		Materialize.toast("Elige una actividad", 500, 'red darken-4');
	}
	else
	{
		//if( $("#otro").val() == "" )
		//{
			//Materialize.toast("Agrega una Descripción", 500, 'red darken-4');
		//}
		//else
		//{
			var f1 = new Date($("#fech").val()).getTime();
			var f2 = new Date(fechainicio).getTime();			
			var dif = f1 - f2;
			var difdias = Math.floor(dif / (1000 * 60 * 60 * 24));
    		if(difdias>15)
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
		//}
	}
	return false;
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
	//location.reload();
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

	$('#op').attr("disabled", false);
	$('#valorOrden').attr("disabled", false);

	id_actividad = 0, nombre_actividad = "", fechafin = 0, fechainicio = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;

	$("#lito").prop("checked", false);
	$("#maq").prop("checked", false);	

	id_actividad = 0, nombre_actividad = "", fechafin = 0, fechainicio = 0, noempleado = 0, id = 0, orden = 0, tiempo = 0, accion = 0;			

	//today();
}	

function today()
{
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate()+1;

	var output = d.getFullYear() + '-' +
	    (month<10 ? '0' : '') + month + '-' +
	    (day<10 ? '0' : '') + day;	

    $("#fechaSistema").val(output);
}

});