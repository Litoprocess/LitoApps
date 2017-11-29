$(document).ready(function() {

  var IdTicket;
  var Titulo;
  var Tarea;
  var Fecha;
  var table;
  var Nasignado;
  var CorreoAgente;

  var lsNombre = localStorage.NombreUsuario;
  var lsDepartamento = localStorage.DepartamentoUsuario;
  var lsCorreo = localStorage.CorreoUsuario;
  var lsCorreo2 = localStorage.Correo2;

  opt_categorias();

  $('.tap-target').tapTarget('open');

  function welcome(){
    $('.tap-target').tapTarget('close');
  }

  setInterval(welcome, 4000);



//Modal Agregar ticket

$( "#btn-AddTicket" ).click(function() {
  $('#AddTicket').modal('open');
  $("#AddTicket #txtProblema").val("");
  $("#AddTicket #txtTitulo").val("");
  $("#AddTicket #selCategoria").prop('selectedIndex',0);
  $("#chk-correo").attr( "checked", false );
  $("#txt-correo2").val("").siblings().removeClass("active");
});

//Checkbox del tiket

$( "#chk-correo" ).change(function() {

  if($("#chk-correo").prop( "checked" )==true){

    $("#txt-correo2").attr( "disabled", false );

    $("#txt-correo2").val(lsCorreo2).siblings().addClass("active");

  }else{

    $("#txt-correo2").attr( "disabled", true );

    $("#txt-correo2").val("").siblings().removeClass("active");

  }
  
});


//Guardar datos en ticket

$("#form-ticket").submit(function(){

  if($('#selCategoria').val()== null || $('#txtProblema').val()== ""){

    Materialize.toast('Completa los campos', 1200,'blue darken-4',function(){
    })

  }else{

    var datosTicket = $(this).serialize() + '&CorreoCopia=' + $("#txt-correo2").val() + '&NombreUsuario=' + lsNombre + '&Departamento=' + lsDepartamento + '&CorreoUsuario=' + lsCorreo;

    $.post("php/agregar-ticket.php", datosTicket,
      function(form){ 

        if(form.validacion == "true"){

          $('#AddTicket').modal('close');
          Materialize.toast('Guardado', 1200,'blue darken-4',function(){
            $('#tbl-pendiente').DataTable().ajax.reload();
            $.post("correos/registroTicket.php", datosTicket + "&IdTicket=" + form.idAgregado + '&CorreoCopia=' + '&CorreoCopia=' + $("#txt-correo2").val() + '&NombreUsuario=' + lsNombre + '&Departamento=' + lsDepartamento + '&CorreoUsuario=' + lsCorreo);

          })
        }
      },'json');
  }

  return false;
});



//Guardar seguimiento

$("#frm-seguimiento").submit(function(){

  if($('#txt-seguimiento').val() == ""){

    Materialize.toast('Completa los campos', 1200,'blue darken-4',function(){
     $('#txt-seguimiento').focus();
   })

  }else{

    $.post("php/regseguimiento-usuario.php",
      {Ticket: IdTicket,
        NombreUsuario: lsNombre,
        Notas: $("#txt-seguimiento").val(),
        txtCorreo2: $("#txt-correo21").val()
      },
      function(data){
        if (data.validacion=="true") {

          $('#SegTicket').modal('close');
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
          Materialize.toast('Guardado', 1200,'blue darken-4',function(){

           $.post("php/consulta-correo.php", {
            data: Nasignado
          }, function(correo){
            var cagente = correo.correoAgente;
            var nagente = correo.nombreAgente;
            $.post("correos/seguimientoUsuarioAgente.php", {
              IdTicket: IdTicket,
              Notas: $("#txt-seguimiento").val(),
              CorreoAgente: cagente,
              NombreAgente: nagente,
              Correo2: $("#txt-correo21").val()
            });

          }, 'json');

         });

        }else{

          alert("No se pudo guardar");
        }
      },'json');

  }

  return false;
});




//Cargar dataTables

table = $('#tbl-pendiente').DataTable({

  "ajax": "php/registro-tickets.php",
  "order": [[ 0, "desc" ]],
  "scrollY":'60vh',
  "scrollCollapse": true,
  "paging": false,
  "dom": '<"wrapper"lpti>',
  "language": {
    zeroRecords: "No hay tickets activos",
    info: "Viendo  _TOTAL_ de _MAX_ registros.",
    infoEmpty: "Viendo  _TOTAL_ de _MAX_ registros.",
    infoFiltered:   "",
    paginate: {
      first:      "Primero",
      previous:   "Anterior",
      next:       "Siguiente",
      last:       "Último"
    }
  },
});


$('#tbl-pendiente tbody').on('click', 'tr', function () {

  if ($(this).hasClass('selected')) {
    $(this).removeClass('selected');

  } else {

    table.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    $("#SegTicket #DetallesTitulo").empty();
    $("#SegTicket #txt-seguimiento").val("");
    $('#SegTicket').modal('open');
    $("#txt-correo21").val( "" );
    $("#txt-correo21").siblings( "disabled", true );
    $("#txt-correo21").attr( "disabled", true );
    $("#txt-correo2").val("").siblings().removeClass("active");
    $("#chk-correo2").attr( "checked", false );

    
    IdTicket = $(this).find('td').eq(0).html();
    Titulo = $(this).find('td').eq(1).html();
    Tarea = $(this).find('td').eq(2).html();
    Fecha = $(this).find('td').eq(3).html();
    Nasignado = $(this).find('td').eq(4).html();

    $("#SegTicket #DetallesTitulo").append("<h5>Ticket N°"+IdTicket+" - <small>" + Titulo + "</small></h5><blockquote>"+Tarea+"<br><small>"+Fecha+"</small></blockquote>");

    $.post("php/seguimiento.php", {
      IdTicket: IdTicket
    },
    function (result) {

      if(result.history.length>0){

        $("#SegTicket #HistorialTickets").empty();

        for(i=0;i<result.history.length;i++){

          $("#SegTicket #HistorialTickets").append("<p>\n\
            <strong>"+result.history[i].Usuario+"</strong>\n\
            <br>"+result.history[i].Notas+"<br>\n\
            <small>"+result.history[i].Fecha+"</small></p>");

        }
        $( "#chk-correo2" ).change(function() {

          if($("#chk-correo2").prop( "checked" )==true){

            $("#txt-correo21").attr( "disabled", false );

            $("#txt-correo21").val(lsCorreo2).siblings().addClass("active");

          }else{

            $("#txt-correo21").attr( "disabled", true );

            $("#txt-correo21").val("").siblings().removeClass("active");

          }

        });
      }
      else{
        $("#SegTicket #HistorialTickets").empty();
        $("#SegTicket #HistorialTickets").append("<p class='center-align'>No hay registro de ticktes</p>");

      }

    }, 'json');

  }
});

//Select de departamento
function opt_categorias(){

  $.post("php/opt-categorias.php",
    function(select){ 

      if(select.opcion.length>0){

        for(i=0;i<select.opcion.length;i++){

          $("#selCategoria").append("<option value='"+select.opcion[i].value+"'>"+select.opcion[i].label+"</option>");

        }
      }

      $('select').material_select();

    },'json');

}


//Filtrado

table.search( "SIN FINALIZAR" ).draw(); 

$('#chkMostrar').on('click', function() { 

  if( $('#chkMostrar').prop("checked") == true){

    var Valor = ""
    table.search( Valor ).draw(); 

  }else{

    var Valor = "SIN FINALIZAR"
    table.search( Valor ).draw(); 

  }
});


});