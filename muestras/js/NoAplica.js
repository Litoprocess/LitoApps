$(document).ready(function() 
{

if(window.location.pathname == '/litoapps/muestras/noaplica.php')
{
  $('#noaplica').addClass('active');
  $('#ordenes').removeClass('active');
  $('#nocumplido').removeClass('active');
  $('#cumplido').removeClass('active');
}

  var data,orden,cliente,cantidad,aplica;
  $(".button-collapse").sideNav();  

  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();

  var output =  (day<10 ? '0' : '') + day + '-' +
  (month<10 ? '0' : '') + month + '-' +
  d.getFullYear();
  

  //LLenar la tabla con la BD
  $('#tblNoAplica').DataTable(
  {           
      "searching": true,
      "scrollY":        '59vh',
      "scrollCollapse": true,
      "paging":         false,
        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'excelHtml5',
          title: 'Control_de_Muestras_NoAplica_' + output 
        },
        ],      
      "ajax":
      {
        "method":"POST",
        "url":"php/ObtNoAplica.php"
      },
      "responsive": true,      
      "columnDefs": 
      [
      {"className": "dt-body-center", "targets": [2,3,4,5]},
      {"className": "dt-head-center", "targets": "_all"}
      ],
      "columns":
      [          
      {"data":"numorden"},
      {"data":"trabajo"},
      {"data":"cantentregar"},
      {"data":"cantentregada"},
      {"data":"cantmuestras"},
      {"data":"estatus"}
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
  var table = $('#tblNoAplica').DataTable();
});