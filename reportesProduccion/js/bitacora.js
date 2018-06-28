$(document).ready(function(){

  if(window.location.pathname == '/litoapps/reportesProduccion/bitacora.php')
  {
    $("#bitacora").addClass("active");
    $("#reportes").removeClass("active");
  } 

  $(".button-collapse").sideNav();

  bitacoraConsultas = $('#bitacoraConsultas').DataTable({
      "searching": true,
      "scrollY":        '59vh',
      "scrollCollapse": true,
      "paging":         false,
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Exportar a Excel'

    }
    ],
    "ajax": {
      "method":"POST",
      "url": "php/obtBitacora.php"
    },
    "columns":
    [          
    {"data":"fecha"},
    {"data":"usuario"},
    {"data":"tipo"},
    {"data":"numoperador"},
    {"data":"maquina"},
    {"data":"desde"},
    {"data":"hasta"}
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

});




