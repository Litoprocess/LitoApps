$(document).ready(function(){
 	var table = $("#consultaEmpleados").DataTable({
      	"searching": true,
		"scrollY": '70vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging": false,		
		"order": [[4, "desc" ]],
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
      "url": "php/registrosEmpleados.php"
    },
    "columns":
    [  
    {"data":"ClaveID"},       
    {"data":"Nombre",width: "50%"},
    {"data":"Edad"},
    {"data":"Genero"},
    {"data":"No_Imss"},        
    {"data":"ID_proveedor"}
    ],
    "columnDefs": [
    {"className": "dt-center", "targets": [0,2,3,4,5] }
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

	$.post("php/proveedores.php",
	 	function(result)
	 	{
	 		for(var i=0;i<result.data.length;i++)
	 		{	
	 			$('select[name="proveedor"]>option').removeAttr("selected");
				//$('select[name="proveedor"]>option[value="0"]').attr("selected", true);
	 			$("#proveedor").append("<option selected value='"+result.data[i].Clave+"'>"+result.data[i].Clave+"--"+result.data[i].Nombre+"</option>");
	 		}
	 	},'json'
	);

	$("input[type=text]").change(function(){
		$("#claveG").html("No.Asignación");
	});

$("#registroEmpleados").submit(function(){
	var datosEmpleado=$(this).serialize();

	var value = $("#imss").val().length;
	if(value>11)
	{
		$("#errorImss").html("<span style='color: red;'>El campo IMSS debe de ser máximo de 11 dígitos</span>");		
	}
	else
	{
		$("#errorImss").html("");
		
		$.post("php/registrarEmpleado.php",datosEmpleado,
			function(data)
			{
				$("#claveG").html("Clave: "+data.clave);
				Materialize.toast("Se guardo", 500, 'green darken-4');
				//limpiar();
				table.ajax.reload();
			},'json'
		);
	}
	return false;
});	

$("#cancelaEmpleado").click(function(){
	limpiar();
});

function limpiar()
{
	$("input[type=text]").val("");
	$('select[name="genero"]>option').removeAttr("selected");
	$('select[name="genero"]>option[value="ELIGE"]').attr("selected", true);	
	$("#claveG").html("No.Asignación");
}	
});