<?php require 'views/head.php'; ?>
	<main class="container">
		<h4 class="blue-text text-darken-4 center-align">Muestreo TELMEX</h4>
		<h5 class="blue-text text-darken-4 center-align">BITACORA</h5>
		<table id="registros" class="hover cell-border compact" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="sorting_desc">No.</th>
					<th>Aplico</th>
					<th>Telefono</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Comentario</th>		
				</tr>
			</thead>
			<tbody id="registros-tabla">
				<!--Registrs desde BD-->
			</tbody>
		</table>
	</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/obtBitacora.js"></script>
</body>
</html>