<?php require 'views/head.php'; ?>
<?php $fecha=date("d-m-Y"); ?>
<main>
  <div class="container">
    <div class="row">
    <br><br><br><br>
  	<table id="tblmateriales" class="hover compact cell-border" cellspacing="0" width="100%" style="font-size:80%;">
  		<thead>
  			<tr>
<th>ID</th>
<th>NOMBRE_MATERIAL</th>
<th>ANCHO1</th>
<th>ALTO1</th>
<th>ANCHO2</th>
<th>ALTO2</th>
<th>ANCHO3</th>
<th>ALTO3</th>
<th>ANCHO4</th>
<th>ALTO4</th>
<th>ANCHO5</th>
<th>ALTO5</th>
<th>TIPO</th>
<th>IMPORTE</th>
<th>MONEDA</th>
<th>PROVEEDOR</th>
<th>ACTIVO</th>
<th>TRASLUCIDO</th>
<th>CORTE</th>
  			</tr>
  		</thead>
  		<tbody>
  			<!--Registros de la BDD-->
  		</tbody>
  	</table>    	
  </div>
</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script>
	var table = $('#tblmateriales').DataTable(
	{           
      "ajax":
      {
      	"method":"POST",
      	"url":"php/listadomaterial.php"
      },
      	"searching": true,
		"scrollY":        '70vh',
		"scrollX": true,
		"scrollCollapse": true,
		"paging":         false,
		//"responsive": true,
		//"autoWidth": false,
		//"order": [[3, "desc" ]], 
    "autoWidth": false,
    "fixedHeader": {
        "header": false,
        "footer": false
    },
    /*"columnDefs": [
      { "width": "5px", "targets": [0,1] },
      { "width": "40px", "targets": [34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,
      								81,82,83,84,85] },
      { "width": "100px", "targets": [2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100] },
      {"width":"150px", "targets": [3,33]},

    ],*/	    
      "columns":
      [          
        {data: "ID_MATERIAL"},
        {data: "NOMBRE_MATERIAL"},
        {data: "ANCHO1"},
        {data: "ALTO1"},
        {data: "ANCHO2"},
        {data: "ALTO2"},
        {data: "ANCHO3"},
        {data: "ALTO3"},
        {data: "ANCHO4"},
        {data: "ALTO4"},
        {data: "ANCHO5"},
        {data: "ALTO5"},
        {data: "TIPO"},
        {data: "IMPORTE"},
        {data: "MONEDA"},
        {data: "PROVEEDOR"},
        {data: "ACTIVO"},
        {data: "TRASLUCIDO"},
        {data: "CORTE"}
      ],
    "columnDefs": [
    {
      "className": "dt-center",
      "targets": [0,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]
    },
    ],      
      "language": 
      {
      	sLoadingRecords: "Cargando...",        
      	zeroReords: "No hay registros",
      	sInfo: "_END_ de _TOTAL_ registros",
      	sInfoEmpty: "0 de 0 registros",
      	sInfoFiltered: "(de _MAX_ registros en total)",                       
      	search: "Buscar:"
      }        
  }); 	

  $("#tblmateriales tbody").on("click","input[type='text'].importe", function()
  { 
   var id_material = $(this).attr("id");
   $("#"+id_material).change(function()
   {
    var importe = $("#"+id_material).val();
    $.post('php/actualizarlistado.php', {id_material:id_material,importe:importe},
      function(result)
      {
        Materialize.toast('Se registro', 1200,'green darken-4');
        table.ajax.reload();
      },'json'); 
  });      
 });
</script>
</body>
</html>    	