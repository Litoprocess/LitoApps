<?php require 'views/head.php'; ?>
<br>
<br>
<br>
<main class="container">
  <form id="frm-liberacion" method="POST" name="liberacion" enctype="multipart/form-data"><!--Formulario-->  
    <div class="row"><!--Datos de la orden-->                              
      <div class="input-field col s1">
        <label for="folio">Folio:</label>
        <input type="text" id="folio" class="validate readonly" placeholder="Folio" readonly>                     
      </div>
      <div class="input-field col s1">
        <label for="noorden">Orden:</label>
        <input type="text" id="noorden" class="validate">            
      </div>         
      <div class="input-field col s6">
        <label for="trabajo">Trabajo:</label>
        <input type="text" id="trabajo" class="validate readonly" readonly> 
      </div>                  
      <div class="input-field col s2">
        <label for="fecha">Fecha</label>
        <input type="text" id="fecha" class="validate readonly" readonly>                       
      </div>                     
      <div class="input-field col s2">
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" class="validate readonly" readonly>                    
      </div>                     
    </div><!--/Datos de la orden-->
    <div class="row">
      <div class="col s2"><!--Tamaño-->
        <label>Nivel de Inspeccion</label>          
        <select class="browser-default" id="inspeccion" name="inspeccion" disabled>
          <option value="none" disabled selected>Elige una opcion</option>
          <option value="I">I</option>
          <option value="II">II</option>
        </select>             
      </div><!--/Tamaño--> 
      <div class="col s8">               
        <div class="input-field col s2 offset-s1">           
          <label for="tamlote">Tam.Lote:</label>
          <input type="text" id="tamlote" class="validate" disabled>
        </div>
        <div class="input-field col s2">
          <label for="nivel">Nivel:</label>
          <input type="text" id="nivel" class="validate readonly" readonly>
        </div>
        <div class="input-field col s2">
          <label for="tamuestra">Tam.Muestra:</label>
          <input type="text" id="tamuestra" class="validate readonly" readonly>
        </div>
        <div class="input-field col s2">
          <label for="aceptado">Aceptado:</label>
          <input type="text" id="aceptado" class="validate readonly" readonly>
        </div> 
        <div class="input-field col s2">
          <label for="rechazado">Rechazado:</label>
          <input type="text" id="rechazado" class="validate readonly" readonly>
        </div>
        <div class="input-field col s2 offset-s2">
          <label for="acumulado">Acumulado:</label>
          <input type="text" id="acumulado" class="validate readonly" readonly>
        </div>
        <div class="input-field col s2 offset-s1">
          <label for="suma"></label>
          <input type="text" id="suma" class="validate" readonly>          
        </div>
        <div class="input-field  col s2">
          <label for="muestraOk"></label>
          <input type="text" id="muestraOk" class="validate amt" disabled>
        </div>
        <div class="input-field col s2">
          <label for="muestraRechazada" color:"white"></label>
          <input type="text" id="muestraRechazada" class="validate amt" disabled>          
        </div>                         
      </div>       
      <div class="col s2">
        <div id="estatus" class="offset-s4 col s4 offset-s4">
          <!-- Aceptado/Rechazado-->
        </div>                                 
      </div>
        <div id="ceros" class="offset-s7 col s5" >
          <!--Si muestraOk y muestraRechazada se encuentran ambas en ceros-->
        </div>        
    </div>
  </div>
  <div class="row">
    <div id="file" class="file-field input-field offset-s4 col s4 offset-s4">
      <!-- Cargar foto -->
    </div>
    <div id="respuesta">
      
    </div>    
  </div>  
  <div class="row"><!--Observaciones-->
    <div class="input-field col s12">
      <label for="observaciones">Observaciones</label>
      <textarea id="observaciones" class="materialize-textarea" disabled></textarea>              
    </div>                
  </div>
  <div class="row"><!--Boton Aceptar-->
    <div class="offset-s4 col s4 offset-s4">
      <div id="guardar" class="btn-group">
        <a id="btn-guardar" class="waves-effect indigo darken-4 btn">Guardar</a>
      </div>       
    </div>
  </div>   
</form>
<!--/div-->
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/formulario.js"></script>
</body>
</html>
