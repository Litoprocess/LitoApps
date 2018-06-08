<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
		<div class="col s12">
			<table id="tblSolicitudes" class="hover compact row-border" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Solicitante</th>
						<th>Departamento</th>
						<th>Puesto</th>                   
						<th>Sueldo_De$</th>
						<th>Sueldo_Hasta$</th>
						<th>Estatus</th> 
            <th>Finalizar</th>
						<th>Fecha_Alta</th>         
					</tr>
				</thead>
				<tbody>
					<!--Registrs desde BD-->    
				</tbody>
			</table>				
		</div>		
	</div> 
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script>
$(document).ready(function(){

  var table = $('#tblSolicitudes').DataTable(
  {             
    ajax:{
      url: 'php/obtSolicitudes.php'
    },  
    /*dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excelHtml5',
      title: 'ReporteOperador_' + output 
    },
    ],*/                 
    "columns":
    [          
    {data : "Id"},
    {data : "Solicitante"},
    {data : "Departamento"},
    {data : "Puesto"},
    //{data : "KeyProceso"},
    {data : "SueldoDe"},
    {data : "SueldoHasta"},
    {data : "Estatus"},
    {data : "Finalizar"},
    {data : "FechaAlta"}
    ],     
    "language": 
    {    
      zeroRecords: "No hay registros",
      sInfo: "_END_ de _TOTAL_ registros",
      sInfoEmpty: "0 de 0 registros",
      sInfoFiltered: "(de _MAX_ registros en total)",                       
      search: "Buscar:"
    },
    "searching": false,
    "scrollY":        '35vh',
    "scrollX": true,
    "scrollCollapse": true,
    "paging":         false,
    "responsive": true,
    "order": [[ 7, "asc" ]]       
  }); 	

  $("#tblSolicitudes tbody").on("change","input[type='text'].in_rangoSueldoDe", function()
  { 
    var x = $(this).attr("id");

    var data = table.row( $(this).parents("tr") ).data();
    var Id = data.Id

    var sueldoDe = $("#"+x).val();

    $.post('php/actualizarRangoSueldo.php', {sueldoDe: sueldoDe, Id:Id},
      function(result)
      {

        if(result.validacion == true)
        {
          Materialize.toast('Se actualizo', 1200,'green darken-4');
          table.ajax.reload();
        }
        else
        {
          Materialize.toast('Error', 1200,'Red darken-4');
          table.ajax.reload();              
        }

      },'json'
    );     
  }); 

  $("#tblSolicitudes tbody").on("change","input[type='text'].in_rangoSueldoHasta", function()
  {
    var x = $(this).attr("id");

    var data = table.row( $(this).parents("tr") ).data();
    var Id = data.Id
    
    var sueldoHasta = $("#"+x).val();

    $.post('php/actualizarRangoSueldo.php', {sueldoHasta: sueldoHasta, Id:Id},
      function(result)
      {

        if(result.validacion == true)
        {
          Materialize.toast('Se actualizo', 1200,'green darken-4');
          table.ajax.reload();
        }
        else
        {
          Materialize.toast('Error', 1200,'Red darken-4');
          table.ajax.reload();              
        }

      },'json'
    );     
  });

  $("#tblSolicitudes tbody").on("click","input[type='checkbox'].cb_estatus", function()
  {
    if(this.checked)
    {
      var x = $(this).attr("id");

      var data = table.row( $(this).parents("tr") ).data();
      var Id = data.Id
      var estatus = 'FINALIZADO';
      
      //var estatus = $("#"+x).val();

      $.post('php/actualizarEstatus.php', {estatus: estatus, Id:Id},
        function(result)
        {

          if(result.validacion == true)
          {
            Materialize.toast('Se actualizo', 1200,'green darken-4');
            table.ajax.reload();
          }
          else
          {
            Materialize.toast('Error', 1200,'Red darken-4');
            table.ajax.reload();              
          }

        },'json'
      );    
    }
  });  

});
</script>
</body>
</html>