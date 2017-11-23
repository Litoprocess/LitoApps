<!DOCTYPE html>
<html lang="es">
<?php require 'layout/head.php'; ?>
	<main>
		<div class="row">
			<div class="col s12">
				<div style="margin-top:35px; padding: 35px;" align="center" class="card">

					<div class="row">
						<?php if ($_SESSION["Permisos"]["MenuTickets"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-tickets">
							<a href="tickets/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/tickets.png" width="70" class="responsive-img" /><br>
									<span style="color:#b91616;"><h5>Tickets</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>
						
						<div class="col s12 m3" style="margin-top:20px" id="panel-directorio">
							<a href="directorio/directorio.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/directorio.png" width="70" class="responsive-img" /><br>
									<span style="color:#ffdb42"><h5>Directorio</h5></span>
								</div>
							</a>
						</div>
						
						<?php if ($_SESSION["Permisos"]["MenuLibera"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-libera">
							<a href="liberacionPT/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/liberacion.png" width="70" class="responsive-img" /><br>
									<span style="color:#006df1;"><h5>Liberación PT</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuMuestras"] === 1): ?>						
						<div class="col s12 m3" style="margin-top:20px" id="panel-controlm">
							<a href="muestras/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/control_muestras.png" width="70" class="responsive-img" /><br>
									<span style="color:#17eab8;"><h5>Muestreo</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuRevBDD"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-muestreo">
							<a href="muestreoBD/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/muestreo_bd.png" width="70" class="responsive-img" /><br>
									<span class="green-text text-darken-4"><h5>Revision BD</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuMaquilas"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-acabadom">
							<a href="acabadoManual/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/acabado_manual.png" width="70" class="responsive-img" /><br>
									<span class="grey-text text-darken-4"><h5>A.Manual</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuReprocesos"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-reprocesos">
							<a href="reprocesos/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/reprocesos.png" width="70" class="responsive-img" /><br>
									<span style="color:#e75000;"><h5>Reprocesos</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>  

						<?php if ($_SESSION["Permisos"]["MenuiDashboards"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-iDashboards">
							<a href="http://192.168.2.217:8080/idashboards/" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/idashboard.png" width="70" class="responsive-img" /><br>
									<span style="color:#fdb721;"><h5>iDashboards</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>  

						<?php if ($_SESSION["Permisos"]["MenuDBxtra"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-dbxtra">
							<a href="http://192.168.2.211:8082/DBxtra.NET/LogIn.aspx" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/dbxtra.png" width="66" class="responsive-img" /><br>
									<span style="color:#ff8204;"><h5>DBXtra</h5></span>
								</div>
							</a>
						</div>  
						<?php endif; ?>  

						<?php if ($_SESSION["Permisos"]["MenuKrispykreme"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-krispykreme">
							<a href="http://192.168.2.211:8080/KryspyKreme/public/login" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/krispykreme.png" width="190" class="responsive-img" /><br>
									<span style="color:#c52033;"><h5>KrispyKreme</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>							

						<?php if ($_SESSION["Permisos"]["MenuStarbucks"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-starbucks">
							<a href="http://192.168.2.211:8080/starbucks/public/login" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/starbucks_sinfondo.png" width="70" class="responsive-img" /><br>
									<span style="color:#067655;"><h5>Starbucks</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>	

						<?php if ($_SESSION["Permisos"]["MenuStarbucks2"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-starbucks2">
							<a href="http://192.168.2.211:8080/starbucks2/public/login" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/starbucks_sinfondo.png" width="70" class="responsive-img" /><br>
									<span style="color:#067655;"><h5>Starbucks2</h5></span>
								</div>
							</a>
						</div>   
						<?php endif; ?>						                                            

						<?php if ($_SESSION["Permisos"]["MenuCapacitacion"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-capacitacion">
							<a href="capacitacion/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/capacitacion.png" width="70" class="responsive-img" /><br>
									<span style="color:#480c8d;"><h5>Capacitación</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuInventario"] === 1): ?>
						<div class="col s12 m3" style="margin-top:20px" id="panel-inventario">
							<a href="inventarioSistemas/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/inventario_sistemas.png" width="70" class="responsive-img" /><br>
									<span class="blue-text text-accent-4"><h5>Inv.Sistemas</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuNissan"] === 1): ?>	
						<div class="col s12 m3" style="margin-top:20px" id="panel-nissan">
							<a href="nissan/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/nissan.png" width="70" class="responsive-img" /><br>
									<span class="black-text"><h5>Nissan Scan</h5></span>
								</div>
							</a>
						</div>            
						<?php endif; ?>
						<!--div class="col s12 m3" style="margin-top:20px" id="panel-consumibles">
							<a href="#!">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/consumibles.png" width="70" class="responsive-img" /><br>
									<span class="black-text"><h5>Inv.Consumibles</h5></span>
								</div>
							</a>
						</div--> 
						<?php if ($_SESSION["Permisos"]["MenuCotizador"] === 1): ?>					
						<div class="col s12 m3" style="margin-top:20px" id="panel-cotizador">
							<a href="cotizador/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/presupuesto.png" width="70" class="responsive-img" /><br>
									<span class="indigo-text darken-3-text"><h5>Cotizador</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>												

					</div>
				</div>
			</div>
		</div>
	</main>
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container-footer">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="#!" target="_blank">Litoprocess</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://www.litoprocess.com/">Litoprocess</a></span>
        </div>
    </div>
  </footer>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>	
	
<script type="text/javascript">
setInterval(function(){ $("#efecto").html(""); inicio(); }, 10000);
var mensaje = "LitoApps", pausa = 100; 
function inicio(){ 
 var i = 0;
 var m = mensaje.split(''); 
 var t = setInterval( 
 function(){ 
 if(i >= m.length-1)clearInterval(t); 
 document.getElementById('efecto').innerHTML+=m[i];
 i++; 
 }, pausa); 
} 
window.onload = inicio; 
</script>

</body>
</html>
