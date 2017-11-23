$(document).ready(function() 
{
  var data,orden,cliente,cantidad,aplica;
  $(".button-collapse").sideNav();  
  

  //LLenar la tabla con la BD
  $('#tblNoAplica').DataTable(
  {           
      "searching": true,
      "scrollY":        '56vh',
      "scrollCollapse": true,
      "paging":         false,
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