<?php require 'views/head.php'; ?>
<style>
table.compact {
margin: 0 auto;
width: 100%;
clear: both;
border-collapse: collapse;
table-layout: fixed; // ***********add this 
word-wrap:break-word; // ***********and this 

}	
</style>
<main class="container">
	<div class="row">
		<div class="col s12">
			<table id="tblListado" class="row-border order-column compact" cellspacing="0" width="100%">
				<thead>
					<tr>
						<!--th>EDIT</th-->
						<th>ID</th>                                          						
						<th>FECHA</th>
						<th>NOMBRE</th>
						<th>EQUIPO</th>
						<th>BRECHA EN ACCOUNTABILITY</th>  
						<!--th>IMPRIMIR</th-->  
					</tr>
				</thead>
			</table> 
		</div>
	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{

  var table = $('#tblListado').DataTable(
  {             
    ajax:{
      url: 'php/obtListado.php'
    },              
    "columns":
    [   
    //{defaultContent : "<a class='waves-effect waves-teal btn-flat btn-editar'><i class='material-icons'>edit</i></a>"},       
    {data : "id"},
    {data : "fecha"},
    {data : "nombre"},
    {data : "equipo"},
    {data : "brecha"}
    //{defaultContent : "<a class='waves-effect waves-teal btn-flat btn-imprimir'><i class='material-icons'>print</i></a>"}
    ],
    "columnDefs": [
      { width: "3%", targets: 0, "className": "dt-body-center" },
      { width: "5%", targets: 1 },
      { width: "10%", targets: 2 },
      { width: "10%", targets: 3 }
      //{ width: "5%", targets: 4, "className": "dt-body-center" }
    ],  
    fixedColumns: true,       
    "language": 
    {    
      zeroRecords: "No hay registros",
      sInfo: "_END_ de _TOTAL_ registros",
      sInfoEmpty: "0 de 0 registros",
      sInfoFiltered: "(de _MAX_ registros en total)",                       
      search: "Buscar:"
    },
    "searching": true,
    "scrollY":        '70vh',
    "scrollX": true,
    "scrollCollapse": true,
    "paging":         false,
    "responsive": true
  });

  $("#tblListado tbody").on("click","a.btn-editar", function()
  { 
    var data = table.row( $(this).parents("tr") ).data();
    var id = data.id
    window.location.href = 'cuestionario.php?id=' + id;
  });



});

</script>
</body>
</html>