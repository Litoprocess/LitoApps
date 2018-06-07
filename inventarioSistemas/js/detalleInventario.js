$(document).ready(function(){

if(window.location.pathname == '/litoapps/inventarioSistemas/detalle.php')
{
  $("#inventario").removeClass("active");
  $("#detalle").addClass("active");
}  	

$(".button-collapse").sideNav();

	var id,usuario;

	var table = $('#tblDetalle').DataTable(
	{           
      "ajax":
      {
      	"method":"POST",
      	"url":"php/obtInventario.php"
      },
      	"searching": true,
		"scrollY":        '70vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging":         false,
		//"responsive": true,
		//"autoWidth": false,
		//"order": [[3, "desc" ]], 
    "autoWidth": false,
    "fixedHeader": {
        "header": false,
        "footer": false
    },
    "columnDefs": [
      { "width": "5px", "targets": [0,1] },
      { "width": "40px", "targets": [34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,
      								81,82,83,84,85] },
      { "width": "100px", "targets": [2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100] },
      {"width":"150px", "targets": [3,33]},
    ],		    
      "columns":
      [          
		{"data":"idequipo"},
      	{"data":"#"},				
		{"data":"usuario"},
		{"data":"correo"},
		{"data":"departamento"},
		{"data":"puesto"},
		{"data":"tipoequippo"},
		{"data":"especpu"},
		{"data":"seriecpu"},
		{"data":"espemonitor"},
		{"data":"seriemonitor"},
		{"data":"espeteclado"},
		{"data":"serieteclado"},
		{"data":"esperaton"},
		{"data":"serieraton"},
		{"data":"espebocinas"},
		{"data":"seriebocinas"},
		{"data":"espelector"},
		{"data":"serielector"},
		{"data":"descimpresion"},
		{"data":"ipimpresion"},
		{"data":"descimpresion2"},
		{"data":"ipimpresion2"},
		{"data":"macethernet"},
		{"data":"ipethernet"},
		{"data":"macwifi"},
		{"data":"ipwifi"},
		{"data":"sistope"},
		{"data":"sistopelicencia"},
		{"data":"sistopeobs"},
		{"data":"sistopeinternet"},
		{"data":"versionoffice"},
		{"data":"ofilicencia"},
		{"data":"ofiobserva"},
		{"data":"insword"},
		{"data":"insexcel"},
		{"data":"inspower"},
		{"data":"insoutlook"},
		{"data":"insvisio"},
		{"data":"insproyect"},
		{"data":"clicorreo"},
		{"data":"reqfirma"},
		{"data":"insintelisis"},
		{"data":"insapontar"},
		{"data":"insjobtrack"},
		{"data":"insjtmonitor"},
		{"data":"insplanner"},
		{"data":"printware"},
		{"data":"inscrece"},
		{"data":"inschrome"},
		{"data":"insexplorer"},
		{"data":"insfirefox"},
		{"data":"inssafari"},
		{"data":"insdbemetrics"},
		{"data":"insdbeintelisis"},
		{"data":"insreader"},
		{"data":"insacrpro"},
		{"data":"insphotoshop"},
		{"data":"insilustrator"},
		{"data":"insindesign"},
		{"data":"insdream"},
		{"data":"insstarbucks"},
		{"data":"inskrispy"},
		{"data":"insdbxtra"},
		{"data":"inssaam"},
		{"data":"insdots"},
		{"data":"insmesacontrol"},
		{"data":"insidashboards"},
		{"data":"inscotizador"},
		{"data":"otroapp1"},
		{"data":"insotroapp1"},
		{"data":"otroapp2"},
		{"data":"insotroapp2"},
		{"data":"inspdfeditor"},
		{"data":"insitunes"},
		{"data":"inskies"},
		{"data":"inslabmatrixs"},
		{"data":"antivirus"},
		{"data":"insantivirus"},
		{"data":"escaner"},
		{"data":"insescaner"},
		{"data":"herrotro1"},
		{"data":"insotroherr1"},
		{"data":"herrotro2"},
		{"data":"insotroherr2"},
		{"data":"herrotro3"},
		{"data":"insotroherr3"},
		{"data":"unidad1"},
		{"data":"ruta1"},
		{"data":"unidad2"},
		{"data":"ruta2"},
		{"data":"unidad3"},
		{"data":"ruta3"},
		{"data":"unidad4"},
		{"data":"ruta4"},
		{"data":"unidad5"},
		{"data":"ruta5"},
		{"data":"unidad6"},
		{"data":"ruta6"},
		{"data":"nstelefono"},
		{"data":"extension"}
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

$('#container').css( 'display', 'block' );
table.columns.adjust().draw();

    $('#tblDetalle tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }            
    } );


});