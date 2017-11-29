    <!-- Modal Structure -->
    <div class="container">
      <div id="AddEnvio" class="modal modal-fixed-footer">
        <form id="form-ticket" name="form-ticket" method="POST">
         <div class="col s12">
          <a class="waves-effect waves-teal btn-flat right btnx-modal modal-close"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content">
          <h4 class="center-align">Generar ticket</h4>
          <div class="row">
            <div class="col s6">
              <label>Categoría</label>
              <select id="selCategoria" name="selCategoria" class="browser-default">
                <option value="" disabled selected>Selecciona una opción</option>
              </select>
            </div>
            <div class="input-field col s6" style="margin-top: 18px;">
              <input type="text" name="txtTitulo" id="txtTitulo" data-length="40" maxlength="40">
              <label for="txtTitulo">Título</label>
            </div>

          </div>
          <div class="row">
            <p>Datos de la empresa:</p>
            <div class="input-field col s4">
              <input type="text" name="txtNombreEmp" id="txtNombreEmp" data-length="100" maxlength="100">
              <label for="txtNombreEmp">Nombre</label>
            </div>
            <div class="input-field col s8">
              <input type="text" name="txtDomicilio" id="txtDomicilio" data-length="450" maxlength="450">
              <label for="txtDomicilio">Domicilio</label>
            </div>
          </div>

          <div class="row">

            <p>Datos de contacto:</p>
            <div class="input-field col s4" style="margin-top: 18px;">
              <input type="text" name="txtNcontacto" id="txtNcontacto" data-length="40" maxlength="40">
              <label for="txtNcontacto">Nombre</label>
            </div>

            <div class="input-field col s4" style="margin-top: 18px;">
              <input type="text" name="txtTelefono" id="txtTelefono" data-length="20" maxlength="20">
              <label for="txtTelefono">Telefono</label>
            </div>

            <div class="col s4">
              <label for="selPrioridad">Prioridad</label>
              <select id="selPrioridad" name="selPrioridad" class="browser-default">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="Normal">Normal</option>
                <option value="Urgente">Urgente</option>
              </select>
            </div>

          </div>

          <div class="row">

            <p>Horario de atencion</p>

            <div class="input-field col s2">
              <label for="txtFecha">Fecha:</label>
              <input type="text" name="txtFecha" id="txtFecha" class="datepicker">
              
            </div>

            <div class="input-field col s2">
              <label for="txtHora1">de:</label>
              <input type="text" name="txtHora1" id="txtHora1" class="timepicker">
            </div>

            <div class="input-field col s2">
              <input type="text" name="txtHora2" id="txtHora2" class="timepicker">
              <label for="txtHora2">a:</label>
            </div>

            <div class="input-field col s6">
              <input type="text" name="txtNotas" id="txtNotas" data-length="450" maxlength="450">
              <label for="txtNotas">Instrucciones:</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s6 m2">
              <p>
                <input type="checkbox" class="filled-in" id="chk-correo" />
                <label for="chk-correo">Enviar copia</label>
              </p>
            </div>
            <div class="input-field col s6 m4" style="margin-top: 12px;">
              <input type="email" name="txt-correo2" id="txt-correo2" disabled>
              <label for="txt-correo2">Correo</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
         <button class="btn waves-effect waves-light" type="submit" name="action" >Generar</button> 
       </div>
     </form>
   </div>
 </div>