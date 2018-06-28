$(document).ready(function(){

if(window.location.pathname == '/litoapps/reprocesos/reprocesosCalidad.php')
{
  $("#repProd").removeClass("active");
  $("#repCali").addClass("active");
  $("#consRep").removeClass("active");
  $("#titulo").html("Reprocesos/Calidad");
} 

$('.button-collapse').sideNav();
	
	var orden, notas, amanual, aespecial, alito, almacen, cal, cli, entrega, lite, off, ope, prepre, 
	maqInterna, maqExterna, siste, venta, indi, nubera, buskr, iCotizaco, suma;

	$("#orden").change(function(){
		orden = $("#orden").val();
		$.post('php/getReprocesoCalidad.php', {orden:orden},
			function(result){
				if(result.data.length > 0)
				{
					$("#trabajo").val(result.data[0].nombreTrabajo).siblings().addClass("active");
					$("#cliente").val(result.data[0].nombreCliente).siblings().addClass("active");
					$("#fRegistro").val(result.data[0].fechaOrden).siblings().addClass("active");
					$("#cantidad").val(result.data[0].cantidad).siblings().addClass("active");
					$("#depto").val(result.data[0].departamento).siblings().addClass("active");
					$("#importCot").val(result.data[0].importe).siblings().addClass("active"); iCotizaco = $("#importCot").val();
					$("#notas").val(result.data[0].nota).siblings().addClass("active"); notas = $("#notas").val();
					$("#a_manual").val(result.data[0].acabManual).siblings().addClass("active"); amanual = $("#a_manual").val();
					$("#acab_especial").val(result.data[0].acabEsp).siblings().addClass("active"); aespecial = $("#acab_especial").val();
					$("#acab_lito").val(result.data[0].acabLito).siblings().addClass("active"); alito = $("#acab_lito").val();
					$("#almacen_").val(result.data[0].almacen).siblings().addClass("active"); almacen = $("#almacen_").val();
					$("#calidad").val(result.data[0].calidad).siblings().addClass("active"); cal = $("#calidad").val();
					$("#cliente_").val(result.data[0].cliente).siblings().addClass("active"); cli = $("#cliente_").val();
					$("#entregas_").val(result.data[0].entregas).siblings().addClass("active"); entrega = $("#entregas_").val();
					$("#literatura_vw").val(result.data[0].litVw).siblings().addClass("active"); lite = $("#literatura_vw").val();
					$("#offset").val(result.data[0].offset).siblings().addClass("active"); off = $("#offset").val();
					$("#operaciones").val(result.data[0].operaciones).siblings().addClass("active"); ope = $("#operaciones").val(); 
					$("#preprensa").val(result.data[0].preprensa).siblings().addClass("active"); prepre = $("#preprensa").val();
					$("#maquila_interna").val(result.data[0].maqInt).siblings().addClass("active"); maqInterna = $("#maquila_interna").val();
					$("#externa").val(result.data[0].maqExt).siblings().addClass("active"); maqExterna = $("#externa").val();
					$("#sistemas").val(result.data[0].sistemas).siblings().addClass("active"); siste = $("#sistemas").val();
					$("#ventas").val(result.data[0].ventas).siblings().addClass("active"); venta = $("#ventas").val();
					$("#indigo").val(result.data[0].indigo).siblings().addClass("active"); indi = $("#indigo").val();
					$("#nuberas").val(result.data[0].nuberas).siblings().addClass("active"); nubera = $("#nuberas").val();
					$("#buskro").val(result.data[0].buskro).siblings().addClass("active"); buskr = $("#buskro").val();					
				}
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
	if(suma == iCotizaco) 
	{		
		$("#estatus").html("<p style='color:green'>$ " + suma + " Correcto</p>");												
	} else 
	{
		$("#estatus").html("<p style='color:red'>$ " + suma + " Incorrecto</p>");			
	} 				
			},'json');
});

$("#notas").change(function(){
	notas = $("#notas").val();
});
$("#a_manual").change(function(){
	amanual = $("#a_manual").val();
});
$("#acab_especial").change(function(){
	aespecial = $("#acab_especial").val();
});
$("#acab_lito").change(function(){
	alito = $("#acab_lito").val();
});
$("#almacen_").change(function(){
	almacen = $("#almacen_").val();
});
$("#calidad").change(function(){
	cal = $("#calidad").val();
});
$("#cliente_").change(function(){
	cli = $("#cliente_").val();
});
$("#entregas_").change(function(){
	entrega = $("#entregas_").val();
});
$("#literatura_vw").change(function(){
	lite = $("#literatura_vw").val();
});
$("#offset").change(function(){
	off = $("#offset").val();
});
$("#operaciones").change(function(){
	ope = $("#operaciones").val();
});
$("#preprensa").change(function(){
	prepre = $("#preprensa").val();
});
$("#maquila_interna").change(function(){
	maqInterna = $("#maquila_interna").val();
});
$("#externa").change(function(){
	maqExterna = $("#externa").val();
});
$("#sistemas").change(function(){
	siste = $("#sistemas").val();
});
$("#ventas").change(function(){
	venta = $("#ventas").val();
});
$("#indigo").change(function(){
	indi = $("#indigo").val();
});
$("#nuberas").change(function(){
	nubera = $("#nuberas").val();		
});
$("#buskro").change(function(){
	buskr = $("#buskro").val();
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
	if(suma == iCotizaco) 
	{		
		$("#estatus").html("<p style='color:green'>$ " + suma + " Correcto</p>");												
	} else 
	{
		$("#estatus").html("<p style='color:red'>$ " + suma + " Incorrecto</p>");			
	} 		
 
      
});

$("#guardar").click(function(){
if(suma == iCotizaco){
	$.post('php/updateReprocesoCalidad.php', {
		orden:orden, 
		notas:notas, 
		amanual:amanual, 
		aespecial:aespecial, 
		alito:alito, 
		almacen:almacen, 
		cal:cal, 
		cli:cli, 
		entrega:entrega, 
		lite:lite, 
		off:off, 
		ope:ope, 
		prepre:prepre, 
		maqInterna:maqInterna, 
		maqExterna:maqExterna, 
		siste:siste, 
		venta:venta, 
		indi:indi, 
		nubera:nubera, 
		buskr:buskr},
		function(form){
			if(form.validation == 'true')
			{			
				Materialize.toast("Se registro", 800, 'green darken-4', function(){
					limpiarDatos();
				});
			} else {				
				Materialize.toast("Algo salio mal", 800, 'red darken-4',function(){
					return false;
				});				
			}
		},'json');
} else {
	Materialize.toast('Las cantidades no coinciden', 800, 'red darken-4',function(){
		return false;
	});
}
});

$("#limpiar").click(function(){
	limpiarDatos();
});

//--------------- FUNCIONES -----------------

function limpiarDatos()
{
	$("#orden").val("");
	$("#trabajo").val("");
	$("#cliente").val("");
	$("#fRegistro").val("");
	$("#cantidad").val("");
	$("#depto").val("");
	$("#importCot").val("");
	$("#notas").val("");
	$("#a_manual").val("");
	$("#acab_especial").val("");
	$("#acab_lito").val("");
	$("#almacen_").val("");
	$("#calidad").val("");
	$("#cliente_").val("");
	$("#entregas_").val("");
	$("#literatura_vw").val("");
	$("#offset").val("");
	$("#operaciones").val(""); 
	$("#preprensa").val("");
	$("#maquila_interna").val("");
	$("#externa").val("");
	$("#sistemas").val("");
	$("#ventas").val("");
	$("#indigo").val("");
	$("#nuberas").val("");
	$("#buskro").val("");
	$("#estatus").html("");	
}

});