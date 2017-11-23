$(document).ready(function(){

  $('#tblBitacora').DataTable(
  { 
    dom: 'Bfrtip',
    buttons: [
    'excel'
    ],
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
        "url":"php/obtBitacora.php"
      },      
      "columns":
      [          
      {"data":"id"},
      {"data":"usuario"},
      {"data":"guia"},
      {"data":"sku"},
      {"data":"fecha"},
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
var table = $('#tblBitacora').DataTable();

    $('#tblBitacora tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

});