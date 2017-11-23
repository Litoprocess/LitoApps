
 $(document).ready(function(){
  

        busca();
    
    
  
 
      $( "#buscar" ).button({
              text: false,
             icons: {
             primary: "ui-icon ui-icon-search"
             
                }
        });
                      
 });
 
 
function busca(){
  
              var s;
              var valores=[];
jQuery("#consulta").jqGrid({        
   	url:'php/registros.php',
	datatype: "json",
   	colNames:['ID_Empleado','Actividad','Fecha Inicio','Fecha Fin','Cantidad','OP','Tiempo','Otra Act','TipoActividad','id','TipoMaq'],
   	colModel:[
                {name:'ID_Empleado',index:'ID_Empleado', width:50,align:"center",hidden:false},
   	          	{name:'Actividad',index:'Actividad', width:80,align:"center"},
                {name:'FechaInicio.date',index:'FechaInicio', width:100,align:"center"},
                {name:'FechaFin.date',index:'FechaFin.date', width:100,align:"center"},
                {name:'Cantidad',index:'Cantidad', width:100,align:"center"},
                {name:'OP',index:'OP', width:50,align:"center"},
                {name:'Tiempo',index:'Tiempo', width:50,align:"center"},
                {name:'Otra_Actividad',index:'Otra_Actividad', width:50,align:"center"},
                {name:'Tipo_Actividad',index:'Tipo_Actividad', width:50,align:"center"},
                {name:'id',index:'id', width:50,align:"center",hidden:true},
                {name:'Tipo_Maquina',index:'Tipo_Maquina', width:50,align:"center"}
       
   	],
   	rowNum:500,
   	rowList:[10,20,30,1000],
   	pager: '#pconsulta',
   	sortname: 'ID_Empleado',
    viewrecords: true,
    sortorder: "desc",
	  height:"auto",
    width:"auto",
    multiselect:false,
	  caption:"Registros",
        
        
        
         onSelectRow: function (ids) {
             var s = jQuery("#consulta").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
             var id=jQuery("#consulta").jqGrid('getRowData',s).id;
             var idEmpleado=jQuery("#consulta").jqGrid('getRowData',s).ID_Empleado;
             var OP=jQuery("#consulta").jqGrid('getRowData',s).OP;
             var Tiempo=jQuery("#consulta").jqGrid('getRowData',s).Tiempo;
             var Tipo_Maquina=jQuery("#consulta").jqGrid('getRowData',s).Tipo_Maquina;
                //consultar 
                  var dato="id="+id;

                  if(id){
                    $("#accion").val(1);
                  }


                  $.post("php/consultarRegistro.php",dato,
                    function(data){
                      
                      $("#noEmpleado").val(data.rows[0].ID_Empleado);
                       $("#noEmpleado").select();
                      $("#op").val(data.rows[0].OP);
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

                   $("#inicio").val(horaini);
                   $("#fin").val(horafin);
                  
                   $("#otro").val(data.rows[0].Otra_Actividad);
                   $("#id").val(id);
                   $("#repo").val(data.rows[0].Cantidad);
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
                $("#valorNombre").html(data.validacion);
                  if(data.prov=="Lito"){
                    $("#lito").prop("checked", true);
                    $("#prov").html("<b>Proveedor: Lito</b>");

                  }else{

                    $("#maq").prop("checked", true);
                    $("#prov").html("<b>Proveedor:<br>"+data.NombreP+"</b>");
                  
                  }

              }else{
                  $("#guardaActividad").hide();
                  $("#valorNombre").html("<p style='color:red;'>No.Empleado no existe</p>");
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
              $("#valorOrden").html(data.trabajo);

              // alert(data.trabajo);
          }else{
            $("#valorOrden").html("");

          }
        },'json'

        );


      },'json'

   );
  
  },   
                  
	
});

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




  
}

function buscador(){
  
              var s;
              var valores=[];
jQuery("#consultaEmpleados").jqGrid({        
    url:'php/registrosEmpleados.php',
  datatype: "json",
    colNames:['ClaveID','Nombre','Edad','Genero','Imss','ID_Proveedor'],
    colModel:[
                {name:'ClaveID',index:'ClaveID', width:50,align:"center",hidden:false},
                {name:'Nombre',index:'Nombre', width:150,align:"left"},
                {name:'Edad',index:'Edad', width:100,align:"center"},
                {name:'Genero',index:'Genero', width:100,align:"center"},
                {name:'Imss',index:'Imss', width:100,align:"center"},
                {name:'ID_Proveedor',index:'ID_Proveedor', width:50,align:"center"}
              
              
    ],
    rowNum:500,
    rowList:[10,20,30,1000],
    pager: '#pconsultaEmpleados',
    sortname: 'ClaveID',
    viewrecords: true,
    sortorder: "desc",
    height:"auto",
    width:"auto",
    multiselect:false,
    caption:"Empleados",
        
        
        
         onSelectRow: function (ids) {
           var a = jQuery("#consultaEmpleados").jqGrid('getGridParam','selrow');
             valores = a.toString().split(",");
             var ddd=jQuery("#consultaEmpleados").jqGrid('getRowData',a).ClaveID;

             alert(ddd);
              
}

});

}