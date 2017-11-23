<?php require 'views/head.php'; ?>

<main class="container">
  <div class="row">
  <div class="col s2">
    <h5>Base de datos</h5>
</div>
    <div class="col s8">
    	<table id="tblBase" class="hover compact row-border" cellspacing="0" width="100%">
    		<thead>
    			<tr>
    				<th>Guia</th>
    				<th>Sku</th>
    			</tr>
    		</thead>
    		<tbody>
    			
    		</tbody>    		
    	</table>
    </div>
    <div class="offset-s4 col s4">
      <form id="frmSubirBase" method="POST" enctype="multipart/form-data">
        <div class="row">
        <p style="color: red;">*La base de datos debera cargarse en formato .txt(Texto delimitado por tabulaciones) y no debera contener encabezados.</p>
        <div class="file-field input-field">
          <div class="btn" style="text-transform: capitalize;">
            <span>Archivo</span>
            <input type="file" id='file' name='file' accept='text/plain'>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>            
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="offset-s4 col s4">
                <a id="subir" class="waves-effect waves-light blue darken-4 btn" style="text-transform: capitalize;">Subir</a>
            </div>
        </div>
      </form>        
    </div>
</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/obtBase.js"></script>
</body>
</html>