<?php require 'head.php'; ?>
<main class="container">
  <div class="row">
    <div class="col s3">
      <!--div class="row"-->
      <h5>Listado de cursos</h5>     
      <br>
      <br>
      <form id="frmRegistro">
        <input id="id" name="id" type="text" class="validate" hidden>
        <div class="row">
          <div class="input-field col s10">
            <!--input id="curso_real" name="curso_real" type="text" class="validate" style="text-transform: capitalize;" readonly>
            <label for="curso_real">Curso</label-->
          <textarea id="curso_real" name="curso_real" class="materialize-textarea"></textarea>
          <label for="curso_real">Curso</label>            
          </div>
        </div>        
        <div class="row">
          <div class="input-field col s10">
            <input name="participantes_real" id="participantes_real" type="number" class="validate" style="text-align: center;" required>
            <label for="participantes_real">Participantes Reales</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s10">
            <input id="duracion_real" name="duracion_real" type="number" class="validate" style="text-align: center;" required>
            <label for="duracion_real">Duración(Hrs) Real</label>
          </div>
        </div>  
        <div class="row">
          <div class="input-field col s10">
            <input id="horasHombre_real" name="horasHombre_real" type="text" class="validate" style="text-align: center;" readonly>
            <label for="horasHombre_real">Horas Hombre Reales</label>
          </div>
        </div>
      <div class="row">
        <div class="col s10">
          <label id="mes_real">Mes Real</label>
          <select class="browser-default" id="mes_real" name="mes_real" required>
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
          <div class="col s10">
            <label id="estatus_real">Estatus</label>
            <select class="browser-default" id="estatus_real" name="estatus_real" required>
              <option value="" disabled selected>Elije un Estatus</option>
              <option value="Abierto">Abierto</option>
              <option value="Cerrado">Cerrado</option>
            </select>       
          </div>      
        </div>                
        <br>
        <div id="botones" class="row">
          <div class="col s2">
           <a id="reportar" class="waves-effect waves-light blue darken-4 btn">Guardar</a>            
         </div>
         <div class="offset-s4 col s2">
          <a id="Rescancelar" class="waves-effect waves-light grey lighten-5 black-text btn">Limpiar</a>
        </div>        
      </div>                
    </form>
    <!--/div-->  
  </div>
  <div class="col s9">
    <div class="row">
      <table id="tblCurso" class="hover compact row-border" cellspacing="0" width="100%" style="font-size:70%;">
        <thead>
          <tr class="iluminar">
            <th style="background: yellow;">#</th>
            <th style="background: yellow;">Departamento</th>
            <th style="background: yellow;">Curso</th>
            <th style="background: yellow;">Mes</th>         
            <th style="background: yellow;">Partici-pantes</th>                                  
            <th style="background: yellow;">Duración</th>
            <th style="background: yellow;">Horas Hombre</th>                    
            <th style="background: yellow;">Costo x Persona</th>
            <th style="background: yellow;">Costo Total</th> 
            <th style="background: cyan;">Part. Real</th>                   
            <th style="background: cyan;">Duración Real</th>
            <th style="background: cyan;">Horas Real</th>
            <th style="background: cyan;">Mes Real</th>
            <th style="background: cyan;">Estatus</th>          
          </tr>
        </thead>
        <tbody>
          <!--Registrs desde BD-->    
        </tbody>
      </table>       
    </div>
    <div class="row">
      <div id="cumplimiento">
      </div>
    </div>     
  </div>
</div>  
</main>
<?php require '../layout/scripts.php'; ?>
<script type="text/javascript" src="js/obtCursos.js"></script>
</body>
</html>