<?php require 'views/head.php'; ?>
<main class="container">
	<div class="row">
		<div class="col s4 offset-s4">
		  <label>Revision</label>
		  <select id="revision" class="browser-default">
		    <option value="" disabled selected>Choose your option</option>
		    <option value="1193">Linea de Credito Personal(1193)</option>
		    <option value="1194">Linea de Credito Negocios(1194)</option>
		  </select>		
		</div>
		<div id="bitacora-lcpersonal" class="col s12" style="display:none;">
			<h4 class="blue-text text-darken-4 center-align">Muestreo TELMEX</h4>
			<h5 class="blue-text text-darken-4 center-align">BITACORA</h5>
			<table id="personal" class="hover cell-border compact" cellspacing="0" style="font-size:80%;" width="100%">
				<caption><b>LINEA DE CREDITO PERSONAL 1193</b></caption>
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
				<tbody>
					<!--Registrs desde BD-->
				</tbody>
			</table>	
		</div>
		<div id="bitacora-lcnegocios" class="col s12" style="display:none;">
			<h4 class="blue-text text-darken-4 center-align">Muestreo TELMEX</h4>
			<h5 class="blue-text text-darken-4 center-align">BITACORA</h5>
			<table id="negocios" class="hover cell-border compact" cellspacing="0" style="font-size:80%;" width="100%">
				<caption><b>LINEA DE CREDITO NEGOCIOS 1194</b></caption>
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
				<tbody>
					<!--Registrs desde BD-->
				</tbody>
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
<script type="text/javascript" src="js/obtBitacora.js"></script>
</body>
</html>