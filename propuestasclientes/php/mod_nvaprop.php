    <!-- Modal Structure -->
    <div class="container">
      <div id="AddEnvio" class="modal modal-fixed-footer">
        <form id="form-Prop" name="form-Prop" method="POST">
         <div class="col s12">
          <a class="waves-effect waves-teal btn-flat right btnx-modal modal-close"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content">
          <h4 class="center-align">Nueva Propuesta</h4>
          <div class="row">
            <div class="col s6">
                <div class="input-field col s3">
            <input style="text-transform: uppercase" type="text" name="txtclave_cliente" id="clave_cliente" />
            <label for="clave_cliente" class="lblFechas">Cliente</label>            
          </div>  
          <div class="input-field col s9">
            <input style="text-transform: uppercase" type="text" name="txtcliente" id="txtcliente" readonly="readonly"/>
                  
          </div>          
        </div>

        <br><br>  

          </div>
          <div class="row">
            <div class="input-field col s6">
          <label for="fRegistro" class="lblFechas">Fecha Registro</label>
          </div>
          <div class="input-field col s6">

          <label for="fAplicacion" class="lblFechas">Fecha Aplicacion</label>
        </div>
          </div>

          <div class="row">

      <div class="input-field col s6">
            <input type="date" name="txtfRegistro" id="txtfRegistro" step="1" min="2018-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" readonly="readonly">
          </div>    
          <div class="input-field col s6">
            <input type="date" name="txtfAplicacion" id="txtfAplicacion" step="1" min="2018-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>">
          </div>        
        </div>

         

          <div class="row">

   <div class="input-field col s6">
            <input style="text-transform: uppercase" type="text" name="txtpropuesta_titulo" id="txtpropuesta_titulo" />
            <label for="propuesta_titulo" class="lblFechas">Titulo</label>            
          </div>  

          </div>

          <div class="row">
        <div class="input-field col s12">
            <textarea  id="txtnotas" class="materialize-textarea" style="text-transform: uppercase" name="txtnotas" maxlength="100"></textarea>
            <label for="notas" class="lblFechas">Propuesta</label>
          </div>
          </div>
           </div>

        
        <div class="modal-footer">
         <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
         <button class="btn waves-effect waves-light" type="btn-guardar" name="action" >Generar</button> 
       </div>
     </form>
   </div>
 </div>