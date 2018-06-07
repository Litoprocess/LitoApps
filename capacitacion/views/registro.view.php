<?php require 'views/head.php'; ?>
<main class="">
  <div class="row">
    <div class="col s4"> 
      <h5>Registro de cursos</h5>     
    </div>
    <form id="frmRegistro" class="col s8">
      <div class="row">
        <div class="col s6">
          <label id="departamento">Departamento</label>
          <select class="browser-default" name="departamento" id="departamento" required>
            <option value="" disabled selected>Elije un departamento</option>
            <option value="A.Especiales">A.Especiales</option>
            <option value="A.Manual">A.Manual</option>
            <option value="Administracion">Administración</option>
            <option value="Almacen de MP">Almacen de MP</option>
            <option value="Calidad">Calidad</option>
            <option value="Capital Human">Capital Humano</option>
            <option value="Comercial">Comercial</option>
            <option value="Comercial.Cotizaciones">Comercial.Cotizaciones</option>
            <option value="Cotizaciones">Cotizaciones</option> 
            <option value="Cotizaciones/Calidad">Cotizaciones/calidad</option>
            <option value="Cotizadores">Cotizadores</option>
            <option value="Embarques">Embarques</option>
            <option value="Formación">Formación</option>
            <option value="Hotmel">Hotmel</option>
            <option value="Institucional">Institucional</option>
            <option value="Litografia">Litografia</option>
            <option value="Mantenimiento Offset">Mtto. Offset</option>  
            <option value="Nominas">Nominas</option>
            <option value="Offset">Offset</option>
            <option value="Offset Preprensa">Offset preprensa</option>  
            <option value="Planta">Planta</option>
            <option value="Preprensa">Preprensa</option>
            <option value="Preprensa Offset">Preprensa Offset</option>
            <option value="Producción">Producción</option>
            <option value="Seguridad e Higiene">Seguridad e higiene</option>
            <option value="Sistemas">Sistemas</option>
            <option value="Otro">Otro</option>
          </select>       
        </div>      
      </div>
      <div id="otro" class="row" hidden>
        <div class="input-field col s6">
          <input id="otroDepto" name="otroDepto" type="text" class="validate" style="text-transform: capitalize;">
          <label for="otroDepto">Otro</label>
        </div>
      </div>    
      <div class="row">
        <div class="input-field col s6">
          <input id="curso" name="curso" type="text" class="validate" style="text-transform: capitalize;" required>
          <label for="curso">Curso</label>
        </div>
      </div> 
      <div class="row">
        <div class="col s6">
          <label id="mes">Mes</label>
          <select class="browser-default" id="mes" name="mes" required>
            <option value="" disabled selected>Elije un mes</option>
            <option value="01) ENE">01)Enero</option>
            <option value="02) FEB">02)Febrero</option>
            <option value="03) MAR">03)Marzo</option>
            <option value="04) ABR">04)Abril</option>
            <option value="05) MAY">05)Mayo</option>
            <option value="06) JUN">06)Junio</option>
            <option value="07) JUL">07)Julio</option>
            <option value="08) AGO">08)Agosto</option>
            <option value="09) SEP">09)Septiembre</option> 
            <option value="10) OCT">10)Octubre</option>
            <option value="11) NOV">11)Noviembre</option>
            <option value="12) DIC">12)Diciembre</option>
          </select>       
        </div>      
      </div> 
      <div class="row">
        <div class="input-field col s6">
          <input name="participantes" id="participantes" type="number" class="validate" required>
          <label for="participantes">No. de Participantes</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="duracion" name="duracion" type="number" class="validate" required>
          <label for="duracion">Duración(Hrs.)</label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s6">
          <input id="horasHombre" name="horasHombre" type="text" class="validate" readonly>
          <label for="horasHombre">Horas Hombre</label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s6">
          <input id="costoPP" name="costoPP" type="number" value="" class="validate" required>
          <label for="costoPP">Costo por persona</label>
        </div>
      </div>  
      <div class="row">
        <div class="input-field col s6">
          <input id="costoTotal" name="costoTotal" type="text" class="validate" readonly>
          <label for="costoTotal">Costo Total</label>
        </div>
      </div>
    <!--div class="row">
      <div class="col s6">
      <label id="estatus">Estatus</label>
      <select class="browser-default" id="estatus" name="estatus" required>
        <option value="" disabled selected>Elije un Estatus</option>
        <option value="abierto">Abierto</option>
        <option value="cerrado">Cerrado</option>
      </select>       
      </div>      
    </div-->
    <input id="reportado" name="reportado" value="false" type="text" class="validate" hidden>              
    <br>
    <div class="row">
      <div class="col s2">
       <a id="registrar" class="waves-effect waves-light blue darken-4 btn">Guardar</a>            
     </div>
     <div class="offset-s2 col s2">
      <a id="cancelar" class="waves-effect waves-light grey lighten-5 black-text btn">Limpiar</a>
    </div>        
  </div>                
</form>
</div>
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/registro.js"></script>
</body>
</html>