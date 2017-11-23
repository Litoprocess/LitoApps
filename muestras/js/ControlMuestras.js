$(document).ready(function() 
{
  var data,orden,cliente,cantidad,aplica;
  $(".button-collapse").sideNav();  

  //LLenar la tabla con la BD
  $('#registros').DataTable(
  {           
      "searching": true,
      "scrollY":        '62vh',
      "scrollCollapse": true,
      "paging":         false,
      //"destroy": true,
      "responsive": true,      
      "columnDefs": 
      [
      {"className": "dt-body-center", "targets": [2,3,4,5]},
      {"className": "dt-head-center", "targets": "_all"}
      ],
      "ajax":
      {
        "method":"POST",
        "url":"php/ObtDatosMetrics.php"
      },      
      "columns":
      [          
      {"data":"numorden"},
      {"data":"trabajo"},
      {"data":"cantentregar"},
      {"data":"cantentregada"},
      {"data":"cantidad"},
      {"data":"aplica"}
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
  var table = $('#registros').DataTable();

  //REGISTRAR CANTIDAD EN BD
  $("#registros tbody").on("click","input[type='text'].in_cantidad", function()
  { 
   var x = $(this).attr("id");
   $("#"+x).change(function()
   {
    data = table.row( $(this).parents("tr") ).data();
    orden = data.numorden;
    cantidad=$("#"+x).val();
    aplica = 'APLICA';
    $.post('php/RegMuestra.php', {orden:orden,cantidad:cantidad,aplica:aplica},
      function(result)
      {
        Materialize.toast('Se registro', 1200,'green darken-4');
        table.ajax.reload();
      },'json');  
  });      
 });

  //Actualizar si Aplica en BD
  $("#registros tbody").on("click", "input[type='checkbox'].cb_aplica", function()
  {
    if(this.checked)
    {  
     var y = $(this).attr("id");
     $("#"+y).change(function()
     { 
    data = table.row( $(this).parents("tr") ).data();
    orden = data.numorden;
    cantidad= 0;
    aplica = 'NO APLICA';

      $.post('php/RegMuestra.php', {orden:orden,cantidad:cantidad,aplica:aplica},
        function(result)
        {
          Materialize.toast('Se registro', 1200,'green darken-4');
          table.ajax.reload();
        },'json');
     }); 
    }
  });
});