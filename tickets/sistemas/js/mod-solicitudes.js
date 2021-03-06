$(document).ready(function () {

  var table;
  var titulo;

  var Nusuario = localStorage.NombreUsuario;
  var Correo2 = localStorage.Correo2;

  table = $('#all-tickets').DataTable( {
    "ajax": 'php/admin-tickets.php',
    "order": [[ 0, "desc" ]],
    "scrollY":'60vh',
    "scrollCollapse": true,
    "paging": false,
    "dom": '<"wrapper"lpti>',
    "language": {
      loadingRecords: "Cargando...",
      zeroRecords: "No hay tickets activos",
      info: "Viendo  _TOTAL_ de _MAX_ registros.",
      infoEmpty: "Viendo  _TOTAL_ de _MAX_ registros.",
      infoFiltered:   "",
      paginate: {
        first:      "Primero",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "�ltimo"
      }
    },
    "columns":[
    {"data":"Folio"},
    {"data":"Solicita"},
    {"data":"Titulo"},
    {"data":"Descripcion"},
    {"data":"Departamento"},
    {"data":"Registro"},
    {"data":"Agente",
    "render": function ( data, type, full, meta ) {
      return "<select class='personal-dt'>"+data+"</select>";
    }},
    {"data":"Prioridad",
    "render": function ( data, type, full, meta ) {
      return "<select class='select-prio'>"+data+"</select>";
    }},
    {"data":"Compromiso"},
    {"data":"Estatus",
    "width":"12%",
    "render": function ( data, type, full, meta ) {
      return "<select class='selEstado'>"+data+"</select>";
    }},
    {"data":"Finalizado"},
    {"defaultContent":"<a class='waves-effect waves-teal btn-flat btn-detalles'><i class='material-icons'>web</i></a>"},
    {"data":"Correo"}
    ],
    "columnDefs": [
    {
      "targets": [ 3, 4, 12 ],
      "visible": false,
      "searchable": false
    }
    ]
  } );

//Ejecucion de funciones (updates)

datos_agente("#all-tickets tbody", table);
datos_prioridad("#all-tickets tbody", table);
datos_estado("#all-tickets tbody", table);
fecha_compromiso("#all-tickets tbody", table);
datos_modal("#all-tickets tbody", table);



//****************************
//Funciones de updates
//****************************



//Actualizacion de Agente Asignado

function datos_agente(tbody, table) {
  $(tbody).on("change", "select.personal-dt", function () {

    var data = table.row($(this).parents("tr")).data();
    IdTicket = data.Folio;
    titulo = data.Titulo;
    var proAgente = data.Descripcion;
    var selectval = $(this).val();

    $.post("php/consulta-correo.php", {
      data: selectval
    },

    function (mail) {

      if(mail.validacion = "true"){

        var mailAgente = mail.correoAgente;

        $.post("php/update-asignado.php", {
          IdTicket: IdTicket,
          data: selectval,
          cagente: mailAgente,
          Problema: proAgente,
          NombreUsuario: Nusuario
        },

        function (form) {

          if (form.validacion == "true") {
            Materialize.toast('Agente asignado correctamente', 1200, 'blue darken-4',function(){

              $.post("correos/asignacionAgente.php", {
                IdTicket: IdTicket,
                titulo: titulo,
                data: selectval,
                cagente: mailAgente,
                Problema: proAgente,
                NombreUsuario: Nusuario
              });

              table.ajax.reload ();

            })

          }

        }, 'json');

      }
      else{

        Materialize.toast('No se encontro correo del agente', 1200, 'blue darken-4')

      }

    }, 'json');

  });
}



//Actualizacion de prioridad

function datos_prioridad(tbody, table) {
  $(tbody).on("change", "select.select-prio", function () {

    var data = table.row($(this).parents("tr")).data();
    IdTicket = data.Folio;
    titulo = data.Titulo;
    var Prioridad = $(this).val();


    $.post("php/update-prioridad.php", {
      IdTicket: IdTicket,
      data: Prioridad,
      NombreUsuario: Nusuario
    },

    function (form) {

      if (form.validacion == "true") {
        Materialize.toast('Prioridad actualizada correctamente', 1200, 'blue darken-4',function(){

          $.post("correos/agente-ticket.php", {
            IdTicket: IdTicket
            
          },

          function (nombreAgente) {

            if(nombreAgente.Agente != "SIN ASIGNAR"){

              var nombreAgente = nombreAgente.Agente;

              $.post("php/consulta-correo.php", {
                data: nombreAgente
              }, function(correo){
                var cagente = correo.correoAgente;
                var nagente = correo.nombreAgente;
                $.post("correos/PrioridadTicket.php", {
                  IdTicket: IdTicket,
                  NombreUsuario: Nusuario,
                  titulo: titulo,
                  data: Prioridad,
                  cagente: cagente,
                  nagente: nagente

                });

              }, 'json');

            }
            else{

              Materialize.toast('No se envi� el correo, no hay agente asignado', 1600, 'red darken-4')

            }

          }, 'json');

        })
        table.ajax.reload ();
      }

    }, 'json');

  });
}



//Actualizacion de estado

function datos_estado(tbody, table) {
 $(tbody).on("change", "select.selEstado", function () {

  var data = table.row($(this).parents("tr")).data();
  IdTicket = data.Folio;
  titulo = data.Titulo;
  Estado = $(this).val();
  CorreoSolicita = data.Correo;
  NombreSolicita = data.Solicita;
  FCompromiso = $(data.Compromiso).attr("value");

  if(Estado == "CERRADO RESUELTO" || Estado == "CERRADO SIN RESOLVER"){

    if(FCompromiso == ""){

    Materialize.toast('�Error!, Falta fecha compromiso', 1200, 'yellow darken-4');
    return false;

    }

  }
  
    $.post("php/update-estado.php", {
     IdTicket: IdTicket,
     NombreUsuario: Nusuario,
     data: Estado,
     mailSolicita: CorreoSolicita,
     nameSolicita: NombreSolicita
   },
   function (form) {

     if (form.validacion == "true") {
      Materialize.toast('Estatus actualizado', 1200, 'blue darken-4',function(){

        $.post("correos/estatusTicket.php", {
         IdTicket: IdTicket,
         NombreUsuario: Nusuario,
         titulo: titulo,
         data: Estado,
         mailSolicita: CorreoSolicita,
         nameSolicita: NombreSolicita
       }, 'json');
        table.ajax.reload ();
      })
    }

  }, 'json');

});
}



//Actualizacion de fecha compromiso

function fecha_compromiso(tbody, table) {

 $(tbody).on("change", "input.Fcompro", function () {

  var data = table.row($(this).parents("tr")).data();
  IdTicket = data.Folio;
  titulo = data.Titulo;
  CorreoSolicita = data.Correo;
  NombreSolicita = data.Solicita;
  Fecha = $(this).val();

  if (Fecha != "") {

   $.post("php/update-input.php", {
     IdTicket: IdTicket,
     NombreUsuario: Nusuario,
     data: Fecha,
     mailSolicita: CorreoSolicita,
     nameSolicita: NombreSolicita
   },
   function (form) {

     if (form.validacion == "true") {
       Materialize.toast('Fecha actualizada', 1200, 'blue darken-4',function(){

        $.post("correos/fechaCompromiso.php", {
          IdTicket: IdTicket,
          NombreUsuario: Nusuario,
          titulo: titulo,
          data: Fecha,
          mailSolicita: CorreoSolicita,
          nameSolicita: NombreSolicita
        }, 'json');

        table.ajax.reload ();
        
      })
     }

   }, 'json');

 } else {

   Materialize.toast('No se ha podido actualizar', 1200, 'blue darken-4')

 }

});

}



//Mostrar Modal detalles

function datos_modal(tbody, table) {
 $(tbody).on("click", "a.btn-detalles", function () {

  var datos = table.row($(this).parents("tr")).data();
  IdTicket = datos.Folio;
  Correo = datos.Correo;
  Titulo = datos.Titulo;
  Tarea = datos.Descripcion;
  Fecha = datos.Registro;
  Estado = datos.Finalizado;


  $("#SegAgente #DetallesTitulo").empty();
  $("#SegAgente #txt-seguimiento").val("");
  $('#SegAgente').modal('open');
  $("#AddTicket #txtProblema").val("");
  $("#AddTicket #txtTitulo").val("");
  $("#AddTicket #selCategoria").prop('selectedIndex',0);
  $("#chk-correo2").attr( "checked", false );
  $("#txt-correo21").val("").siblings().removeClass("active");

  if(Estado != 'SIN FINALIZAR'){

   $('#SegAgente #btn-fseguimiento').attr("disabled", true);
   $('#SegAgente #btn-rasignacion').attr("disabled", true);
   $('#SegAgente #txt-seguimiento').attr("disabled", true);
   $('#SegAgente #btn-seguimiento').attr("disabled", true);

 } else {

   $('#SegAgente #btn-fseguimiento').attr("disabled", false);
   $('#SegAgente #btn-rasignacion').attr("disabled", false);
   $('#SegAgente #txt-seguimiento').attr("disabled", false);
   $('#SegAgente #btn-seguimiento').attr("disabled", false);

 }

 $("#SegAgente #DetallesTitulo").append("<h4>Ticket N�" + IdTicket + " - <small>" + Titulo + "</small></h4><blockquote>" + Tarea + "<br><small>" + Fecha + "</small></blockquote>");

 $.post("php/seguimiento.php", {
   IdTicket: IdTicket
 },
 function (result) {

   if (result.history.length > 0) {

    $("#SegAgente #HistorialTickets").empty();

    for (i = 0; i < result.history.length; i++) {

     $("#SegAgente #HistorialTickets").append("<p>\n\
      <strong>" + result.history[i].Usuario + "</strong>\n\
      <br>" + result.history[i].Notas + "<br>\n\
      <small>" + result.history[i].Fecha + "</small></p>");

   }


   } else {
     $("#SegAgente #HistorialTickets").empty();
     $("#SegAgente #HistorialTickets").append("<p class='center-align'>No hay registro de ticktes</p>");

   }

 }, 'json');


});
}



//Guardar seguimiento

$("#frm-seguimiento").submit(function () {

  if ($('#txt-seguimiento').val() == "") {

    Materialize.toast('Completa los campos', 1200, 'blue darken-4', function () {
      $('#txt-seguimiento').focus();
    });

  } else {

    txtCorreo2 = $('#txt-correo21').val();

    $.post("php/registro-seguimiento.php", {
      Ticket: IdTicket,
      NombreUsuario: Nusuario,
      Notas: $("#txt-seguimiento").val(),
      CorreoUsuario: Correo,
      NombreUsuario: Nusuario,
      Correo2: txtCorreo2
    },
    function (data) {
      if (data.validacion == "true") {

        $('#SegAgente').modal('close');

        Materialize.toast('Guardado', 1200, 'blue darken-4',function(){

          $.post("correos/seguimientoTicket.php", {
            Ticket: IdTicket,
            Notas: $("#txt-seguimiento").val(),
            CorreoUsuario: Correo,
            NombreUsuario: Nusuario,
            Correo2: txtCorreo2
          });

          table.ajax.reload ();

        })

      } else {

        Materialize.toast('No se pudo guardar', 1200, 'blue darken-4')
      }
    }, 'json');

  }

  return false;
});


//Checkbox del tiket

$('#correoSolicitud2').on('click', function() { 

  if( $('#correoSolicitud2').prop("checked") == true){

   $("#SegAgente #txt-correo21").attr( "disabled", false );

   $("#SegAgente #txt-correo21").val(lsCorreo2).siblings().addClass("active");

   $("#SegAgente #txt-correo21").focus();

 }else{

  $("#SegAgente #txt-correo21").attr( "disabled", true );

  $("#SegAgente #txt-correo21").val("").siblings().removeClass("active");

}
});


//Filtrado

/*table.search( "SIN FINALIZAR" ).draw(); 

$('#chkMostrar').on('click', function() { 

  if( $('#chkMostrar').prop("checked") == true){

    var Valor = ""
    table.search( Valor ).draw(); 

  }else{

    var Valor = "SIN FINALIZAR"
    table.search( Valor ).draw(); 

  }
});*/

$("#chkMostrar").on('click', function(){
  if( $("#chkMostrar").prop("checked") == true )
  {
    table = $('#all-tickets').DataTable( {
      destroy:true,
      "ajax": 'php/admin-tickets-cerrados.php',
      "order": [[ 0, "desc" ]],
      "scrollY":'60vh',
      "scrollCollapse": true,
      "paging": false,
      "dom": '<"wrapper"lpti>',
      "language": {
	loadingRecords: "Cargando...",
        zeroRecords: "No hay tickets activos",
        info: "Viendo  _TOTAL_ de _MAX_ registros.",
        infoEmpty: "Viendo  _TOTAL_ de _MAX_ registros.",
        infoFiltered:   "",
        paginate: {
          first:      "Primero",
          previous:   "Anterior",
          next:       "Siguiente",
          last:       "�ltimo"
        }
      },
      "columns":[
      {"data":"Folio"},
      {"data":"Solicita"},
      {"data":"Titulo"},
      {"data":"Descripcion"},
      {"data":"Departamento"},
      {"data":"Registro"},
      {"data":"Agente",
      "render": function ( data, type, full, meta ) {
        return "<select class='personal-dt'>"+data+"</select>";
      }},
      {"data":"Prioridad",
      "render": function ( data, type, full, meta ) {
        return "<select class='select-prio'>"+data+"</select>";
      }},
      {"data":"Compromiso"},
      {"data":"Estatus",
      "width":"12%",
      "render": function ( data, type, full, meta ) {
        return "<select class='selEstado'>"+data+"</select>";
      }},
      {"data":"Finalizado"},
      {"defaultContent":"<a class='waves-effect waves-teal btn-flat btn-detalles'><i class='material-icons'>web</i></a>"},
      {"data":"Correo"}
      ],
      "columnDefs": [
      {
        "targets": [ 3, 4, 12 ],
        "visible": false,
        "searchable": false
      }
      ]
    } );    
  }
  else
  {
	location.reload();
  }
});

});

