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

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Buscar Empleado</h4>
      <p>Ingresa el ID del Empleado</p>
        <div class="row">
          <div class="input-field col s3">
            <input id="idempleado" name="idempleado" type="number" class="validate">
            <label for="idempleado">ID empleado</label>
          </div>                    
        </div>
        <div class="row">
          <span id="nombreempleado" name="nombreempleado"></span>
          <span id="altafecha" name="altafecha"></span>
        </div>
    </div>
    <div class="modal-footer">
      <a id="btn-cancelar" class="waves-effect waves-green btn-flat">Cancelar</a>
      <a id="btn-aceptar" class="waves-effect waves-green btn-flat indigo darken-4 white-text">Aceptar</a>
    </div>
  </div>

<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script>
$(document).ready(function(){

var data1 = "", Id1 = 0, altaFecha = "";

$('.modal').modal();

  var table = $('#tblSolicitudes').DataTable(
  {             
    ajax:{
      url: 'php/obtSolicitudes.php'
    },              
    "columns":
    [          
    {data : "Id"},
    {data : "Solicitante"},
    {data : "Departamento"},
    {data : "Puesto"},
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
    "searching": true,
    "scrollY":        '70vh',
    "scrollX": true,
    "scrollCollapse": true,
    "paging":         false,
    "responsive": true
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
      data1 = table.row( $(this).parents("tr") ).data();
      Id1 = data1.Id

      if( $("#rangoSueldoDe_" + Id1).val() != "" && $("#rangoSueldoHasta_" + Id1).val() != "" )
      {
        $('#modal1').modal('open');
      }
      else
      {
        Materialize.toast('Completa los campos', 1200,'orange darken-4');
        $("#estatus"+ Id1).prop("checked",false);
      }     
    }
  }); 

  $("#idempleado").change(function(){
    var idempleado = $("#idempleado").val();
    $.post('php/consultarEmpleado.php',{idempleado:idempleado},
      function(result){
        if(result.validacion == true)
        {
          altaFecha = result.data[0].fechaAlta;
          $("#nombreempleado").html("<b>Nombre del Empleado:</b> " + result.data[0].nombre + " " + result.data[0].apellidoPaterno + " " + result.data[0].apellidoMaterno);
          $("#altafecha").html("<br> <b>Fecha de Alta:</b> " + result.data[0].fechaAlta);
        }
      },'json'
    );
  });

  $("#btn-aceptar").click(function(){
    var estatus = 'FINALIZADO';
    $.post('php/actualizarRegistro.php', {estatus: estatus, Id1:Id1, altaFecha:altaFecha},
      function(result)
      {
        if(result.validacion == true)
        {
          Materialize.toast('Se actualizo', 1200,'green darken-4');
          table.ajax.reload();
          $('#modal1').modal('close');
          data1 = "";
          Id1 = 0; 
          altaFecha = "";
        }
        else
        {
          Materialize.toast('Error', 1200,'Red darken-4');
          table.ajax.reload();
          $('#modal1').modal('close');
          data1 = "";
          Id1 = 0; 
          altaFecha = ""; 
        }
      },'json'
    );
  });

});
</script>
</body>
</html>