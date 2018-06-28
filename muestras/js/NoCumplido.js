$(document).ready(function() 
{

if(window.location.pathname == '/litoapps/muestras/nocumplido.php')
{
  $('#noaplica').removeClass('active');
  $('#ordenes').removeClass('active');
  $('#nocumplido').addClass('active');
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
  $('#tblNoCumplido').DataTable(
  {             
      "searching": true,
      "scrollY":        '60.5vh',
      "scrollCollapse": true,
      "paging":         false,
        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'excelHtml5',
          title: 'Control_de_Muestras_NoCumplido_' + output 
        },
        ],      
      "ajax":
      {
        "method":"POST",
        "url":"php/ObtNoCumplido.php"
      },
      "responsive": true,      
      "columnDefs": 
      [
      {"className": "dt-body-center", "targets": [2,3,4,5,6]},
      {"className": "dt-head-center", "targets": "_all"}
      ],
      "columns":
      [          
      {"data":"numorden"},
      {"data":"trabajo"},
      {"data":"cantentregar"},
      {"data":"cantentregada"},
      {"data":"CantMuestras"},
      {"data":"estatus"},
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
  var table = $('#tblNoCumplido').DataTable();

  $("#tblNoCumplido tbody").on("click","input[type='text'].in_cantidad", function()
  { 
   var x = $(this).attr("id");
   $("#"+x).change(function()
   {
    data = table.row( $(this).parents("tr") ).data();
    orden = data.numorden;
    cantidad=$("#"+x).val();
    aplica = 'NO CUMPLIDO';
    $.post('php/RegMuestra.php', {orden:orden,cantidad:cantidad,aplica:aplica},
      function(result)
      {
        Materialize.toast('Se registro', 1200,'green darken-4');        
        table.ajax.reload();
      },'json');  
  });      
 });

  //Actualizar si Aplica en BD
  $("#tblNoCumplido tbody").on("click", "input[type='checkbox'].cb_aplica", function()
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