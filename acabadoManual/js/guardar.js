$(document).ready(function(){
	
	$("#noEmpleado").focus();
	$("#msjConfirmaciondos").hide();
	$("#registroEmpleados").submit(function(){
		$("#claveG").show();
		var datosEmpleado=$(this).serialize();

				//comprobar campo imss

				var value = $("#imss").val().length;
				if(value>11){
					$("#errorImss").html("El campo IMSS debe de ser máximo de 11 dígitos");
					
				}else{
					$("#errorImss").html("");
					$("#msjConfirmaciondos").show();
					$("#msjConfirmaciondos").html("Datos guardados");
					setTimeout(function() {
						$("#msjConfirmaciondos").fadeOut(8000);
					},250);

					

					$.post("php/registrar.php",datosEmpleado,
						function(data){
							
							$("#claveG").html("Clave: "+data.clave)
							$("#nombre").val("");
							$("#edad").val("");
							$("#genero").val("");
							$("#imss").val("");
							$("#proveedor").val("");
							$("#nombre").focus();
							setTimeout(function() {
								$("#claveG").fadeOut(1500);
							},3000);

							$("#consultaEmpleados").jqGrid("clearGridData", true).trigger("reloadGrid");

						},'json'

						);

				}



				return false;

			});

		//consultar actividades para llenar tabla
		var actividad="";
		$.post("php/actividades.php",actividad,
			function(data){
				var total=data.rows.length;
				$("#1").append(data.rows[0].actividad);
				$("#2").append(data.rows[1].actividad);
				$("#3").append(data.rows[2].actividad);
				$("#4").append(data.rows[3].actividad);
				$("#5").append(data.rows[4].actividad);
				$("#6").append(data.rows[5].actividad);
				$("#7").append(data.rows[6].actividad);
				$("#8").append(data.rows[7].actividad);
				$("#9").append(data.rows[8].actividad);
				$("#10").append(data.rows[9].actividad);
				$("#11").append(data.rows[10].actividad);
				$("#12").append(data.rows[11].actividad);
				$("#13").append(data.rows[12].actividad);
				$("#14").append(data.rows[13].actividad);
				$("#15").append(data.rows[14].actividad);
				$("#16").append(data.rows[15].actividad);
				$("#17").append(data.rows[16].actividad);
				$("#18").append(data.rows[17].actividad);
				$("#19").append(data.rows[18].actividad);
				$("#20").append(data.rows[19].actividad);

	          //---


	          $("#21").append(data.rows[20].actividad);
	          $("#22").append(data.rows[21].actividad);
	          $("#23").append(data.rows[22].actividad);
	          $("#24").append(data.rows[23].actividad);
	          $("#25").append(data.rows[24].actividad);
	          $("#26").append(data.rows[25].actividad);
	          $("#27").append(data.rows[26].actividad);
	          $("#28").append(data.rows[27].actividad);
	          $("#29").append(data.rows[28].actividad);
	          $("#30").append(data.rows[29].actividad);
	          $("#31").append(data.rows[30].actividad);
	          $("#32").append(data.rows[31].actividad);
	          $("#33").append(data.rows[32].actividad);
	          $("#34").append(data.rows[33].actividad);
	          $("#35").append(data.rows[34].actividad);
	          $("#36").append(data.rows[35].actividad);
	          $("#37").append(data.rows[36].actividad);
	          $("#38").append(data.rows[37].actividad);
	          $("#39").append(data.rows[38].actividad);
	          $("#40").append(data.rows[39].actividad);


	          $("#41").append(data.rows[40].actividad);
	          $("#42").append(data.rows[41].actividad);
	          $("#43").append(data.rows[42].actividad);
	          $("#44").append(data.rows[43].actividad);
	          $("#45").append(data.rows[44].actividad);
	          $("#46").append(data.rows[45].actividad);

	          $("#47").append(data.rows[46].actividad);
	          $("#48").append(data.rows[47].actividad);
	          $("#0").append(data.rows[48].actividad);
	          $("#49").append(data.rows[49].actividad);
	          


      /*$("#actividades").append("<tr><td id='t1'><input type='radio' name='elijeAct' id='radio1'  value='"+data.rows[0].id+"'>"+data.rows[0].actividad+"</td> <td><input type='radio' name='elijeAct'  value='"+data.rows[1].id+"'>"+data.rows[1].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[2].id+"'>"+data.rows[2].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[3].id+"'>"+data.rows[3].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[4].id+"'>"+data.rows[4].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[5].id+"'>"+data.rows[5].actividad+"</td><td><input type='radio' name='elijeAct'  value='"+data.rows[6].id+"'>"+data.rows[6].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[7].id+"'>"+data.rows[7].actividad+"</td></tr>");
      $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[8].id+"'>"+data.rows[8].actividad+"</td> <td><input type='radio' name='elijeAct'   value='"+data.rows[9].id+"'>"+data.rows[9].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[10].id+"'>"+data.rows[10].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[11].id+"'>"+data.rows[11].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[12].id+"'>"+data.rows[12].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[13].id+"'>"+data.rows[13].actividad+"</td><td><input type='radio' name='elijeAct'  value='"+data.rows[14].id+"'>"+data.rows[14].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[15].id+"'>"+data.rows[15].actividad+"</td></tr>");
      $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[16].id+"'>"+data.rows[16].actividad+"</td> <td><input type='radio' name='elijeAct'   value='"+data.rows[17].id+"'>"+data.rows[17].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[18].id+"'>"+data.rows[18].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[19].id+"'>"+data.rows[19].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[20].id+"'>"+data.rows[20].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[21].id+"'>"+data.rows[21].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[22].id+"'>"+data.rows[22].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[23].id+"'>"+data.rows[23].actividad+"</td></tr>");
      $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[24].id+"'>"+data.rows[24].actividad+"</td> <td><input type='radio' name='elijeAct'   value='"+data.rows[25].id+"'>"+data.rows[25].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[26].id+"'>"+data.rows[26].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[27].id+"'>"+data.rows[27].actividad+"</td><td><input type='radio' name='elijeAct'  value='"+data.rows[28].id+"'>"+data.rows[28].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[29].id+"'>"+data.rows[29].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[30].id+"'>"+data.rows[30].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[31].id+"'>"+data.rows[31].actividad+"</td></tr>");
      $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[32].id+"'>"+data.rows[32].actividad+"</td> <td><input type='radio' name='elijeAct'  value='"+data.rows[33].id+"'>"+data.rows[33].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[34].id+"'>"+data.rows[34].actividad+"</td><td><input type='radio' name='elijeAct'  value='"+data.rows[35].id+"'>"+data.rows[35].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[36].id+"'>"+data.rows[36].actividad+"</td><td><input type='radio' name='elijeAct'  value='"+data.rows[37].id+"'>"+data.rows[37].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[38].id+"'>"+data.rows[38].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[39].id+"'>"+data.rows[39].actividad+"</td></tr>");
      $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[40].id+"'>"+data.rows[40].actividad+"</td> <td><input type='radio' name='elijeAct'   value='"+data.rows[41].id+"'>"+data.rows[41].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[42].id+"'>"+data.rows[42].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[43].id+"'>"+data.rows[43].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[44].id+"'>"+data.rows[44].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[45].id+"'>"+data.rows[45].actividad+"</td><td><input type='radio' name='elijeAct'   value='"+data.rows[46].id+"'>"+data.rows[46].actividad+"</td><td><input type='radio' name='elijeAct'  id='elijeAct' value='"+data.rows[47].id+"'>"+data.rows[47].actividad+"</td></tr>");
       $("#actividades").append("<tr><td><input type='radio' name='elijeAct'   value='"+data.rows[49].id+"'>"+data.rows[49].actividad+"</td> <td><input type='radio' name='elijeAct'   value='"+data.rows[48].id+"'>"+data.rows[48].actividad+"</td></td></tr>");
       */

	 $//("#otrod").append("<b>NOTA</b>: <input type='text' name='otro' id='otro' size='40' placeholder='Descripción de Actividad'>");
	},'json'
	);

		//funcion para restar fechas

		restaFechas = function(f1,f2)
		{
			var aFecha1 = f1.split('/'); 
			var aFecha2 = f2.split('/'); 
			var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
			var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
			var dif = fFecha2 - fFecha1;
			var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
			return dias;
		}

		$("#registraActividad").submit(function(){
			var tiempoRealizado=$("#tiempo").val();
			var accion=$("#accion").val();
			var idUsuario=$("#id").val();
			$("#msjConfirmacion").show();
			var datosActividad=$(this).serialize()+"&tiempo="+tiempoRealizado+"&accion="+accion+"&id="+idUsuario;
			
			var idAc=$("#Act").val();
			var otro=$("#otro").val();
			
			if(idAc==""){
				$("#descripcionNota").html("Elige una Actividad");
			}else{

				if(idAc==0 && otro ==""){
					$("#descripcionNota").html("Agrega una Descripción");
					
				}
                	else{//inicio inserción
                		$("#descripcionNota").html("");


                		var f1 = $("#fechInicio").val();
                		var f2=$("#fechaSistema").val();
                		var ff1 = $.datepicker.formatDate("d/m/yy", new Date(f1));
                		var ff2 = $.datepicker.formatDate("d/m/yy", new Date(f2));
                		
                		var diferenciaDias=restaFechas(ff1,ff2);
                		if(diferenciaDias>15){
                			$("#msjConfirmacion").html("<b style='color:red;'>No se puede insertar Proceso la Fecha inicio supera los 15 días</b>");
                        //$("#msjConfirmacion").fadeOut(10000);

                    }
                    else{
                    	$("#msjConfirmacion").html("");

                    	$.post("php/registraActividad.php",datosActividad,
                    		function(data){
                    			
                    			if(accion==0){
							/*setTimeout(function() {
				   $("#msjConfirmacion").html("Actividad guardada");
                   $("#msjConfirmacion").fadeOut(8000);
                    },250);
*/
alert("Datos guardados correctamente. :)");
}else{
	setTimeout(function() {

		$("#msjConfirmacion").html("Actividad Actualizada");
		$("#msjConfirmacion").fadeOut(8000);
	},250);
}


				//$("#noEmpleado").val("");
				$("#op").val("");
				$("#elijeAct").val("");
				$("#inicio").val("");
				$("#fin").val("");
				$("#repo").val("");
				$("#TiempoTrasncurrido").hide();
				$("#valorOrden").html("");
				//$("#valorNombre").html("");
				$("#lito").prop("checked", false);
				$("#maq").prop("checked", false);
				$("#prov").html("");
				$("#otro").val("");
				$("td").css({"background-color": ""});
				$("#op").focus();
				$('#op').prop("disabled", false); 
				$('#costos').prop('selectedIndex',0);
				$('#repo').prop("disabled", false);
				$("#fechInicio").val("");
				$("#fechFin").val("");
				$("#consulta").jqGrid("clearGridData", true).trigger("reloadGrid");

			},'json'

			);
}

		           }//fin de insert
		       }
		       return false;

		   });
		//ocultar tiempo
		$("#TiempoTrasncurrido").hide();
		//validar campos 

		$("#noEmpleado").change(function(){

			var idempleado="idempleado="+$(this).val();
			$("#lito").prop("checked", false);
			$("#maq").prop("checked", false);
			$.post("php/validarEmpleado.php",idempleado,
				function(data){
					if(typeof data.validacion !== "undefined" && data.validacion){
						$("#guardaActividad").show();
						$("#valorNombre").val(data.validacion).siblings().addClass( "active" );
						if(data.prov=="Lito"){
							$("#lito").prop("checked", true);
							$("#prov").html("<b>Proveedor: Lito</b>");

						}else{

							$("#maq").prop("checked", true);
							$("#prov").html("<b>Proveedor:<br>"+data.NombreP+"</b>");
							
						}

					}else{
						$("#guardaActividad").hide();
						$("#valorNombre").val("<p style='color:red;'>No.Empleado no existe</p>");
						$("#noEmpleado").focus();
						$("#lito").prop("checked", false);
						$("#maq").prop("checked", false);
						$("#prov").html("");

					}
				},'json'

				);
			

		});

		$("#fin").change(function(){
			var fechaInicial=$("#fechInicio").val();
			var fechaFinal=$("#fechFin").val();
			
			
			var d2PrimeraParte=$("#fin").val().slice(0,2);
			var d2SegundaParte=$("#fin").val().slice(2,4);
			
			if(d2PrimeraParte>24 || d2SegundaParte>60  || fechaInicial>fechaFinal){
				$("#descripcionNota").html("Ingresa Fecha-Hora válida");
				$("#fechInicio").focus();

				$("#TiempoTrasncurrido").hide();
			}else{
				$("#descripcionNota").html("");
        			//$("#TiempoTrasncurrido").show();
        		}

        		var d1=$("#inicio").val();
        		var d2=d2PrimeraParte+":"+d2SegundaParte;
        		$("#fin").val(d2);


        		
        		var fechaLocal=$("#fechaLocal").val();
        		Hora = fechaLocal+" "+d1; 
        		horados=fechaLocal+" "+d2; 
        		
		  // convertimos valores de cada tiempo en milisegundos
		  var msecPerMinute = 1000 * 60;
		  var msecPerHour = msecPerMinute * 60;
		  var msecPerDay = msecPerHour * 24;

		  // Convertimos hora de llegada a milisegundos
		  var date = new Date(Hora);
		  var dateMsec = date.getTime();

		  // Convertimos hora actual a milisegundos
		  var date2 = new Date(horados);
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
		  
		  Tiempo = ceroh+hours +":"+cero+minutes;
		  $("#tiempo").val(Tiempo);
		  	//$("#TiempoTrasncurrido").html("Tiempo Transcurrido: "+Tiempo);
		  	

		  });
$("#inicio").change(function(){
	var d2PrimeraParte=$("#inicio").val().slice(0,2);
	var d2SegundaParte=$("#inicio").val().slice(2,4);
	
	if(d2PrimeraParte>24 || d2SegundaParte>60){
		$("#descripcionNota").html("Ingresa Hora válida");
		$("#TiempoTrasncurrido").hide();
	}else{
		$("#descripcionNota").html("");
        			//$("#TiempoTrasncurrido").show();
        		}

        		var d2=$("#fin").val();
        		var d1= d2PrimeraParte+":"+d2SegundaParte;


        		
        		var fechaLocal=$("#fechaLocal").val();
        		Hora = fechaLocal+" "+d1; 
        		horados=fechaLocal+" "+d2; 
        		
		  // convertimos valores de cada tiempo en milisegundos
		  var msecPerMinute = 1000 * 60;
		  var msecPerHour = msecPerMinute * 60;
		  var msecPerDay = msecPerHour * 24;

		  // Convertimos hora de llegada a milisegundos
		  var date = new Date(Hora);
		  var dateMsec = date.getTime();

		  // Convertimos hora actual a milisegundos
		  var date2 = new Date(horados);
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
		  
		  Tiempo = ceroh+hours +":"+cero+minutes;
		  $("#tiempo").val(Tiempo);
		  	//$("#TiempoTrasncurrido").html("Tiempo Transcurrido: "+Tiempo);
		  	

		  });
		//comprobar si existe la orden

		$("#op").change(function(){

			var orden="orden="+$(this).val();
			$.post("php/validarOrden.php",orden,
				function(data){
					if(typeof data.NumOrden !== "undefined" && data.NumOrden){
						$("#guardaActividad").show();
						$("#valorOrden").html(data.trabajo);
						$("#noTrabajo").val(data.trabajo);

		 					// alert(data.trabajo);
		 				}else{


		 					$("#valorOrden").html("<p style='color:red;'>No.Orden no existe</p>");
		 					$("#guardaActividad").hide();
		 					$("#op").focus();




		 				}
		 			},'json'

		 			);


		});

		$("#cancelar").click(function(){
		 	   /* $("#noEmpleado").val("");
				$("#op").val("");
				$("#elijeAct").val("");
				$("#inicio").val("");
				$("#fin").val("");
				$("#repo").val("");
				$("#valorNombre").html("");
				$("#valorOrden").html("");
				$("#noEmpleado").focus();
				$("#guardaActividad").show();
				$("#TiempoTrasncurrido").hide();
				$("#lito").prop("checked", false);
	            $("#maq").prop("checked", false);
	            $("#prov").html("");*/

	            window.location='registraActividades.php';

	        });
		$("#cancelaEmpleado").click(function(){
			$("#nombre").val("");
			$("#edad").val("");
			$("#genero").val("");
			$("#imss").val("");
			$("#proveedor").val("");
			$("#nombre").focus();
			$("#claveG").html("No.Asignación");

		});

		 //consultar proveedores
		 var cadena="true";
		 $.post("php/proveedores.php",cadena,
		 	function(data){
		 		
		 		for(var i=0;i<data.rows.length;i++){
		 			
		 			$("#proveedor").append("<option value='"+data.rows[i].Clave+"'>"+data.rows[i].Clave+"--"+data.rows[i].Nombre+"</option");
		 		}
		 	},'json'

		 	);

		 $("#inicio").change(function(){
		 	var d1PrimeraParte=$("#inicio").val().slice(0,2);
		 	var d1SegundaParte=$("#inicio").val().slice(2,4);
		 	if(d1PrimeraParte>24 || d1SegundaParte>60){
		 		$("#descripcionNota").html("Ingresa Hora válida");
		 		
		 	}else{
		 		$("#descripcionNota").html("");

		 	}
		 	var fechaini=d1PrimeraParte+":"+d1SegundaParte;
		 	$("#inicio").val(fechaini);
		 });
		 
		 

		 $("#nombre").change(function(){
		 	$("#claveG").show();
		 	$("#claveG").html("No.Asignación");

		 });

		 $("#1").click(function(){
		 	$("#radio1").attr('checked', 'checked');
		 	$("#1").css({"background-color": "yellow"});
		 });


		 $(".desmarcado td").click(function(){
		  // $("input:radio").attr("checked", false);
		  $("td").css({"background-color": ""});
		  var tdr=$(this).text();
		  var id = $(this).attr('id');
		    //$("input:radio#radio"+id).trigger("click");
       		//alert("#radio"+id);


       		$("input:radio").attr("checked", false);
       		$("#radio"+id).attr('checked', 'checked');

       		var valorM=$("#costos").val();
       		if(valorM>0 ){
               $("#10").css({"background-color": "yellow"})//10
           }else{
                $("#"+id).css({"background-color": "yellow"})//10

            }

		 	//$("#"+id).css({"background-color": "yellow"})//10
		 	$("#Act").val(id);
		 	
		 	
		 	
		 });

		 $("#imss").on('keyup', function(){
		 	var value = $(this).val().length;
		 	if(value>11){
		 		$("#errorImss").html("El campo IMSS debe de ser máximo de 11 dígitos");
          	 // var imss=$("#imss").val().slice(0,11);
          	  //$("#imss").val(imss);
          	}else{
          		$("#errorImss").html("");

          	}
          	
          }).keyup();

		 $("#costos").change(function(){
		 	var centro=$(this).val();
		 	if(centro==0){
		 		$("#10").css({"background-color": ""});
		 		$('#op').prop("disabled", false); 
		 		$("#op").focus();
		 		$('#repo').val("");
		 		$('#repo').prop("disabled", false);
		 	}else{
		 		$("#10").trigger("click");
		   				//$("#10").css({"background-color": "yellow"});
		   				$("#op").val("");
		   				$('#op').prop("disabled", true);
		   				$("#valorOrden").html("");
		   				$("#repo").val("0");
		   				$('#repo').prop("disabled", true);
		   				$("#noTrabajo").val("");

		   			//alert("seleccionar apoyar producción");
		   		} 
		   	});
		 
		 var maqui="";
		 $.post("php/consultaMaquina.php",maqui,
		 	function(data){
		 		for(var i=0;i<data.rows.length;i++){
		 			
		 			$("#costos").append("<option value='"+data.rows[i].id+"'>"+data.rows[i].maquina+"</option");
		 		}
		 	},'json'


		 	);

		 
		 $("#borrar").click(function(){

		 	var id="id="+$("#id").val();

		 	if(id !=0){

		 		
		 		$.post("php/borrar.php",id,
		 			function(data){
		 				setTimeout(function() {
		 					$("#msjConfirmacion").html("Eliminado");
		 					$("#consulta").jqGrid("clearGridData", true).trigger("reloadGrid");
		 					$("#msjConfirmacion").fadeOut(6000);
		 				},250);
		 				$("#noEmpleado").val("");
		 				$("#op").val("");
		 				$("#elijeAct").val("");
		 				$("#inicio").val("");
		 				$("#fin").val("");
		 				$("#repo").val("");
		 				$("#TiempoTrasncurrido").hide();
		 				$("#valorOrden").html("");
		 				$("#valorNombre").val("");
		 				$("#lito").prop("checked", false);
		 				$("#maq").prop("checked", false);
		 				$("#prov").html("");
		 				$("#otro").val("");
		 				$("td").css({"background-color": ""});
		 				$("#op").focus();
		 				$('#op').prop("disabled", false); 
		 				$('#costos').prop('selectedIndex',0);
		 				$('#repo').prop("disabled", false);
		 				$("#accion").val(0);
				      //$("#consulta").jqGrid("clearGridData", true).trigger("reloadGrid");
				  },'json'

				  );

}

});

$('input').on("keypress", function(e) {
	/* ENTER PRESSED*/
	if (e.keyCode == 13) {
		/* FOCUS ELEMENT */
		var inputs = $(this).parents("form").eq(0).find(":input");
		var idx = inputs.index(this);
		if (idx == inputs.length - 1) {
			inputs[0].select()
		} else {
                    inputs[idx + 1].focus(); //  handles submit buttons
                    inputs[idx + 1].select();
                }
                return false;
            }
        });

$("#cerrarSe").click(function(){
	window.location='../cerrar.php';

});

$("#fech").change(function(){
	var fecha=$(this).val();
	$("#fechInicio").val(fecha);
	$("#fechFin").val(fecha);
	
});



});