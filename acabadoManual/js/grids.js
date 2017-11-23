$(document).ready(function(){
  $('.button-collapse').sideNav();  
  $('select').material_select();



var grid = function(nombreGrid, url,Campo1,Campo2,Campo3,Campo4,Campo5,Campo6,Campo7,Campo8,Campo9,Campo10,Campo11,Campo12){
    
    //<editor-fold defaultstate="collapsed" desc="variables del objeto Grid">
    this.url =nombreGrid;
    this.url =url;
    this.Campo1 = Campo1;
    this.Campo2 = Campo2;
    this.Campo3 = Campo3;
    this.Campo4 = Campo4;
    this.Campo5 = Campo5;
    this.Campo6 = Campo6;
    this.Campo7 = Campo7;
    this.Campo8 = Campo8;
    this.Campo9 = Campo9;
    this.Campo10 = Campo10;
    this.Campo11 = Campo11;
    this.Campo12=Campo12;

prueba(nombreGrid,url,Campo1,Campo2,Campo3,Campo4,Campo5,Campo6,Campo7,Campo8,Campo9,Campo10,Campo11,Campo12);

   
}
 
 function prueba(nombreGrid,url,Campo1,Campo2,Campo3,Campo4,Campo5,Campo6,Campo7,Campo8,Campo9,Campo10,Campo11,Campo12){
              var s;
              var valores=[];
              if(nombreGrid=="#consultaEmpleados"){
                var mostrarVariables=true;
                var largoCampo1=200;
                var positionCampo1='left';
                var varFecha="";
                 

              }else{ mostrarVariables=false;largoCampo1=70;positionCampo1='center';varFecha=".date";}


                $(nombreGrid).jqGrid({
                url:url,
                datatype: "json",
                colNames:[Campo1,Campo2,Campo3,Campo4,Campo5,Campo6,Campo7,Campo8,Campo9,Campo10,Campo11],
                colModel: [
                    {name:Campo1,index:Campo1, width:largoCampo1,align:positionCampo1},
                      {name:Campo2,index:Campo2, width:100,align:"center"},
                        {name:Campo3+varFecha,index:Campo3, width:100,align:"center"},
                          {name:Campo4+varFecha,index:Campo4, width:100,align:"center"},
                            {name:Campo5,index:Campo5, width:50,align:"center"},
                             {name:Campo6,index:Campo6, width:100,align:"center"},
                              {name:Campo7,index:Campo7, width:100,align:"left",hidden:mostrarVariables},
                               {name:Campo8,index:Campo8, width:80,align:"left",hidden:mostrarVariables},
                                {name:Campo9,index:Campo9, width:80,align:"left",hidden:mostrarVariables},
                                 {name:Campo10,index:Campo10, width:50,align:"center",hidden:true},
                                  {name:Campo11,index:Campo11, width:50,align:"center",hidden:mostrarVariables}
                                
                ],
    
                   rowNum:500,
                   rowList:[10,20,30,1000],
                   pager:nombreGrid+"p",
                   sortname: Campo1,
                   viewrecords: true,
                   sortorder: "desc",
                   height:"auto",
                   width:'auto',
                   multiselect:false,
                   caption:"Registros",
                   
                  
                  onSelectRow: function (ids) {

                  
             var s = jQuery(nombreGrid).jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
             var id=jQuery(nombreGrid).jqGrid('getRowData',s).id;
             var idEmpleado=jQuery(nombreGrid).jqGrid('getRowData',s).ID_Empleado;
             var OP=jQuery(nombreGrid).jqGrid('getRowData',s).OP;
             var Tiempo=jQuery(nombreGrid).jqGrid('getRowData',s).Tiempo;
             var Tipo_Maquina=jQuery(nombreGrid).jqGrid('getRowData',s).Tipo_Maquina;
                //consultar 
               
                if(nombreGrid=="#consulta"){
        
                  var dato="id="+id;

                  if(id){
                    $("#accion").val(1);
                  }


                  $.post("php/consultarRegistro.php",dato,
                    function(data){
                      
                      $("#noEmpleado").val(data.rows[0].ID_Empleado).siblings().addClass( "active" );;
                       $("#noEmpleado").select();
                      $("#op").val(data.rows[0].OP).siblings().addClass( "active" );;
                      $("#costos").val(data.rows[0].Tipo_Maquina);
                      if((data.rows[0].Tipo_Maquina) !=""){
                         $('#op').prop("disabled",true);
                      }else{
                          $('#op').prop("disabled",false);
                      }
                   $("#"+data.rows[0].Actividad).trigger("click");
                   //recortar la fecha
                  
                  var horaini= data.rows[0].FechaInicio.date.slice(10,16);
                  var horafin= data.rows[0].FechaFin.date.slice(10,16);
                  var fechaIni=data.rows[0].FechaInicio.date.slice(0,10);
                  var fechaFi=data.rows[0].FechaFin.date.slice(0,10);
                  $("#fechInicio").val(fechaIni);
                  $("#fechFin").val(fechaFi);
                  
                   $("#inicio").val(horaini).siblings().addClass( "active" );;
                   $("#fin").val(horafin).siblings().addClass( "active" );;
                  
                   $("#otro").val(data.rows[0].Otra_Actividad);
                   $("#id").val(id);
                   $("#repo").val(data.rows[0].Cantidad).siblings().addClass( "active" );
                   $("#tiempo").val(Tiempo);
                   if(Tipo_Maquina==""){
                       $('#costos').prop('selectedIndex',0);
                   }
                   //consultar que tipo de empleado es

            var idempleado="idempleado="+idEmpleado;
           $("#lito").prop("checked", false);
           $("#maq").prop("checked", false);
           $.post("php/validarEmpleado.php",idempleado,
            function(data){
              if(typeof data.validacion !== "undefined" && data.validacion){
              $("#guardaActividad").show();
                $("#valorNombre").val(data.validacion).siblings().addClass( "active" );
                  if(data.prov=="Lito"){
                    $("#lito").prop("checked", true);
                    $("#prov").html("<b>Proveedor: Lito</b>");

                  }else{

                    $("#maq").prop("checked", true);
                    $("#prov").html("<b>Proveedor:<br>"+data.NombreP+"</b>");
                  
                  }

              }else{
                  $("#guardaActividad").hide();
                  $("#valorNombre").val("<p style='color:red;'>No.Empleado no existe</p>");
                  $("#noEmpleado").focus();
                  $("#lito").prop("checked", false);
                  $("#maq").prop("checked", false);
                  $("#prov").html("");
                 }
            },'json'  );

                  //fin de comprobación de empleado

                  //comprobar orden

           var orden="orden="+OP;
          $.post("php/validarOrden.php",orden,
             function(data){
                 if(typeof data.NumOrden !== "undefined" && data.NumOrden){
                          $("#guardaActividad").show();
                          $("#valorOrden").val(data.trabajo).siblings().addClass( "active" );;

              // alert(data.trabajo);
               }else{
            $("#valorOrden").html("");

          }
        },'json'   );

      },'json'

      );
    

    }
  
   },         
                 
 })//fin de grid

    
    //buscador de grids

                     $("#buscar").click( function() {
                        
                        $('#consulta').jqGrid('filterToolbar', { searchOnEnter: false, enableClear: false });
                        $(".ui-search-oper").hide();
                        $(".clearsearchclass").hide(); 
                        //$("#gs_nombre_Alumno").hide();
                        $("#gs_Actividad").hide();
                        $("#gs_Cantidad").hide();
                        $("#gs_Otra_Actividad").hide();
                        $("#gs_OP").hide();
                        $("#gs_Tiempo").hide();
                        
                    });

                    $("#proveedor").change(function(){
                        $("#gs_Nombre").hide();
                         $("#gs_ClaveID").hide();
                          $("#gs_Genero").hide();
                           $("#gs_No_Imss").hide();
                            $("#gs_Edad").hide();
                             $("#gs_ID_proveedor").hide();
                              $(".ui-search-oper").hide();
                               $(".clearsearchclass").hide(); 

                        $('#consultaEmpleados').jqGrid('filterToolbar', { searchOnEnter: false, enableClear: false });
                             var pro=$(this).val();
                             if(pro=="Seleccionar..."){
                                $("#gs_ID_proveedor").val("");

                             }else{
                                $("#gs_ID_proveedor").val(pro);
                             }
                              
                                $("#nombre").focus();
                                  $(".clearsearchclass").trigger("click"); 
                    });


                   
                  
                               

}
//listado de grids
 $("#tabRa").click(function(){
        window.location='index.php';
 });
 

var objeto1 = new grid('#consulta','php/registros.php','ID_Empleado','Actividad','FechaInicio','FechaFin','Cantidad','OP','Tiempo','Otra_Actividad','Tipo_Actividad','id','Tipo_Maquina','');
prueba(objeto1.nombreGrid,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,
    objeto1.Campo5,objeto1.Campo6,objeto1.Campo7,objeto1.Campo8,objeto1.Campo9,objeto1.Campo10,objeto1.Campo11,objeto1.Campo12);



$("#tabRe").click(function(){
  
var objeto2 = new grid('#consultaEmpleados','php/registrosEmpleados.php','Nombre','ClaveID','Genero','No_Imss','ID_proveedor','Edad','','','','','','');

prueba(objeto2.nombreGrid,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,
    objeto2.Campo5,objeto2.Campo6,objeto2.Campo7,objeto2.Campo8,objeto2.Campo9,objeto2.Campo10,objeto2.Campo11,objeto2.Campo12);


});




});

 