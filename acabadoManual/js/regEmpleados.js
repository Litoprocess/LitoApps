
 $(document).ready(function(){
 $('.button-collapse').sideNav();  
     
     buscador();
        
 });
 
 

function buscador(){
  
              
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
             var id=jQuery("#consultaEmpleados").jqGrid('getRowData',a).ClaveID;

             alert(id);
              
}

});

}
  
