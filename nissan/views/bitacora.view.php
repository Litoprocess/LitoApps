<?php require 'views/head.php'; ?>

<main class="container">
  <div class="row">
<div class="col s2">
    <h5>Bitacora</h5>
</div>  
    <div class="col s8">
    	<table id="tblBitacora" class="hover compact row-border" cellspacing="0" width="100%">
    		<thead>
    			<tr>
    				<th>Id</th>
    				<th>Usuario</th>
    				<th>Guia</th>
    				<th>Sku</th>
    				<th>Fecha</th>
    				<th>Estatus</th>
    			</tr>
    		</thead>
    		<tbody>
    			
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
<!--script type="text/javascript" src="js/buttons.html5.min.js"></script-->
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<script type="text/javascript" src="js/obtBitacora.js"></script>
</body>
</html>