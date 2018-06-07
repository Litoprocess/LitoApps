$(document).ready(function(){

		  $('.modal').modal({
      dismissible: false // Modal can be dismissed by clicking outside of the modal
  });


var id_meterial=0, tblentran=0,tblAncho=0,tblAlto=0,tblaloancho=0,tblaloalto=0,tblorientacion="",tblmedida=0,tblaprovecha=0, proveedor, MedEspecial,acab;

 var table = $('#tblmedidas').DataTable(
  {           
    "searching": false,
    "scrollX": false,
    "scrollCollapse": false,
    "paging":         false,
    "responsive": true,
    "info" : false,
    /*"autoWidth": false,
    "fixedHeader": {
        "header": false,
        "footer": false
    },    
    "columnDefs": [
      //{ "width": "1px", "targets": [1] },
      { "width": "40%", "targets": [0,1,2,3,4,5] },
      { "width": "0%", "targets": [6,7] }
      ]*/         
    }); 	

 	$("#cantidad").change(function(){
    	table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0"); 		
		$.medidasTabla();
		//$.calculosmaterial(tblentran, tblAncho, tblAlto, tblaloancho, tblaloalto); 
		$.resolucion720();	
		$.resolucion1440();
		$.Sandwich();
		//$.Blanco();
		//$.acab1(tblentran,tblorientacion);
		//$.acab2(tblentran,tblorientacion);
		//$.acab3(tblentran,tblorientacion);
		//$.acab4(tblentran,tblorientacion);
		//$.acab5(tblentran,tblorientacion);
		//$.acab6(tblentran,tblorientacion);	
		$.adicional1();
		$.adicional2();	
		$.adicional3();
		$.adicional4();	
		$.adicional5();
		$.adicional6();					
 	});

	$("#ancho").change(function(){ 		
    	table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0");			
	    if ($("#ancho").value == "")
        {
            $("#ancho").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();						            
        }
        else if ($("#medancho").value == "")
        {
            $("#medancho").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();			            
        }
        else
        {
        	$.totancho();            
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();			            
        }
	});

	$("#alto").change(function(){
    	table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0");		
        if ($("#alto").value == "")
        {
            $("#alto").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();			            
        }
        else if ($("#medalto").value == "")
        {
            $("#medalto").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();			            
        }
        else 
        {            
            $.totalto();
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.Blanco();			            
        }			
	});

	$("#medancho").change(function(){
    	table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0");
	    if ($("#ancho").value == "")
        {
            $("#ancho").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }
        else if ($("#medancho").value == "")
        {
            $("#medancho").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }
        else
        {
        	$.totancho();
            //$("#totancho").val(totAncho);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }
	});	

	$("#medalto").change(function(){
		table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0"); 

        if ($("#alto").value == "")
        {
            $("#alto").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }
        else if ($("#medalto").value == "")
        {
            $("#medalto").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }
        else 
        {
        	//totAlto = parseFloat($("#alto").val()) + parseFloat($("#medalto").val());
            //parseFloat($("#totalto").val(parseFloat($("#alto").val()) + parseFloat($("#medalto").val())));
            $.totalto();
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();			            
        }			
	});		

    $("#material").change(function()
    {    	

		//limpiarDatos(); 
    	table.$('tr.selected').removeClass('selected');
    	//$("#resPrecio").val("0");
    	//$("#resCant").val("0");		  

        if ($("#ancho").val() > 0 && $("#alto").val() > 0 )
        {
			$.medidasTabla();
			$.resolucion720();
			$.resolucion1440();
			$.Sandwich();	
			$("#label-Acab1").html("Acabado 1:");
			$("#resAcab1").val("0");
			$("#label-Acab2").html("Acabado 2:");	
			$("#resAcab2").val("0");
			$("#label-Acab3").html("Acabado 3:");
			$("#resAcab3").val("0");
			$("#label-Acab4").html("Acabado 4:");
			$("#resAcab4").val("0");
			$("#label-Acab5").html("Acabado 5:");
			$("#resAcab5").val("0");
			$("#label-Acab6").html("Acabado 6:");
			$("#resAcab6").val("0");	
			$("#acab1").val ("1");
			$("#acab2").val ("1");
			$("#acab3").val ("1");
			$("#acab4").val ("1");
			$("#acab5").val ("1");
			$("#acab6").val ("1");

	
			//$.acab1(tblentran,tblorientacion);
			//$.acab2(tblentran,tblorientacion);
			//$.acab3(tblentran,tblorientacion);
			//$.acab4(tblentran,tblorientacion);
			//$.acab5(tblentran,tblorientacion);
			//$.acab6(tblentran,tblorientacion);													

        }
        else
        {
            alert("Debes de ingresar primero un valor mayor a 0 en Ancho y Alto");
            $("#ancho").focus();
            $("#material").val(0);
            $.medidasTabla();
			$.resolucion720();	
			$.resolucion1440();
			$.Sandwich();
			//$.acab1(tblentran,tblorientacion);
			//$.acab2(tblentran,tblorientacion);
			//$.acab3(tblentran,tblorientacion);
			//$.acab4(tblentran,tblorientacion);
			//$.acab5(tblentran,tblorientacion);
			//$.acab6(tblentran,tblorientacion);							           

        }
    });	

	$("#mat_especial").click(function(){
		if( $("#ancho").val() == "0" && $("#alto").val() == "0" )
		{
			alert("Debes de ingresar primero un valor mayor a 0 en Ancho y Alto");
			$("#mat_especial").prop("checked",false);
		}
		else
		{
			if ($("#mat_especial").prop("checked") == true)
			{
			$("#dialog_mat_especial").modal('open');
			$("#div_medida_especial").show();
			$("#div_material").hide();

	    	$("#resPrecio").val("0");
	    	$("#resCant").val("0");
	    	$("#porTinta").val("0");
	    	$("#manoObra").val("0");
	    	$(".resacabados").val("0");
	    	$("#acabados").val("0");
	    	$("select[id=material]").val("0");
	    	$("#label-Acab1").html("Acabado1:");
	    	$("#label-Acab2").html("Acabado2:");
	    	$("#label-Acab3").html("Acabado3:");
	    	$("#label-Acab4").html("Acabado4:");
	    	$("#label-Acab5").html("Acabado5:");
	    	$("#label-Acab6").html("Acabado6:");
	    	$("select[id=acab1]").val("1");
	    	$("select[id=acab2]").val("1");
	    	$("select[id=acab3]").val("1");
			$("select[id=acab4]").val("1");
	    	$("select[id=acab5]").val("1");
	    	$("select[id=acab6]").val("1");
	    	$("#resSubtotal").val("0");
	    	$("#resMargen").val("0");
	    	$("#resComision").val("0");
	    	$("#porcientoMargen").val("30");
	    	$("#porcientoComision").val("10");
	    	$("#resPreUnit").val("0");
	    	$("#resTotal").val("0");
	    	$("#resTotal2").val("0");
	    	$("#resBlanco").val("0"); 
	    	$("#titMat").html("");   	

	    	$("#medidas1").html("");
	    	$("#medidas2").html("");
	    	$("#medidas3").html("");
	    	$("#medidas4").html("");
	    	$("#medidas5").html("");
	    	$("#titMat1").html("");
	    	$("#titMat2").html("");
	    	$("#titCantMat").html("");
	    	$("#720").prop("checked",true);
	    	$("#blanco").prop("checked",false);
	    	$("resBlanco").val("0");
	    	$("#resTinta").val("0");			

			}
			else
			{
			$("#div_medida_especial").hide();
			$("#div_material").show();
	    	$("#resPrecio").val("0");
	    	$("#resCant").val("0");
	    	$("#porTinta").val("0");
	    	$("#manoObra").val("0");
	    	$(".resacabados").val("0");
	    	$("#acabados").val("0");
	    	$("select[id=material]").val("0");
	    	$("#label-Acab1").html("Acabado1:");
	    	$("#label-Acab2").html("Acabado2:");
	    	$("#label-Acab3").html("Acabado3:");
	    	$("#label-Acab4").html("Acabado4:");
	    	$("#label-Acab5").html("Acabado5:");
	    	$("#label-Acab6").html("Acabado6:");
	    	$("select[id=acab1]").val("1");
	    	$("select[id=acab2]").val("1");
	    	$("select[id=acab3]").val("1");
			$("select[id=acab4]").val("1");
	    	$("select[id=acab5]").val("1");
	    	$("select[id=acab6]").val("1");
	    	$("#resSubtotal").val("0");
	    	$("#resMargen").val("0");
	    	$("#resComision").val("0");
	    	$("#porcientoMargen").val("30");
	    	$("#porcientoComision").val("10");
	    	$("#resPreUnit").val("0");
	    	$("#resTotal").val("0");
	    	$("#resTotal2").val("0");
	    	$("#resBlanco").val("0");
	    	$("#titMat2").html("");    	

	    	$("#medidas1").html("");
	    	$("#medidas2").html("");
	    	$("#medidas3").html("");
	    	$("#medidas4").html("");
	    	$("#medidas5").html("");
	    	$("#titMat1").html("");
	    	$("#titMat2").html("");
	    	$("#titCantMat").html("");
	    	$("#0").prop("checked",true);
	    	$("#blanco").prop("checked",false);
	    	$("resBlanco").val("0");
	    	$("#resTinta").val("0"); 			
			}
		}
	});

	$("#aceptar_mat_especial").click(function(){
        $("#medida_especial").empty("<option>");
        $.mat_espacial();        
        //$.medidasTablaespecial();
	
	});
////////////////////////////   FUNCION DE LA TABLA DE MEDIDAS ////////////////////////

    $('#tblmedidas tbody').on( 'click', 'tr', function () {
    	var acab=0;
    	var acabado=0;
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        	tblmedida = $(this).find('td').eq(0).html();
			tblentran = $(this).find('td').eq(3).html();
			tblAncho = $(this).find('td').eq(1).html();
			tblAlto = $(this).find('td').eq(2).html();
			tblaloancho = $(this).find('td').eq(6).html();
			tblaloalto = $(this).find('td').eq(7).html();
			tblorientacion = $(this).find('td').eq(4).html();
			tblaprovecha = $(this).find('td').eq(5).html();

			$.calculosmaterial(tblmedida,tblentran,tblAncho,tblAlto,tblaloancho,tblaloalto,tblorientacion,tblaprovecha);

			//$.acab1(tblentran,tblorientacion);
			//$.acab2(tblentran,tblorientacion);
			//$.acab3(tblentran,tblorientacion);
			//$.acab4(tblentran,tblorientacion);
			//$.acab5(tblentran,tblorientacion);
			//$.acab6(tblentran,tblorientacion);

			if ($("#resAcab1").val() > 0)
    {acab=1
    acabado=$("#acab1").val() 
   
}

			$.calcularAcabados(tblentran,tblorientacion,acab,acabado)	
			$.tiempoproduccion(tblAlto);		
    } );

/////////////////////////////// T I N T A S ///////////////////////////77

	$("#720").change(function(){

        	 $.resolucion720();
       		 $.tiempoproduccion(tblAlto);

      
        /*if ($("#720").prop("checked") == true) 
        {
        	if( $("#mat_especial").prop("checked") == true)
        	{
	        	MedEspecial = $("#medida_especial").val();
				$.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
				function(result)
				{				
					if(result.data.length>0)
					{
						$.resolucion720(result);
					}
				},'json');				        		
        	}
        	else 
        	{
        		id_meterial = $("#material").val();
				$.post('php/medidas.php', {id_meterial:id_meterial},               
				function(result)
				{				
					if(result.data.length>0)
					{  
						$.resolucion720(result);						
					}
				},'json');      		
        	}

        }
        else
        {
            $("#resTinta").val("0");
        }*/
       
	});

	$("#1440").change(function(){

        $.resolucion1440();  
		$.tiempoproduccion(tblAlto);  

        
        /*if ($("#1440").prop("checked") == true) 
        {
        	if( $("#mat_especial").prop("checked") == true)
        	{
	        	MedEspecial = $("#medida_especial").val();
				$.post('php/mat_especial.php', {MedEspecial:MedEspecial},               
				function(result)
				{				
					if(result.data.length>0)
					{
						$.resolucion1440(result);
					}
				},'json');				        		
        	}
        	else 
        	{
        		id_meterial = $("#material").val();
				$.post('php/medidas.php', {id_meterial:id_meterial},               
				function(result)
				{				
					if(result.data.length>0)
					{  
						$.resolucion1440(result);						
					}
				},'json');      		
        	}			       	
        }
        else
        {
            $("#resTinta").val("0");
        }*/
    
	});

	$("#0").change(function(){


        if ($("#0").prop("checked") == true) 
        {
        	$("#resTinta").val("0");
        	$("#porTinta").val("0");
        	$("#manoObra").val("0");
        	$.subtotal();
        	$.tiempoproduccion(tblAlto);
		}

       
       
	});

	$("#Sandwich").change(function(){


				
        
			$.Sandwich();
       		$.tiempoproduccion(tblAlto);
        

	});	

	$("#blanco").change(function(){
		
        
		$.Blanco();
		$.tiempoproduccion(tblAlto);
        

	});
	/////////////////////  A C A B A D O S ///////////////////

	$("#acab1").change(function(){
		
				$.acab1(tblentran,tblorientacion);
				
	});	

	$("#acab2").change(function(){	
	
				$.acab2(tblentran,tblorientacion);
			
	
	});	

	$("#acab3").change(function(){
	
				$.acab3(tblentran,tblorientacion);
			
	});	

	$("#acab4").change(function(){
	
				$.acab4(tblentran,tblorientacion);
			
		
	});	

	$("#acab5").change(function(){
		
    				$.acab5(tblentran,tblorientacion);
       		
	});		

	$("#acab6").change(function(){	
			
       	 $.acab6(tblentran,tblorientacion);
				
	});

	$("#costoadic1").change(function(){
			
        $.adicional1();
    
	});		

	$("#costoadic2").change(function(){
			
        		$.adicional2();
        	
		
	});	

	$("#costoadic3").change(function(){
		
        		$.adicional3();
        
	});	

	$("#costoadic4").change(function(){
			
     		   $.adicional4();
     				
	});	

	$("#costoadic5").change(function(){
			
        		$.adicional5();
        	
	});	

	$("#costoadic6").change(function(){
			
        		$.adicional6();
        	
		
	});		

$("#porcientoMargen").change(function(){
	$.subtotal();
});									

$("#porcientoComision").change(function(){
	$.subtotal();
});

//--------------------------------------------------------------------------
//                  				BOTON GUARDAR
//--------------------------------------------------------------------------
	$("#modal-guardar").click(function(){
		$('#dialogoguardar').modal('open');
	});	

	$("#guardarnuevo").click(function(){
        var cadena=$("#form1").serialize()+'&tblmedida='+tblmedida + '&tblancho='+tblAncho + '&tblalto='+tblAlto + '&tblorientacion='+tblorientacion + '&tblentran='+tblentran + '&tblaprovecha='+tblaprovecha +'&tblaloalto='+tblaloalto +'&tblaloancho='+tblaloancho + '&proveedor='+proveedor +'&label-Acab1='+ $("#label-Acab1").html() +
        '&label-Acab2='+ $("#label-Acab2").html() +'&label-Acab3='+ $("#label-Acab3").html() +'&label-Acab4='+ $("#label-Acab4").html() +'&label-Acab5='+ $("#label-Acab5").html() +'&label-Acab6='+ $("#label-Acab6").html() +'&titCantMat='+ $("#titCantMat").html() +'&tiempoproduccion='+ $("#tiempoproduccion").val();
        console.log(cadena);
        $.post("php/guardar.php",cadena,
            function(result)
            {
                if(result.data.length>0){               
                    $("#asignofolio").html("Se asigno al folio: <span style='color:red; font-size: 27px;'>"+result.data[0].folio+"</span>");
                    $("#dialogo_datosguardados").modal('open');
                    $("#foliob").val(result.data[0].folio);
                }
            },"json"
        );

	});

//--------------------------------------------------------------------------
//                  		ACTUALIZAR COTIZACION
//--------------------------------------------------------------------------	
$("#actualizar").click(function(){
	$.actualizar();	
});

//--------------------------------------------------------------------------
//                  				BOTON ABRIR
//--------------------------------------------------------------------------
	$("#modal-abrir").click(function(){
		limpiarDatos();
		
		$('#dialogabrir').modal('open');
	});

	$("#aceptarabrir").click(function(){
		$.abrir();
	});	

//--------------------------------------------------------------------------
//                  	BOTON IMPRIMIR ORDEN DE PRODUCCION
//--------------------------------------------------------------------------
	$("#modal-impordprod").click(function(){
		if( $("#foliob").val() != "" )
		{
			if( $("#ordprod").val() != "" )
			{
				$("#dialogo_imp_orden").modal('open');
			}
			else
			{
				$.ordenproduccion();				
			}
		}		
		else
		{
			alert("Guarda primero la cotización");
		}
	});

	$("#aceptarordprod").click(function(){
		$("#dialogo_imp_orden").modal('open');
	});

	$("#aceptarimporden").click(function(){
		$.actualizarordenproduccion();
	});

//--------------------------------------------------------------------------
//                  	BOTON IMPRIMIR ORDEN DE PRODUCCION
//--------------------------------------------------------------------------
	$("#modal-imprimir").click(function(){
		foliob = $("#foliob").val();
		window.open("pdf/cotizacion.php?foliob=" + foliob,'_blank');		
	});

//--------------------------------------------------------------------------
//                  				BOTON LIMPIAR
//--------------------------------------------------------------------------
	$("#modal-limpiar").click(function(){
		$("#dialogo_limpiar").modal('open');
	});

	$("#aceptarlimpiar").click(function(){
		window.location.href = "http://localhost/litoapps/cotizador/index.php";
	});

function limpiarDatos()
{

    $('textarea').val("");	
    	table.$('tr.selected').removeClass('selected');
    	$("#resPrecio").val("0");
    	$("#resCant").val("0");
    	$("#porTinta").val("0");
    	$("#manoObra").val("0");
    	$(".resacabados").val("0");
    	$(".resAdic").val("0");
    	$("#acabados").val("0");
    	$("#label-Acab1").html("Acabado1:");
    	$("#label-Acab2").html("Acabado2:");
    	$("#label-Acab3").html("Acabado3:");
    	$("#label-Acab4").html("Acabado4:");
    	$("#label-Acab5").html("Acabado5:");
    	$("#label-Acab6").html("Acabado6:");
    	$("#label-Adic1").html("Adicional1:");
    	$("#label-Adic2").html("Adicional2:");
    	$("#label-Adic3").html("Adicional3:");
    	$("#label-Adic4").html("Adicional4:");
    	$("#label-Adic5").html("Adicional5:");
    	$("#label-Adic6").html("Adicional6:");
    	$("select[class=acabados]").val("1"); 	
    	$("#resSubtotal").val("0");
    	$("#resMargen").val("0");
    	$("#resComision").val("0");
    	$("#porcientoMargen").val("30");
    	$("#porcientoComision").val("10");
    	$("#resPreUnit").val("0");
    	$("#resTotal").val("0");
    	$("#resTotal2").val("0");    	
    	$("#medidas1").html("");
    	$("#medidas2").html("");
    	$("#medidas3").html("");
    	$("#medidas4").html("");
    	$("#medidas5").html("");
    	$("#titMat").html("");
    	$("#titCantMat").html("");
    	//$("#0").prop("checked",true);
    	$("#resTinta").val("0"); 	
}



});