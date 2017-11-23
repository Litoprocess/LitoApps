$(document).ready(function(){

  $('#tblBase').DataTable(
  { 
    "searching": true,
    "responsive": true,
    "scrollX": true,
    "columnDefs": 
    [
      {"className": "dt-head-center", "targets": "_all"}
      ],
      "ajax":
      {
        "method":"POST",
        "url":"php/obtBase.php"
      },      
      "columns":
      [          
      {"data":"guia"},
      {"data":"sku"}
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
var table = $('#tblBase').DataTable();

    $('#tblBase tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

});