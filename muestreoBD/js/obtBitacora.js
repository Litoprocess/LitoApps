$(document).ready(function(){

  $('#registros').DataTable({

    dom: 'B<fr<t>ip><"row"<"col s4 offset-s4">>',
    buttons: [

    'excel'
    ],
    "searching": true,
    "responsive": true,
    "scrollX": true,
    "ajax": {
      "url": "./php/obtenerBitacora.php"
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

});




