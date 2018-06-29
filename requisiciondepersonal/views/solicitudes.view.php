<?php require 'views/head.php'; ?>
<style>
  input{
  text-transform: uppercase;  
  }  
</style>
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
            <th>Candidato Interno(Opcional)</th>
						<th>Estatus</th> 
            <th>Finalizar</th>
						<th>Fecha_Alta</th>    
            <th>Imprimir</th>     
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
          <div class="col s12">
            <p>
              <input type="checkbox" id="externo" />
              <label for="externo">Empleado Externo</label>
            </p>            
          </div>
          <div class="input-field col s3">
            <input id="idempleado" name="idempleado" type="number" class="validate">
            <label for="idempleado">ID empleado</label>
          </div> 
          <div id="oculto1" class="input-field col s6" style="display:none;">
            <input id="extnombre" name="extnombre" type="text" class="validate">
            <label for="extnombre">Nombre Empleado</label>
          </div>     
          <div id="oculto2" class="input-field col s3" style="display:none;">
            <input id="extalta" name="extalta" type="date" class="validate">
            <label for="extalta">Fecha de Alta</label>
          </div>                                    
        </div>
        <div id="oculto3" class="row">
          <span><b>Nombre del Empleado:</b> </span><span id="nombreempleado" name="nombreempleado"></span><br>
          <span><b>Fecha de Alta:</b> </span><span id="altafecha" name="altafecha"></span>
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

var data1 = "", Id1 = 0, altaFecha = "", existe = 0;

$('.modal').modal({
  dismissible: false
});

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
    {data : "Candidato"},
    {data : "Estatus"},
    {data : "Finalizar"},
    {data : "FechaAlta"},
    {defaultContent : "<a class='waves-effect waves-teal btn-flat btn-imprimir'><i class='material-icons'>print</i></a>"},
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

  $("#tblSolicitudes tbody").on("change","input[type='text'].in_candidato", function()
  {
    var x = $(this).attr("id");

    var data = table.row( $(this).parents("tr") ).data();
    var Id = data.Id
    
    var candidatoInterno = $("#"+x).val();

    $.post('php/actualizarRangoSueldo.php', {candidatoInterno: candidatoInterno, Id:Id},
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

  $("#externo").click(function(){
    if($(this).is(':checked')) 
    {
      $("#idempleado").val("9999").siblings().addClass("active");
      $("#idempleado").prop("readonly",true);
      $("#oculto1").show();
      $("#oculto2").show();
      $("#oculto3").hide();
    }
    else
    {
      $("#idempleado").val("");
      $("#idempleado").prop("readonly",false);
      $("#oculto1").hide();
      $("#oculto2").hide();
      $("#oculto3").show();
    }
  });

  $("#idempleado").keyup(function(){    
    $.post('php/consultarEmpleado.php',{idempleado:$("#idempleado").val()},
      function(result){
        if(result.validacion == true)
        {
          altaFecha = result.data[0].fechaAlta;
          $("#nombreempleado").html(result.data[0].nombre + " " + result.data[0].apellidoPaterno + " " + result.data[0].apellidoMaterno);
          $("#altafecha").html(result.data[0].fechaAlta);
          existe = 1;
        }
        else
        {
          $("#nombreempleado").html("No existe");
          $("#altafecha").html("No existe");
          existe = 0;        
        }
      },'json'
    );
  });

  $("#btn-aceptar").click(function(){
    if($("#externo").is(':checked')) 
    {    
        $.post('php/actualizarRegistro.php', {estatus: "FINALIZADO", Id1:Id1, idEmpleado:$("#idempleado").val(), altaFecha:$("#extalta").val(), nombreEmpleado: $("#extnombre").val()},
          function(result)
          {
            if(result.validacion == true)
            {
              Materialize.toast('Se actualizo', 1200,'green darken-4');          
              limpiar();
            }
            else
            {
              Materialize.toast('Algo salio mal', 1200,'red darken-4');
            }
          },'json'
        );
    }
    else
    {
      if($("#idempleado").val() !== "" && existe != 0)
      {
        $.post('php/actualizarRegistro.php', {estatus: "FINALIZADO", Id1:Id1, idEmpleado:$("#idempleado").val(), altaFecha:altaFecha, nombreEmpleado: $("#nombreempleado").text()},
          function(result)
          {
            if(result.validacion == true)
            {
              Materialize.toast('Se actualizo', 1200,'green darken-4');          
              limpiar();
            }
            else
            {
              Materialize.toast('Algo salio mal', 1200,'red darken-4');
            }
          },'json'
        );
      }
      else
      {
        Materialize.toast('Completa los campos', 1200,'orange darken-4');
      }      
    }
  });

  $("#btn-cancelar").click(function(){
    limpiar();
  });

 $("#tblSolicitudes tbody").on("click", "a.btn-imprimir", function () {

  var datos = table.row($(this).parents("tr")).data();
  id = datos.Id;
  window.open('pdf/Solicitud.php?id='+id, '_blank');

  });

  function limpiar()
  {
    $('input[type=number]').not('[readonly]').val(""); 
    $("#nombreempleado") .html("");
    $("#altafecha").html("");
    table.ajax.reload();
    $('#modal1').modal('close');
    data1 = "";
    Id1 = 0; 
    altaFecha = ""; 
    existe = 0; 
  }

});

</script>
</body>
</html>