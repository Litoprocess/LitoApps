$(document).ready(function() 
{

if(window.location.pathname == '/litoapps/reprocesos/consultaReprocesos.php')
{
  $("#repProd").removeClass("active");
  $("#repCali").removeClass("active");
  $("#consRep").addClass("active");
  $("#titulo").html("Reprocesos/Consulta reprocesos");
} 

  $('.button-collapse').sideNav();  
  //LLenar la tabla con la BD
  $('#tblConsultaReproceso').DataTable(
  {           
    "searching": true,
    "scrollY":        '62vh',
    "scrollCollapse": true,
    "paging":         false,
      //"destroy": true,
      "responsive": true,
      "order": [],      
      "columnDefs": 
      [
      {"className": "dt-body-center", "targets": [4,5,6]},
      {"className": "dt-head-center", "targets": "_all"},
      { "orderable": false, "targets": "_all" }
      ],
      "ajax":
      {
        "method":"POST",
        "url":"php/getConsultaReprocesos.php"
      },      
      "columns":
      [          
      {"data":"orden"},
      {"data":"departamento"},
      {"data":"trabajo"},
      {"data":"cliente"},
      {"data":"fechaOrden"},
      {"data":"cantidad"},
      {"data":"importe"}
      ],        
      "language": 
      {
        zeroRecords: "No hay registros",
        search: "Buscar:",
      }        
    }); 
  var table = $('#tblConsultaReproceso').DataTable();
});