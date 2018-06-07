$(document).ready(function() 
{

if(window.location.pathname == '/litoapps/capacitacion/resultado.php')
{
  $("#registro").removeClass("active");
  $("#resultado").addClass("active");
} 

  $('.button-collapse').sideNav();
  var id, curso, participantes, duracion, horasHombre, costoPP, costoTotal, id, estatus, mesReal;

  $(".button-collapse").sideNav(); 

var hoy = new Date();
var yyyy = hoy.getFullYear();   

  $('#tblCurso').DataTable(
  {           
    "searching": true,
    "scrollY":        '50vh',
    "scrollX": true,
    "scrollCollapse": true,
    "paging":         false,
    "responsive": true,
    "order": [[3, "desc" ]],     
    "columnDefs": 
    [
      //{"className": "dt-head-center", "targets": "_all"},
      {"className": "dt-center", "targets": [3,4,5,6,7,8,9,10,11,12,13,14] },
      //{ "width": "10%", "targets": [3,12] },
      {
      "targets": [ 14 ],
      "visible": false,
      "searchable": true
      }
    ],
      "ajax":
      {
        "method":"POST",
        "url":"php/obtCursos.php"
      },      
      "columns":
      [          
      {"data":"id"},
      {"data":"departamento"},
      {"data":"curso"},
      {"data":"mes"},
      {"data":"participantes"},
      {"data":"duracion"},
      {"data":"horasHombre"},
      {"data":"costoPP"},
      {"data":"costoTotal"},
      {"data": "participantesReal"},
      {"data":"duracionReal"},
      {"data":"horasHombreReal"},
      {"data":"mesReal"},
      {"data":"estatus"},
      {"data":"ano"}
      ],        
      "language": 
      {
        decimal: ",",
        thousands: ".",
        sLoadingRecords: "Cargando...",        
        zeroRecords: "No hay registros",
        sInfo: "_END_ de _TOTAL_ registros",
        sInfoEmpty: "0 de 0 registros",
        sInfoFiltered: "(de _MAX_ registros en total)",                       
        search: "Buscar:"
      }        
    }); 
var table = $('#tblCurso').DataTable();

obtCumplimiento(obtMesCumplimiento(),obtMesActual(), yyyy);

// FILTRO
$("#tblCurso_filter").hide();
table.search( yyyy ).draw(); 

$("input[name=ano]").click(function () {  
        $("#cumplimiento").html("");  
        if( $('input:radio[name=ano]:checked').val() == "2017" )
        {
        table.search( "2017" ).draw();
        obtCumplimiento(obtMesCumplimiento(),obtMesActual(), yyyy);
        }
        else if( $('input:radio[name=ano]:checked').val() == "2018" )
        {
        table.search( "2018" ).draw();
        obtCumplimiento(obtMesCumplimiento(),obtMesActual(), yyyy);
        }
    });

/*$('#chk2017').on('click', function() { 

alert("2017");
$("#chk2017").prop('checked', true);
    $("#chk2018").prop('checked', false);
    table.search( "2017" ).draw(); 
    $("#cumplimiento").html("");
    obtCumplimiento(obtMesCumplimiento(),obtMesActual(), yyyy);

});*/
// FILTRO

    $('#tblCurso tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    

$('#tblCurso tbody').on('click', 'tr', function ()
{
  estatus = $(this).find('td').eq(13).html();
  if(estatus == "Cerrado")
  {
    cleanRes();
    $("#curso_real").val(estatus).siblings().addClass("active");
    $("select[id=estatus_real]").attr('disabled', 'disabled');
    $("select[id=mes_real]").attr('disabled', 'disabled');
    $("#botones").hide();

  } else {
    cleanRes();
    $("select[id=estatus_real]").removeAttr('disabled');
    $("select[id=mes_real]").removeAttr('disabled');    
    $("#botones").show();
    id = $(this).find('td').eq(0).html();
    $("#id").val(id);
    curso = $(this).find('td').eq(2).html();
    $("#curso_real").val(curso).siblings().addClass("active");
    participantes = $(this).find('td').eq(4).html();
    $("#participantes_real").val(participantes).siblings().addClass("active");
    duracion = $(this).find('td').eq(5).html();
    $("#duracion_real").val(duracion).siblings().addClass("active");
    horasHombre = $(this).find('td').eq(6).html();
    $("#horasHombre_real").val(horasHombre).siblings().addClass("active");
    mesReal = $(this).find('td').eq(3).html();
    $("select[id=mes_real]").val(mesReal).siblings().addClass("active");
    $("select[id=estatus_real]").val(estatus).siblings().addClass("active");    

  /*costoPP = $(this).find('td').eq(7).html();
  $("#costoPP_real").val(costoPP.replace(",","")).siblings().addClass("active");
  costoTotal = $(this).find('td').eq(8).html();
  $("#costoTotal_real").val(costoTotal.replace(",","")).siblings().addClass("active");*/

}

});

$("#participantes_real").keyup(function()
{
  participantes = $("#participantes_real").val();
        if(participantes != ""){
         horasHombre = parseInt(participantes) * parseInt(duracion);
        $("#horasHombre_real").val(horasHombre).siblings().addClass('active');                  
      }   
});

$("#duracion_real").keyup(function()
{
    duracion = $("#duracion_real").val();
        if(duracion != ""){
        horasHombre = parseInt(duracion) * parseInt(participantes);
        $("#horasHombre_real").val(horasHombre).siblings().addClass('active');         
       }
});

$("select[id=mes_real]").change(function(){
   mesReal = $("select[id=mes_real]").val();
});

/*------------------------------------ FORMULARIO ---------------------------*/

$("#reportar").click(function()
{
  if( ($("#participantes_real").val() == '') || ($("#duracion_real").val() == '') || ($("select[id=estatus_real]").val() == '') || ($("#select[id=mes_real]").val() == '') ){
    Materialize.toast('Completa los campos', 1000,'red darken-4');
  } else {
    id = $("#id").val();
    estatus = $("select[id=estatus_real]").val();
    $.post('php/resultado.php',
    {
      'id' : id,
      'participantes_real' : participantes,
      'duracion_real' : duracion,
      'horas_hreal' : horasHombre,
      'mes_real' : mesReal,
      'estatus' : estatus
    },
    function(result){
      table.ajax.reload();
      Materialize.toast('Se registro', 1000,'green darken-4');
      cleanRes();
      $("#cumplimiento").html("");
      obtCumplimiento(obtMesCumplimiento(), obtMesActual(),yyyy);      
    },'json');      
  }

});  

$("#Rescancelar").click(function()
{
  cleanRes();

});

function cleanRes()
{
  $("#curso_real").val("");
  $("#participantes_real").val("");
  $("#duracion_real").val("");
  $("#horasHombre_real").val("");
  $("select[id=estatus_real]").val("");
  $("select[id=mes_real]").val("");    
}  

function obtMesCumplimiento()
{
    var hoy = new Date();
    //var dd = hoy.getDate();
    var mm = hoy.getMonth()+1; //hoy es 0!
    //var yyyy = hoy.getFullYear();

    /*if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    }*/ 
    //hoy = mm+'/'+dd+'/'+yyyy;
switch(mm) {
    case 1:
        var mes = "01) ENE";
        return mes; 
        break;
    case 2:
        var mes = "'01) ENE', '02) FEB'"; 
        return mes;
        break;
    case 3:
        var mes = "'01) ENE', '02) FEB', '03) MAR'";
        return mes; 
        break;
    case 4:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR'";
        return mes; 
        break;
    case 5:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY'";
        return mes; 
        break;
    case 6:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN'";
        return mes; 
        break;
    case 7:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL'";
        return mes; 
        break;
    case 8:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL', '08) AGO'";
        return mes; 
        break;
    case 9:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL', '08) AGO', '09) SEP'";
        return mes; 
        break;
    case 10:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL', '08) AGO', '09) SEP', '10) OCT'";
        return mes;
        break;
    case 11:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL', '08) AGO', '09) SEP', '10) OCT', '11) NOV'"; 
        return mes;
        break;
    case 12:
        var mes = "'01) ENE', '02) FEB', '03) MAR', '04) ABR', '05) MAY', '06) JUN', '07) JUL', '08) AGO', '09) SEP', '10) OCT', '11) NOV', '12) DIC'";
        return mes; 
        break;                                        
    default:
}
}

function obtMesActual()
{
    var hoy = new Date();
    var mm = hoy.getMonth()+1; //hoy es 0!

switch(mm) {
    case 1:
        var mactual = "Enero";
        return mactual; 
        break;
    case 2:
        var mactual = "Febrero"; 
        return mactual;
        break;
    case 3:
        var mactual = "Marzo";
        return mactual; 
        break;
    case 4:
        var mactual = "Abril";
        return mactual; 
        break;
    case 5:
        var mactual = "Mayo";
        return mactual; 
        break;
    case 6:
        var mactual = "Junio";
        return mactual; 
        break;
    case 7:
        var mactual = "Julio";
        return mactual; 
        break;
    case 8:
        var mactual = "Agosto";
        return mactual; 
        break;
    case 9:
        var mactual = "Septiembre";
        return mactual; 
        break;
    case 10:
        var mactual = "Octubre";
        return mactual;
        break;
    case 11:
        var mactual = "Noviembre"; 
        return mactual;
        break;
    case 12:
        var mactual = "Diciembre";
        return mactual; 
        break;                                        
    default:
}
}

function obtCumplimiento(xmes,mactual,yyyy)
{
  if( $('input:radio[name=ano]:checked').val() == "2017" )
  {
    year = yyyy -1;
    $.post('php/obtenerCumplimiento.php', {year:year},
      function(result){

        if(result.data.length>0){

          var horas = result.data[0].totalHoras;
          var horasReales = result.data[0].totalHorasReales;

          resultado = horasReales / horas;

          if(resultado <= 0.8)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de Diciembre del " + year + ":&nbsp;&nbsp;&nbsp; </span><span style='color:red; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }
          if(resultado > 0.8 && resultado <= 0.9)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de Diciembre del " + year + ":&nbsp;&nbsp;&nbsp; </span><span style='color:yellow; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }
          if(resultado > 0.9)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de Diciembre del " + year + ":&nbsp;&nbsp;&nbsp; </span><span style='color:green; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }        

        }

      },'json');    
  }
  else if( $('input:radio[name=ano]:checked').val() == "2018" )
  {
    $.post('php/obtenerCumplimiento.php', {xmes:xmes},
      function(result){

        if(result.data.length>0){

          var horas = result.data[0].totalHoras;
          var horasReales = result.data[0].totalHorasReales;

          resultado = horasReales / horas;

          if(resultado <= 0.8)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de " + mactual + " del " + yyyy + ":&nbsp;&nbsp;&nbsp; </span><span style='color:red; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }
          if(resultado > 0.8 && resultado <= 0.9)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de " + mactual + " del " + yyyy + ":&nbsp;&nbsp;&nbsp; </span><span style='color:yellow; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }
          if(resultado > 0.9)
          {
            var cumplimiento = resultado * 100;
            $ ("#cumplimiento").html("<span style='font-size:25px;'>% de cumplimiento hasta el mes de " + mactual + " del " + yyyy + ":&nbsp;&nbsp;&nbsp; </span><span style='color:green; font-size:45px;'>" + redondeo(cumplimiento,2) + "%</span>");
          }        
        }
      },'json');    
  }
}

function redondeo(numero, decimales)
{
var flotante = parseFloat(numero);
var resultado = Math.round(flotante*Math.pow(10,decimales))/Math.pow(10,decimales);
return resultado;
}

});
