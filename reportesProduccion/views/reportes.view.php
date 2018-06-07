<?php require 'views/head.php'; ?>
<style>
body{
	font-size:90%;		
}
.icon-container i {
	font-size: 3.5em;
	margin-top: -5px;
}
</style>
<main class="container">
	<div class="row">

		<div class="row">
			<div class="col s3 m3 l3 xl3">
				<label for="tipoReporte">TIPO DE REPORTE</label>
				<select id="tipoReporte" class="browser-default">
					<option value="" disabled selected>Elije una opcion</option>
					<option value="operador">OPERADOR</option>
					<option value="maquina">MAQUINA</option>
				</select>  		
			</div>
		</div>

		<div class="row">
			<div class="col s3 m3 l3 xl3">
				INICIO
				<div class="input-field inline">
					<input id="fechainicio" type="date" class="validate">
					<label for="fechainicio"></label>
				</div>
			</div>
			<div class="col s3 m3 l3 xl3">
				FIN
				<div class="input-field inline">
					<input id="fechafin" type="date" class="validate">
					<label for="fechafin"></label>
				</div>
			</div>		  
			<div id="repOperador" class="col s3 m3 l3 xl3">
				OPERADOR
				<div class="input-field inline">
					<input id="operador" type="number" class="validate">
					<label for="operador"></label>
				</div>
			</div>        
			<div id="repMaquina" class="col s3 m3 l3 xl3">
				<label for="maquina">MAQUINA</label>
				<select id="maquina" class="browser-default">
					<option value="0" selected disabled>Selecciona una opcion</option>
					<?php include('php/obtMaquinas.php'); ?>																						
				</select>  		
			</div>
			<div id="repMaquina" class="col s3 m3 l3 xl3">
				<a id="buscar" class="waves-effect waves-light indigo darken-3 btn">Buscar</a>
			</div>						
		</div>

		<div class="row" id="reportemaquina">
			<div class="offset-s10 col s2">
				<a id="excel-maquina" href="#!"><img src="icon/excel2.png" width="30" class="responsive-img" /></a>
				<a id="imprimir-maquina" href="#!"><img src="icon/impresora.png" width="30" class="responsive-img" /></a>
			</div>				
			<div class="col s12 m12 l12 xl12">
				<table id="tblReporteMaquina" class="hover compact row-border" cellspacing="0" width="100%" style="font-size:70%;">
					<thead>
						<tr class="iluminar">
							<th>No.ORDEN</th>
							<th>N.TRABAJO</th>
							<th>ID.ACT</th>
							<th>DESCRIPCION</th>
							<!--th>CVE.PROCESO</th-->         
							<th>PROCESO</th>                                  
							<th>CANTIDAD</th>
							<th>TIEMPO</th>                    
							<th>HR.INICIO</th>
							<th>HR.FIN</th>
							<th>HR.PROD</th> 
							<th>OPERADOR</th>         
						</tr>
					</thead>
					<tbody>
						<!--Registrs desde BD-->    
					</tbody>
				</table>				
			</div>
		</div>

		<div class="row" id="reporteoperador">
			<div class="offset-s10 col s2">
				<a id="excel-operador" href="#!"><img src="icon/excel2.png" width="30" class="responsive-img" /></a>
				<a id="imprimir-operador" href="#!"><img src="icon/impresora.png" width="30" class="responsive-img" /></a>
			</div>	
			<div class="col s12 m12 l12 xl12">
				<table id="tblReporteOperador" class="hover compact row-border" cellspacing="0" width="100%" style="font-size:70%;">
					<thead>
						<tr class="iluminar">
							<th>No.ORDEN</th>
							<th>N.TRABAJO</th>
							<th>ID.ACT</th>
							<th>DESCRIPCION</th>
							<!--th>CVE.PROCESO</th-->         
							<th>PROCESO</th>                                  
							<th>CANTIDAD</th>
							<th>TIEMPO</th>                    
							<th>HR.INICIO</th>
							<th>HR.FIN</th> 
							<th>F.TURNO</th>
							<th>MAQUINA</th>         
						</tr>
					</thead>
					<tbody>
						<!--Registrs desde BD-->    
					</tbody>
				</table>				
			</div>
		</div>		

		<div class="row">
			<div class="col s6 m6 l6 xl6">		
				<div class="row">
					<div class="col s12 m12 l12 xl12">
						SE HICIERON:
					</div>
					<div class="col s2 m2 l2 xl2">
						<div class="row">
							<div class="col s12 m12 l12 xl12" style="text-align:right;">
								<span><b id="cantajuste" class="html">0</b></span> 
							</div>
							<div class="col s12 m12 l12 xl12" style="text-align:right;">
								<span><b id="cantajusteliteratura" class="html">0</b></span>  
							</div>
							<div class="col s12 m12 l12 xl12" style="text-align:right;">
								<span><b class="cantproducida html">0</b></span>  
							</div>
							<div class="col s12 m12 l12 xl12" style="text-align:right;">
								<span>EN</span>
							</div>
						</div>								
					</div>
					<div class="col s6 m6 l6 xl6">
						<div class="row">
							<div class="col s12 m12 l12 xl12">
								<span>AJUSTES NORMALES:</span>
							</div>
							<div class="col s12 m12 l12 xl12">
								<span>AJUSTES DE LITERATURA:</span>
							</div>
							<div class="col s12 m12 l12 xl12">
								<span>TIROS:</span>
							</div>	
							<div class="col s12 m12 l12 xl12">
								<span><b id="tiempotiroajuste" class="html">0.00</b></span> HRS.
							</div>										
						</div>				
					</div>
					<div class="col s12 m12 l12 xl12">
						SE DEBIO DE HABER HECHO EN: <span><b id="debio" class="html">0.00</b></span> HRS.
					</div>			
				</div>
			</div>
			<div class="col s6 m6 l6 xl6">
				<div class="row">
					<div id="diveficiencia" class="col s6 m6 l6 xl6" style="font-size:25px">
						EFICIENCIA <span><b id="eficiencia" class="html">0.0</b></span> <b>%</b>
					</div>
					<div id="eficiencia-icon" class="col s6 m6 l6 xl6 icon-container">
						<i class="material-icons dp48">thumb_down</i>
					</div>
				</div>		
			</div>
		</div>

		<div class="row">
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO REPORTADO:</span>
			</div>
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiemporep" class="html">0.00</b></span>
			</div>
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO MUERTO PROPIO:</span>
			</div>			
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiempoimproductivo" class="html">0.00</b></span>
			</div>
			<div class="col s3 m4 l3 xl3">
				<span>STD AJUSTE NORMAL:</span>
			</div>	
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="estandarajuste" class="html">0.00</b></span>
			</div>	
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO DE AJUSTE:</span>
			</div>
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiempoajuste" class="html">0.00</b></span>
			</div>
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO MUERTO AJENO:</span>
			</div>	
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiempoajeno" class="html">0.00</b></span>
			</div>	
			<div class="col s3 m4 l3 xl3">
				<span>STD AJUSTE LITERATURA:</span>
			</div>	
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="estandarajusteliteratura" class="html">0.00</b></span>
			</div>	
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO DE TIRO:</span>
			</div>		
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiempotiro" class="html">0.00</b></span>
			</div>	
			<div class="col s3 m4 l3 xl3">
				<span>TIEMPO MUERTO SIN TURNO:</span>
			</div>		
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiemposinturno" class="html">0.00</b></span>
			</div>
			<div class="col s3 m4 l3 xl3">
				<span>STD VELOCIDAD DE TIRO:</span>
			</div>
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="velocidadtiro" class="html">0</b></span>	
			</div>	
			<div class="offset-s12 offset-l4 offset-xl4 col s3 m4 l3 xl3">
				<span>TIEMPO SIN REGISTRO:</span>
			</div>	
			<div class="col s1 m2 l1 xl1" style="text-align:right;">
				<span><b id="tiemposinregistro" class="html">0.00</b></span>
			</div>											
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
<script type="text/javascript" src="js/reportes.js"></script>
</body>
</html>