$(document).ready(function(){
	$('.button-collapse').sideNav(); 
	$("#repOperador").hide();
  $("#repMaquina").hide();
  $("#reportemaquina").hide();
  $("#reporteoperador").hide();

  var operador,maquina,fechainicio,fechafin, Tiempo_Reportado, Tiempo_Ajuste, Tiempo_Improductivo, Tiempo_Tiro, Tiempo_sn_Registro, T_M_A, 
  Tiempo_M_SN_T, Cantidad_Produccion, Cantidad_Ajuste, TdA, VdT, TdAVW, Cantidad_AjusteVW, TiempoDeseado, TIempoAjusteTiro , eficiencia, porcentajeeficiencia,ffin,finicio;
  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();

  var output =  (day<10 ? '0' : '') + day + '-' +
  (month<10 ? '0' : '') + month + '-' +
  d.getFullYear();

    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: '',
    clear: 'Limpiar',
    close: 'Aceptar',
    closeOnSelect: true, // Close upon selecting a date,
    format: 'dd/mm/yyyy'
  });

  var table = $('#tblReporteOperador').DataTable(
  {            
   "language": 
   {    
    zeroRecords: "No hay registros",
    sInfo: "_END_ de _TOTAL_ registros",
    sInfoEmpty: "0 de 0 registros",
    sInfoFiltered: "(de _MAX_ registros en total)",                       
    search: "Buscar:"
  },
  "info": false,
  "searching": false,
  "scrollY":        '35vh',
  "scrollX": true,
  "scrollCollapse": true,
  "paging":         false,
  "responsive": true       
});

  var table2 = $('#tblReporteMaquina').DataTable(
  {                  
   "language": 
   {    
    zeroRecords: "No hay registros",
    sInfo: "_END_ de _TOTAL_ registros",
    sInfoEmpty: "0 de 0 registros",
    sInfoFiltered: "(de _MAX_ registros en total)",                       
    search: "Buscar:"
  },
  "info": false,
  "searching": false,
  "scrollY":        '35vh',
  "scrollX": true,
  "scrollCollapse": true,
  "paging":         false,
  "responsive": true,       
});      

  $("select[id=tipoReporte]").change(function(){
    $(".html").html("0.00");
    $("#diveficiencia").show();
    $("#divsedebio").show();    
    if( $("select[id=tipoReporte]").val() === "operador"){
     $("#repOperador").show();
     $("#repMaquina").hide();
     $("#maquina").val("0");	      
   } 
   else if( $("select[id=tipoReporte]").val() === "maquina")
   {
     $("#repMaquina").show();	
     $("#repOperador").hide();
     $("#operador").val("0");
     operador     	
   } 
   else 
   {
     $("#repOperador").hide();
     $("#repMaquina").hide();
   }

 });

  $("#operador").change(function(){
    operador = $("#operador").val();    
  });

  $("#maquina").change(function(){
   maquina = $("#maquina").val();
 });

  $("#fechainicio").change(function(){
    fechainicio = $("#fechainicio").val();
    alert(fechainicio);
    finicio = new Date(fechainicio);
    alert(finicio);  
  });

  $("#fechafin").change(function(){
    fechafin = $("#fechafin").val();
    alert(fechafin);
    ffin = new Date(fechafin);
    alert(ffin);
  });

  $("#buscar").click(function()
  {
    if( $("select[id=tipoReporte]").val() === "operador" )
    {
      $("#reporteoperador").show();
      $("#reportemaquina").hide();
      table = $('#tblReporteOperador').DataTable(
      {             
        destroy: true,                     
        ajax:{
          url: 'php/obtReporte.php',
          data: {operador:operador,fechainicio:fechainicio,fechafin:fechafin}
        },  
        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'excelHtml5',
          title: 'ReporteOperador_' + output 
        },
        ],                 
        "columns":
        [          
        {data : "NumOrden"},
        {data : "NombreTrabajo"},
        {data : "clvActividad"},
        {data : "Observacion"},
        {data : "KeyProceso"},
        {data : "Proceso"},
        {data : "Cantidad"},
        {data : "Tiempo"},
        {data : "HoraInicio"},
        {data : "HoraFin"},
        {data : "FechaProduccion"},
        {data : "Maquina"}
        ],     
        "language": 
        {    
          zeroRecords: "No hay registros",
          sInfo: "_END_ de _TOTAL_ registros",
          sInfoEmpty: "0 de 0 registros",
          sInfoFiltered: "(de _MAX_ registros en total)",                       
          search: "Buscar:"
        },
        "searching": false,
        "scrollY":        '35vh',
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         false,
        "responsive": true,
        "order": [[ 8, "asc" ]]       
      }); 

$.post('php/indicadores.php', {operador:operador,fechainicio:fechainicio,fechafin:fechafin},
  function(result)
  {
    if(result.data.length>0)
    {            
      $("#tiemporep").html(currency(result.data[0].TiempoReportado));
      Tiempo_Reportado = result.data[0].TiempoReportado;
      if($("select[id=tipoReporte]").val() === "operador")
      {
        maquina = result.data[0].Maquina;
      }
      $("#tiempoajuste").html(currency(result.data[0].TiempoAjuste));
      Tiempo_Ajuste = result.data[0].TiempoAjuste; 

      $("#tiempoimproductivo").html(currency(result.data[0].TiempoImproductivo));
      Tiempo_Improductivo = result.data[0].TiempoImproductivo; 

      $("#tiempotiro").html(currency(result.data[0].TiempoTiro));
      Tiempo_Tiro = result.data[0].TiempoTiro;

      $("#tiemposinregistro").html(currency(result.data[0].TiempoSinRegistro));
      Tiempo_sn_Registro = result.data[0].TiempoSinRegistro;

      $("#tiempoajeno").html(currency(result.data[0].TiempoMuertoAjeno));
      T_M_A = result.data[0].TiempoMuertoAjeno;  

      $("#tiemposinturno").html(currency(result.data[0].TiempoSinTurno));
      Tiempo_M_SN_T = result.data[0].TiempoSinTurno; 

      $(".cantproducida").html(number_format(result.data[0].Tiros));
      Cantidad_Produccion = result.data[0].Tiros; 

      $(".cantajuste").html(currency(result.data[0].AjusteLito));
      Cantidad_Ajuste = result.data[0].AjusteLito;                                                    

      VdT = result.data[0].VelocidadStd; 
      $("#velocidadtiro").html(number_format(VdT));
      TdA = result.data[0].AjusteStd;
      $("#estandarajuste").html(currency(TdA),2);                                          

      TdAVW = result.data[0].AjusteVWStd;
      $("#estandarajusteliteratura").html(currency(TdAVW),2); 
      Cantidad_AjusteVW = result.data[0].AjusteVW;
      $("#cantajusteliteratura").html(number_format(Cantidad_AjusteVW));                                                      

      TiempoDeseado = (TdA * Cantidad_Ajuste) + (TdAVW * Cantidad_AjusteVW) + (Cantidad_Produccion / VdT);
      $("#debio").html(currency(TiempoDeseado),2);

      TIempoAjusteTiro = (Tiempo_Ajuste + Tiempo_Tiro + Tiempo_Improductivo);
      $("#tiempotiroajuste").html(currency(TIempoAjusteTiro),2);

      eficiencia = TiempoDeseado / TIempoAjusteTiro;
      porcentajeeficiencia = eficiencia * 100;
      if(eficiencia >= 0.80)
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_up</i>");
      } 
      else if(eficiencia < 0.80)
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_down</i>");
      }
      else
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_down</i>");

      }
      $("#eficiencia").html(currency(porcentajeeficiencia));

    }
  },'json'); 

$( ".buttons-excel" ).hide(); 
$( "#excel-operador" ).on( "click", function() {
  $( ".buttons-excel" ).trigger( "click" );
});                                                          

}
else if ($("select[id=tipoReporte]").val() === "maquina" ) 
{
  $("#reporteoperador").hide();
  $("#reportemaquina").show();
  table2 = $('#tblReporteMaquina').DataTable(
  {              
    destroy: true,                          
    ajax:{
      url: 'php/obtReporte.php',
      data: {maquina:maquina,fechainicio:fechainicio,fechafin:fechafin}
    },  
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excelHtml5',
      title: 'ReporteMaquina_' + output
    },
    ],                   
    "columns":
    [          
    {data : "NumOrden"},
    {data : "NombreTrabajo"},
    {data : "clvActividad"},
    {data : "Observacion"},
    {data : "KeyProceso"},
    {data : "Proceso"},
    {data : "Cantidad"},
    {data : "Tiempo"},
    {data : "HoraInicio"},
    {data :  "HoraFin"},
    {data : "FechaProduccion"},
    {data : "NumEmpleado"}
    ],     
    "language": 
    {    
      zeroRecords: "No hay registros",
      sInfo: "_END_ de _TOTAL_ registros",
      sInfoEmpty: "0 de 0 registros",
      sInfoFiltered: "(de _MAX_ registros en total)",                       
      search: "Buscar:"
    },
    "info": false,
    "searching": false,
    "scrollY":        '35vh',
    "scrollX": true,
    "scrollCollapse": true,
    "paging":         false,
    "responsive": true,
    "order": [[ 8, "asc" ]]       
  });  

$.post('php/indicadores.php', {maquina:maquina,fechainicio:fechainicio,fechafin:fechafin},
  function(result)
  {
    if(result.data.length>0)
    {            
      $("#tiemporep").html(currency(result.data[0].TiempoReportado));
      Tiempo_Reportado = result.data[0].TiempoReportado;
      if($("select[id=tipoReporte]").val() === "operador")
      {
        maquina = result.data[0].Maquina;
      }
      $("#tiempoajuste").html(currency(result.data[0].TiempoAjuste));
      Tiempo_Ajuste = result.data[0].TiempoAjuste; 

      $("#tiempoimproductivo").html(currency(result.data[0].TiempoImproductivo));
      Tiempo_Improductivo = result.data[0].TiempoImproductivo; 

      $("#tiempotiro").html(currency(result.data[0].TiempoTiro));
      Tiempo_Tiro = result.data[0].TiempoTiro;

      $("#tiemposinregistro").html(currency(result.data[0].TiempoSinRegistro));
      Tiempo_sn_Registro = result.data[0].TiempoSinRegistro;

      $("#tiempoajeno").html(currency(result.data[0].TiempoMuertoAjeno));
      T_M_A = result.data[0].TiempoMuertoAjeno;  

      $("#tiemposinturno").html(currency(result.data[0].TiempoSinTurno));
      Tiempo_M_SN_T = result.data[0].TiempoSinTurno; 

      $(".cantproducida").html(number_format(result.data[0].Tiros));
      Cantidad_Produccion = result.data[0].Tiros; 

      $(".cantajuste").html(currency(result.data[0].AjusteLito));
      Cantidad_Ajuste = result.data[0].AjusteLito;                                                    

      VdT = result.data[0].VelocidadStd; 
      $("#velocidadtiro").html(number_format(VdT));
      TdA = result.data[0].AjusteStd;
      $("#estandarajuste").html(currency(TdA),2);                                               

      TdAVW = result.data[0].AjusteVWStd;
      $("#estandarajusteliteratura").html(currency(TdAVW),2); 
      Cantidad_AjusteVW = result.data[0].AjusteVW;
      $("#cantajusteliteratura").html(number_format(Cantidad_AjusteVW));                                                      

      TiempoDeseado = (TdA * Cantidad_Ajuste) + (TdAVW * Cantidad_AjusteVW) + (Cantidad_Produccion / VdT);
      $("#debio").html(currency(TiempoDeseado),2);

      TIempoAjusteTiro = (Tiempo_Ajuste + Tiempo_Tiro + Tiempo_Improductivo);
      $("#tiempotiroajuste").html(currency(TIempoAjusteTiro),2);

      eficiencia = TiempoDeseado / TIempoAjusteTiro;
      porcentajeeficiencia = eficiencia * 100;
      if(eficiencia >= 0.80)
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_up</i>");
      } 
      else if(eficiencia < 0.80)
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_down</i>");
      }
      else
      {
        $("#eficiencia-icon").html("<i class='material-icons dp48'>thumb_down</i>");

      }
      $("#eficiencia").html(currency(porcentajeeficiencia));

    }
  },'json');

$( ".buttons-excel" ).hide(); 
$( "#excel-maquina" ).on( "click", function() {
  $( ".buttons-excel" ).trigger( "click" );
});
                                                          
} 

});

$("#imprimir-operador").click(function(){
  window.open("pdf/reporteoperador.php?operador=" + operador + "&fechainicio=" + fechainicio + "&fechafin="+fechafin,'_blank');
}); 

$("#imprimir-maquina").click(function(){
  window.open("pdf/reporteMaquina.php?maquina=" + maquina + "&fechainicio=" + fechainicio + "&fechafin="+fechafin,'_blank');
}); 

function currency(value, decimals, separators) {
  decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
  separators = separators || [',', ",", '.'];
  var number = (parseFloat(value) || 0).toFixed(decimals);
  if (number.length <= (4 + decimals))
    return number.replace('.', separators[separators.length - 1]);
  var parts = number.split(/[-.]/);
  value = parts[parts.length > 1 ? parts.length - 2 : 0];
  var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
    separators[separators.length - 1] + parts[parts.length - 1] : '');
  var start = value.length - 6;
  var idx = 0;
  while (start > -3) {
    result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
    + separators[idx] + result;
    idx = (++idx) % 2;
    start -= 3;
  }
  return (parts.length == 3 ? '-' : '') + result;
}   

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
      return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
    regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
      amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
  }

});