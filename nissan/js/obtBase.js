$(document).ready(function(){

if(window.location.pathname == '/litoapps/nissan/base.php')
{
  $("#escaner").removeClass("active");
  $("#base").addClass("active");
  $("#bitacora").removeClass("active");
}   

  $(".button-collapse").sideNav(); 

  var formData, ruta;

  $('#tblBase').DataTable(
  { 
    "searching": true,
    "responsive": true,
    "scrollX": true,
    "scrollY": '48vh',
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
    });

$("input[name='file']").change(function(){
      formData = new FormData($("#frmSubirBase")[0]);
      ruta = "php/ajax-file.php";
});   

  $("#subir").click(function(){
      $.ajax({
          url: ruta,
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(datos)
          {                             
            file = datos;
        $.post('php/subirBase.php', {file:file},
          function(result){
            table.ajax.reload();
            $("input[name='file']").val("");
          },'json');                      
          }
      });   
  });

});