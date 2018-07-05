<!DOCTYPE html>
<html lang="es">
<?php require 'layout/head.php'; ?>
	<main>
		<div class="row">
			<div class="col s12 m12 l12 xl12">
				<div style="margin-top:35px; padding: 35px;" align="center" class="card">

					<div class="row">						

						<?php if ($_SESSION["Permisos"]["MenuTickets"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-tickets">
							<a href="tickets/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/tickets.png" width="70" class="responsive-img" /><br>
									<span style="color:#b91616;"><h5>Tickets</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>
						
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-directorio">
							<a href="directorio/directorio.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/directorio.png" width="70" class="responsive-img" /><br>
									<span style="color:#ffdb42"><h5>Directorio</h5></span>
								</div>
							</a>
						</div>

						<?php if ($_SESSION["Permisos"]["MenuReportesProduccion"] === 1): ?>					
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-cotizador">
							<a href="reportesProduccion/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/reportar.png" width="70" class="responsive-img" /><br>
									<span class="black-text"><h5>Rep. Producción</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>		

						<?php if ($_SESSION["Permisos"]["MenuPreviewOP"] === 1): ?>					
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-cotizador">
							<a href="informeOP/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/ordenproduccion.png" width="70" class="responsive-img" /><br>
									<span style="color:#c8752f;"><h5>Informe OP</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>											

						<?php if ($_SESSION["Permisos"]["MenuiDashboards"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-iDashboards">
							<a href="http://192.168.2.217:8080/idashboards/" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/idashboard.png" width="70" class="responsive-img" /><br>
									<span style="color:#fdb721;"><h5>iDashboards</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>  

						<?php if ($_SESSION["Permisos"]["MenuDBxtra"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-dbxtra">
							<a href="http://192.168.2.211:8083/DBxtra.NET/LogIn.aspx" target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/dbxtra.png" height="66" width="66" class="responsive-img" /><br>
									<span style="color:#ff8204;"><h5>DBXtra</h5></span>
								</div>
							</a>
						</div>  
						<?php endif; ?>  

						<?php if ($_SESSION["Permisos"]["MenuKrispykreme"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-krispykreme">
							 <a class="waves-effect" href="http://192.168.2.209/kryspykreme/login?usuario=<?php echo $_SESSION['Permisos']['usuario'];?>&password=<?php echo $_SESSION['Permisos']['password'];?>" target="_blank" id="nav-app10">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/krispykreme.png" width="170" height="60" class="responsive-img" /><br>
									<span style="color:#c52033;"><h5>KrispyKreme</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>							

						<?php if ($_SESSION["Permisos"]["MenuStarbucks"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-starbucks">
							<a href="http://192.168.2.209/starbucks/login?usuario=<?php echo $_SESSION['Permisos']['usuario'];?>&password=<?php echo $_SESSION['Permisos']['password'];?>"  target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/starbucks_sinfondo.png" width="70" class="responsive-img" /><br>
									<span style="color:#067655;"><h5>Starbucks</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>	

						<?php if ($_SESSION["Permisos"]["MenuStarbucks2"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-starbucks2">
							<a href="http://192.168.2.209/starbucks2/login?usuario=<?php echo $_SESSION['Permisos']['usuario'];?>&password=<?php echo $_SESSION['Permisos']['password'];?>"  target="_blank">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/starbucks_sinfondo.png" width="70" class="responsive-img" /><br>
									<span style="color:#067655;"><h5>Starbucks2</h5></span>
								</div>
							</a>
						</div>   
						<?php endif; ?>	

						<?php if ($_SESSION["Permisos"]["MenuLibera"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-libera">
							<a href="liberacionPT/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/liberacion.png" width="70" class="responsive-img" /><br>
									<span style="color:#006df1;"><h5>Liberación PT</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuMuestras"] === 1): ?>						
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-controlm">
							<a href="muestras/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/control_muestras.png" width="70" class="responsive-img" /><br>
									<span style="color:#17eab8;"><h5>Muestreo</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuRevBDD"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-muestreo">
							<a href="muestreoBD/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/muestreo_bd.png" width="70" class="responsive-img" /><br>
									<span class="green-text text-darken-4"><h5>Revision BD</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuMaquilas"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-acabadom">
							<a href="acabadomanual/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/acabado_manual.png" width="70" class="responsive-img" /><br>
									<span class="grey-text text-darken-4"><h5>A.Manual</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?> 

						<?php if ($_SESSION["Permisos"]["MenuReprocesos"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-reprocesos">
							<a href="reprocesos/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/reprocesos.png" width="70" class="responsive-img" /><br>
									<span style="color:#e75000;"><h5>Reprocesos</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>  
					                                            
						<?php if ($_SESSION["Permisos"]["MenuCapacitacion"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-capacitacion">
							<a href="capacitacion/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/capacitacion.png" width="70" class="responsive-img" /><br>
									<span style="color:#480c8d;"><h5>Capacitación</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuInventario"] === 1): ?>
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-inventario">
							<a href="inventarioSistemas/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/inventario_sistemas.png" width="70" class="responsive-img" /><br>
									<span class="blue-text text-accent-4"><h5>Inv.Sistemas</h5></span>
								</div>
							</a>
						</div>
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuNissan"] === 1): ?>	
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-nissan">
							<a href="nissan/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/nissan.png" width="70" class="responsive-img" /><br>
									<span class="black-text"><h5>Nissan Scan</h5></span>
								</div>
							</a>
						</div>            
						<?php endif; ?>
						<!--div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-consumibles">
							<a href="#!">
								<div style="padding: 5px;" class="grey lighten-3 col s12 waves-effect">
									<img src="icons/consumibles.png" width="70" class="responsive-img" /><br>
									<span class="black-text"><h5>Inv.Consumibles</h5></span>
								</div>
							</a>
						</div--> 
						<?php if ($_SESSION["Permisos"]["MenuCotizador"] === 1): ?>					
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-cotizador">
							<a href="cotizador/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/presupuesto.png" width="70" class="responsive-img" /><br>
									<span class="indigo-text darken-3-text"><h5>Cotizador</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuMantenimiento"] === 1): ?>					
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-mantenimiento">
							<a href="mantenimientopreventivo/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/mantenimiento.png" width="70" class="responsive-img" /><br>
									<span style="color: #a49f3c;"><h5>Mantenimiento</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuReqPersonal"] === 1): ?>												
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-requisiciondepersonal">
							<a href="requisiciondepersonal/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/candidatos.png" width="70" class="responsive-img" /><br>
									<span style="color: #40A3C3;"><h5>Req.Personal</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuMesaControl"] === 1): ?>											
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-mesacontrol">
							<a href="../mesacontrol">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/solucion.png" width="70" class="responsive-img" /><br>
									<span style="color: #1D39AA;"><h5>Mesa de Control</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>
					
						<?php if ($_SESSION["Permisos"]["MenuPropuestas"] === 1): ?>												
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-propuestasclientes">
							<a href="propuestasclientes/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/propuestas (1).png" width="70" class="responsive-img" /><br>
									<span style="color: #F3C21B;"><h5>Propuestas Clientes</h5></span>
								</div>
							</a>
						</div> 
						<?php endif; ?>

						<?php if ($_SESSION["Permisos"]["MenuAccountability"] === 1): ?>												
						<div class="col s12 m4 l4 xl3" style="margin-top:20px" id="panel-accountability">
							<a href="accountability/index.php">
								<div style="padding: 5px;" class="grey lighten-3 col s12 m12 l12 xl12 waves-effect">
									<img src="icons/rompecabezas.png" width="70" class="responsive-img" /><br>
									<span style="color: #e25748;"><h5>Accountability</h5></span>
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

$(".button-collapse").sideNav();

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
