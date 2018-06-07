<?php require 'views/head.php'; ?>
<main class="container">
	<h4 class="blue-text text-darken-4 center-align">BITACORA DE CONSULTAS</h4>
	<table id="bitacoraConsultas" class="hover cell-border compact" cellspacing="0" style="font-size:80%;" width="100%">
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Usuario</th>
				<th>Tipo</th>
				<th>#Operador</th>
				<th>Maquina</th>		
				<th>Desde</th>
				<th>Hasta</th>
			</tr>
		</thead>
		<tbody>
			<!--Registrs desde BD-->
		</tbody>
	</table>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/bitacora.js"></script>
</body>
</html>