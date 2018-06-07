$(document).ready(function(){

if(window.location.pathname == '/litoapps/muestreoBD/bitacora.php')
{
  $("#bitacora").addClass("active");
  $("#lcp").removeClass("active");
  $("#lcn").removeClass("active");
}   

$(".button-collapse").sideNav();

  var revision, personal, negocios;
  $('select').material_select();

  negocios = $('#negocios').DataTable({

    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Exportar a Excel'
    },
    ],
    "searching": true,
    "responsive": true,
    "scrollX": true,
    "ajax": {
      "url": "php/obtBitacoraLcn.php"
    },

    "language": {
      search:      "Buscar:",
      loadingRecords: "Cargando datos", 
      zeroRecords: "No hay registros",
      paginate: {
        first:      "Primero",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "Último"
      },    
    }
  });

  personal = $('#personal').DataTable({

    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Exportar a Excel'

    },
    ],
    "searching": true,
    "responsive": true,
    "scrollX": true,
    "ajax": {
      "url": "php/obtBitacoraLcp.php"
    },

    "language": {
      search:      "Buscar:",
      loadingRecords: "Cargando datos", 
      zeroRecords: "No hay registros",
      paginate: {
        first:      "Primero",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "Último"
      },    
    }
  });

  $("select[id=revision]").on("change", function(){
    revision = $("select[id=revision]").val();
    if(revision == "1194"){
      $("#bitacora-lcpersonal").hide();
      $("#bitacora-lcnegocios").show();
      negocios.ajax.reload();
    } else if(revision == "1193") {
      $("#bitacora-lcnegocios").hide();
      $("#bitacora-lcpersonal").show();
      personal.ajax.reload();
    }
  });



});




