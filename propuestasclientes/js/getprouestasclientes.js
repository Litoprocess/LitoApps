$(document).ready(function(){

  /// MODAL agregar nueva popuesta///


  $('.tap-target').tapTarget('open');

  function welcome(){
    $('.tap-target').tapTarget('close');
  }

  //// llamar al modal


$( "#btn-AddProp" ).click(function() {
  $("#clave_cliente").focus();
   $('#clave_cliente').attr('readonly', false); 
 
 $('#fAplicacion').attr('readonly', false);
;
 $('#propuesta_titulo').attr('readonly', false);

$('#notas').attr('readonly', false);


 limpiarDatos();

});

/////

if(window.location.pathname == '/litoapps/reprocesos/propuestasclientes.php')
{
 
  $("#titulo").html("Clientes/Propuestas");
} 

$('.button-collapse').sideNav();	
////////////////////// PERMISOS//////////////

var us=$('#usuario').html();
//console.log(us);

if (us==3)
{
	console.log("entre")
	$('#clave_cliente').attr('readonly', true); 
		$('#fAplicacion').attr('readonly', true); 
		$('#notas').attr('readonly', true); 
}



////////////////////////////// T A B L A >>>>>>>



 var table =$('#tblConsultaPropuestas').DataTable(
  {           
  	"select":true,
    "searching": true,
    "scrollY":        '304px',
    "scrollCollapse": true,
    "paging":         false,
      //"destroy": true,
    
      "columnDefs": 
      [
      {targets: [5,6],
      	visible: false,
      	searcheable: false},
      {"className": "dt-body-center", "targets": [0,1,2,3]},
      {"className": "dt-head-center", "targets": "_all"},
      { "orderable": false, "targets": "_all" }
      ],
      "ajax":
      {
        "method":"POST",
        "url":"php/getConsultaPropuestas.php"
      },      
      columns:
      [          
      {"data":"id_propuesta"},
      {"data":"clave_cliente"},
      {"data":"fRegistro"},
      {"data":"fAplicacion"},
      {"data":"titulo"},
      {"data":"propuesta"},
      {"data":"cliente"}
      ],        
      responsive: false,
      "order": [],  
       
      "language": 
      {
       sLoadingRecords: "Cargando...",        
      	zeroReords: "No hay registros",
      	sInfo: "_END_ de _TOTAL_ registros",
      	sInfoEmpty: "0 de 0 registros",
      	sInfoFiltered: "(de _MAX_ registros en total)",                       
      	search: "Buscar:",
      	lengthMenu: "",
      
      }        ,

      paginate: {
      		previous:"Anterior",
      		next: "Siguiente"
      	}
} );
///////////////// SELECT DE LA DATATABLE///////////
    $('#tblConsultaPropuestas tbody').on( 'click', 'tr', function () {
//console.log( "entro" );
if ( $(this).hasClass('selected') ) {
                  $(this).removeClass('selected');
               }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }     
var custid = (table.row(this).data()); 
var id =$(this).children(":first").text();
 console.log(custid.fRegistro);
 var fReg= fecha(custid.fRegistro);
 console.log(fReg);
 var fApl=fecha(custid.fAplicacion);
 $("#clave_cliente").val(custid.clave_cliente).siblings().addClass("active");// me da el valor de la primera celda de la fila
 $('#clave_cliente').attr('readonly', true); 
  $("#fRegistro").val(fReg);
 $('#fRegistro').attr('readonly', true);
 $("#fAplicacion").val(fApl);
 $('#fAplicacion').attr('readonly', true);
 $("#propuesta_titulo").val(custid.titulo).siblings().addClass("active");
 $('#propuesta_titulo').attr('readonly', true);
$("#notas").val(custid.propuesta).siblings().addClass("active");
$('#notas').attr('readonly', true);
$("#cliente").val(custid.cliente).siblings().addClass("active");
$('#cliente').attr('readonly', true);

 

 } );

/////////////////////// OBTENER EL NOMBRE DE CLIENTE////////////////
	var clave_cliente,fRegistro,fAplicacion,propuesta,table ;

	$("#clave_cliente").change(function(){
		clave_cliente = $("#clave_cliente").val();
		$.post('php/getpropuestasclietes.php', {clave_cliente:clave_cliente},
			function(result){
				if(result.data.length>0)
				{
					Materialize.toast('Consulta exitosa', 800, 'green darken-4', function(){
					
				
						$("#cliente").val(result.data[0].nombreCliente).siblings().addClass("active");
						
					});
				} else {
					Materialize.toast("El cliente no existe", 1200, 'red darken-4');
				}

			},'json');
	});

  ///////////////////// FUNCIONES//////////////////////////////////
$("#guardar").click(function(){

		clave_cliente = $("#clave_cliente").val();
		cliente= $("#cliente").val();
		fRegistro = $("#fRegistro").val();
		fAplicacion = $("#fAplicacion").val();	
		propuesta = $("#notas").val();
		propuesta_titulo = $("#propuesta_titulo").val();


		$.post('php/updatepropuestasclientese.php', {clave_cliente:clave_cliente,cliente:cliente, fRegistro:fRegistro, fAplicacion:fAplicacion, propuesta:propuesta,propuesta_titulo:propuesta_titulo},
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
function fecha(fecha)
{
var date= fecha;
var d=new Date(date.split("/").reverse().join("-"));
var dd=d.getDate()+1;
var mm=d.getMonth()+1;
var yy=d.getFullYear();
if (mm < 10) 
        mm = "0" + mm;
    if (dd < 10) 
        dd = "0" + dd;
var newdate=yy+"-"+mm+"-"+dd;
return newdate;
//console.log(newdate);
}

var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;

function limpiarDatos()
{
	$("#clave_cliente").val("");
	$("#cliente").val("");
	$("#fRegistro").val(today);
	$("#fAplicacion").val(today);
	$("#notas").val("");	
  $("#propuesta_titulo").val("");  
};


});
	